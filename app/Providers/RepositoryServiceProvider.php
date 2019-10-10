<?php


namespace App\Providers;


use App\Repositories\AdvertRepository;
use App\Repositories\Interfaces\AdvertRepositoryInterface;
use Carbon\Laravel\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * Bind the interface to an implementation repository class
     */
    public function register()
    {
        $this->app->bind(
            AdvertRepositoryInterface::class,
            AdvertRepository::class
        );
    }
}
