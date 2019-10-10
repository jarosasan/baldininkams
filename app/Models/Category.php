<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $table = 'categories';
    private $descendants = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_name', 'parent_id', 'level', 'slug'
    ];

    public function  advert (){
        $this->hasMany('App\Models\Advert');
    }



    public function children(){
        return $this->hasMany( self::class, 'parent_id')->with('children');
    }

    public function parent(){
        return $this->belongsTo( self::class,'parent_id')->with('parent');
    }

    public function hasChildren(){
        if($this->children->count()){
            return true;
        }
        return false;
    }

    public function findDescendants(Category $category){
        $this->descendants[] = $category->id;

        if($category->hasChildren()){
            foreach($category->children as $child){
                $this->findDescendants($child);
            }
        }
    }

    public function getDescendants(Category $category){
        $this->findDescendants($category);
        return $this->descendants;
    }


}
