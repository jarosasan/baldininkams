<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdvertStatus extends Model
{
    const NEW_AD = 1;
    const ACTIVE = 2;
    const INACTIVE = 3;
    const DELETED = 4;

    public function adverts()
    {
        return $this->hasMany('App\Models\Advert');
    }
}

