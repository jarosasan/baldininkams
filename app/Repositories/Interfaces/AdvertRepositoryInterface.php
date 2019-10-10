<?php


namespace App\Repositories\Interfaces;


interface AdvertRepositoryInterface
{
    public function getAdvertsPaginatedList($perPage);
    public function getSingleAdvert($id);
}
