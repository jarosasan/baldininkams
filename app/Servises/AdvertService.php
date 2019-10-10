<?php


namespace App\Servises;


use App\Models\Advert;
use App\Models\Category;
use App\Models\City;
use App\Repositories\AdvertRepository;
use Illuminate\Support\Arr;

class AdvertService
{
    protected $adverts;

    public function __construct(AdvertRepository $adverts)
    {
        $this->adverts = $adverts;
    }


    /**
     * @param \App\Models\Advert $adverts
     * @param \App\Models\City
     * @param $paginate
     *
     * @return array
     */
    public function returnListOfAdverts($paginate)
    {
        $adverts = $this->adverts->getAdvertsPaginatedList($paginate);
        $result = [];
        foreach($adverts as $advert){
            $advert['type'] = ($advert->type == Advert::SELL)?'Siulau':(($advert['type'] == Advert::BUY)
                ?'Ieškau':'');
            $city = City::find($advert->city_id) ;
            $advert['city'] = $city->name ;
            $result[]= Arr::except($advert, ['city_id']);
        }
           return $result;
    }

    /**
     * @param \App\Models\Advert $adverts
     * @param \App\Models\City
     * @param \App\Models\Category
     * @param $id
     *
     * @return object
     */
    public function returnSingleAdverts($id)
    {
        $advert = $this->adverts->getSingleAdvert($id);
        $advert['type'] = ($advert->type == Advert::SELL)?'Siulau':(($advert['type'] == Advert::BUY)
            ?'Ieškau':'');
        $city = City::find($advert->city_id) ;
        $advert['city'] = $city->name ;
        $category = Category::find($advert->category_id);
        $advert['category'] = $category->category_name;
        $result[]= Arr::except($advert, ['city_id']);

        return $advert;
    }


}
