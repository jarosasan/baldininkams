<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Advert extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    const BUY = 1;
    const SELL = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'title', 'type', 'description', 'user_id', 'category_id', 'city_id', 'short_description', 'price', 'currency','phone', 'email',
      'web_page', 'status_id'
    ];


    public function  user (){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function  category (){
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function  city (){
        return $this->belongsTo('App\Models\City', 'city_id');
    }

    public function  status (){
        return $this->belongsTo('App\Models\AdvertStatus');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(238)
            ->height(180)
            ->sharpen(10);

        $this->addMediaConversion('origin');

        $this->addMediaConversion('max-size')
            ->width(1920)
            ->height(1440)
            ->sharpen(10);
    }


}
