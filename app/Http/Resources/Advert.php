<?php

namespace App\Http\Resources;

use App\Models\City;
use App\Models\Image;
use Illuminate\Http\Resources\Json\JsonResource;

class Advert extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'type'=>$this->type,
            'description'=>$this->short_description,
            'city'=>City::select('name')->where('id', $this->city_id)->get(),
            'img'=>Image::where('advert_id', $this->id)->first(),
            'price'=>$this->price,
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at,
        ];
    }
}
