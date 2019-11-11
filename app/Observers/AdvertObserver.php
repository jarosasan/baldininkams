<?php

namespace App\Observers;

use App\Models\Advert;
use App\Http\Requests\StoreAdvertRequest;
use Illuminate\Support\Str;

class AdvertObserver
{
    /**
     * Handle the models advert "creating" event.
     *
     * @param \App\Models\Advert $advert
     * @param \App\Http\Requests\StoreAdvertRequest $request
     *
     * @return void
     */
    public function creating(Advert $advert)
    {
        $advert->short_description = Str::limit($advert->description, 185, ' ...');
    }
}
