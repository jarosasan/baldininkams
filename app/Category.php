<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_name', 'parent_id', 'level',
    ];

    public function childs() {
       return $this->hasMany('App\Category', 'parent_id');
    }
}
