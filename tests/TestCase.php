<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    public function create(string $model, array $attributes = [], $resource = true)
    {
        $resourceModel = factory("App\\Models\\$model")->create($attributes);
        $resourceClass = "App\\Http\Resources\\$model";
        if(!$resource)
            return $resourceModel;
        return new $resourceClass($resourceModel);
    }
}
