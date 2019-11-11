<?php


namespace App\Services;


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
     * @param \App\Models\Advert
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
            $result[]=$advert;
        }
           return $result;
    }

    /**
     * @param $id
     * @param \App\Models\Advert
     * @return object
     */
    public function returnSingleAdverts($id)
    {
        $advert = $this->adverts->getSingleAdvert($id);
        $advert['type'] = ($advert->type == Advert::SELL)?'Siulau':(($advert['type'] == Advert::BUY)
            ?'Ieškau':'');

        return $advert;
    }
    /**
     * @param \App\Models\Advert
     * @parom \App\Models\User $user
     * @return array
     */
    public function returnUserListOfAdverts($user, $paginate)
    {
        $adverts = $this->adverts->getUserActiveAdvertsPaginatedList($user, $paginate);
        $result = [];
        foreach($adverts as $advert){
            $advert['type'] = ($advert->type == Advert::SELL)?'Siulau':(($advert['type'] == Advert::BUY)
                ?'Ieškau':'');
            $result[]=$advert;
        }
        return $result;
    }


}
