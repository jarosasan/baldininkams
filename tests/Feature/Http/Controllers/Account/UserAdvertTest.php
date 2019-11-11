<?php

namespace Tests\Feature\Http\Controllers\Account;

use App\Models\Advert;
use App\Models\Category;
use App\Models\City;
use App\Models\User;
use Faker\Factory;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class UserAdvertTest extends TestCase
{
//    use  DatabaseTransactions;
//    use  DatabaseMigrations;
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->seed();
    }

    /**
     * @test
     */
    public function a_user_can_browse_adverts()
    {

        $this->withoutExceptionHandling();
        $response = $this->get('skelbimai/');
        $response->assertStatus(200);
    }


    /**
     * @test
     */
    public function authenticated_user_can_get_paginated_adverts_list()
    {
        $this->withoutExceptionHandling();
        $user = $this->actingAs(factory('App\Models\User')->create());
        factory(Advert::class, 100)->create(['user_id'=>Auth::id()])->toArray();

        $response = $user->get('mano-skelbimai/');
        $response->assertViewIs('user-account.user_adverts_list');
        $response->assertViewHas('adverts');
        $response->assertStatus(200);

    }

    /**
     * @test
     */
    public function unauthenticated_user_can_get_paginated_adverts_list()
    {
        $this->withoutExceptionHandling();
        $autUser = factory('App\Models\User')->create();
        $user = $this->actingAs(factory('App\Models\User')->create());
        factory(Advert::class, 100)->create(['user_id'=>Auth::id()])->toArray();

        $response = $autUser->get('mano-skelbimai/');
        $response->assertViewIs('user-account.user_adverts_list');
        $response->assertViewHas('adverts');
        $response->assertStatus(200);

    }

    /**
     * @test
     */
    public function can_return_single_advert(){

        $this->withoutExceptionHandling();
        $advert = factory(Advert::class)->create(['status_id'=>2]);

        $response = $this->get('skelbimai/'.$advert->id);

        $response->assertViewIs('adverts.single');
        $response->assertViewHas('advert');
        $response->assertStatus(200);

    }

//    /**
//    * @test
//     */
//    public function can_return_single_advert(){
//        $this->seed();
//
//        $this->withoutExceptionHandling();
//        $advert = factory(Advert::class)->create();
//
//        $response = $this->get('skelbimai/'.$advert->id);
//        $response->assertOk();
//        $response->assertViewIs('adverts.single');
//        $response->assertViewHas('advert');
//
//    }


////
////    /**
////     * @test
////     */
////    public function only_logged_in_user_can_store_advert()
////    {
////        ;
////        $this->withoutExceptionHandling();
////        $faker = Factory::create();
////        $user = factory(User::class)->create();
////        $response = $this->actingAs($user, 'api')
////            ->json('POST', '/api/skelbimai/', [
////                'title' => $title = $faker->colorName,
////                'type' => $type = random_int(1, 2),
////                'description' => $description = $faker->text,
////                'user_id' => $user = $user->id,
////                'category_id' => $category_id = Category::all()->random()->id,
////                'city_id' => $city = City::all()->random()->id,
////                'price' => $price = random_int(1, 1000),
////                'phone' => $phone = $faker->phoneNumber,
////                'email' => $email = $faker->email,
////                'web_page' => $web = $faker->url,
////                'status_id' => $status = random_int(1, 4),
////
////            ])->assertStatus(201);
////
////        $this->assertDatabaseHas('adverts', [
////            'title' => $title,
////            'type' => $type,
////            'description' => $description,
////            'user_id' => $user,
////            'category_id' => $category_id,
////            'city_id' => $city,
////            'price' => $price,
////            'phone' => $phone,
////            'email' => $email,
////            'web_page' => $web,
////            'status_id' => $status,
////        ]);
////
////    }
////
////    /**
////     * @test
////     */
////    public function not_authenticated_user_cant_store_advert()
////    {
////        $this->withoutExceptionHandling([AuthenticationException::class]);
////        $faker = Factory::create();
////        $user = factory(User::class)->create();
////        $response = $this->json('POST', '/api/skelbimai/', [
////            'title' => $title = $faker->colorName,
////            'type' => $type = random_int(1, 2),
////            'description' => $description = $faker->text,
////            'user_id' => $user = $user->id,
////            'category_id' => $category_id = Category::all()->random()->id,
////            'city_id' => $city = City::all()->random()->id,
////            'price' => $price = random_int(1, 1000),
////            'phone' => $phone = $faker->phoneNumber,
////            'email' => $email = $faker->email,
////            'web_page' => $web = $faker->url,
////            'status_id' => $status = random_int(1, 5),
////
////        ]);
////
////        $response->assertStatus(401);
////    }
////
////    /**
////     * @test
////     */
////    public function get_single_advert()
////    {
//////        $this->withoutExceptionHandling();
////        $ad = $this->create("Advert");
////        $response = $this->json('GET', "/api/skelbimai/$ad->id");
//////        dd($response);
////
////        $response->assertJsonStructure([
////            'id',
////            'title',
////            'type',
////            'description',
////            'user_id',
////            'category_id',
////            'city_id',
////            'price',
////            'phone',
////            'email',
////            'web_page',
////            'status_id',
////            'created_at',
////            'updated_at'
////        ])
////            ->assertExactJson([
////                'id' => $ad->id,
////                'title' => $ad->title,
////                'type' => $ad->type,
////                'description' => $ad->description,
////                'user_id' => $ad->user_id,
////                'category_id' => $ad->category_id,
////                'city_id' => $ad->city_id,
////                'price' => $ad->price,
////                'phone' => $ad->phone,
////                'email' => $ad->email,
////                'web_page' => $ad->web_page,
////                'status_id' => $ad->status_id,
////                'created_at' => $ad->created_at,
////                'updated_at' => $ad->updated_at
////            ])
////            ->assertStatus(200);
////
////    }
//
//
}
