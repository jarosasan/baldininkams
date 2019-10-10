<?php

namespace App\Observers;

use App\Models\Advert;
use Illuminate\Http\Request;

class AdvertObserver
{
    /**
     * Handle the models advert "creating" event.
     *
     * @param  \App\Models\Advert  $advert
     * @return void
     */
    public function creating(Advert $advert, Request $request)
    {
        $advert->short_description = Str::limit($request->description, 185, ' ...');
        $advert->img = $request->files ? 1 : 0;
    }
}
