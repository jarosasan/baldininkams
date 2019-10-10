<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Advert;
use App\Models\User;
use App\Models\Category;
use App\Models\City;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Advert::class, function (Faker $faker) {
    $description = $faker->text;
    $type = random_int(1,2);
    $price = ($type == Advert::SELL)?random_int(1,1000):null;
    return [
        'title'=>$faker->catchPhrase,
        'type'=>$type,
        'description'=>$description,
        'short_description'=>Str::limit($description, 100, ' ...'),
        'img'=> true,
        'user_id'=>User::all()->random(),
        'category_id'=>Category::all()->random(),
        'city_id'=>City::all()->random(),
        'price'=>$price,
        'currency'=>'EUR',
        'phone'=>$faker->phoneNumber,
        'email'=>$faker->email,
        'web_page'=>$faker->url,
        'status_id'=>random_int(1,4),
        'created_at'=>Carbon::now(),
        'updated_at'=>Carbon::now(),
    ];
});
