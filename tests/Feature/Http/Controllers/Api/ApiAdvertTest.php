<?php
//
//namespace Tests\Feature\Http\Controllers;
//
//use App\Models\Advert;
//use App\Models\Category;
//use App\Models\City;
//use App\Models\User;
//use Faker\Factory;
//use Illuminate\Auth\AuthenticationException;
//use Tests\TestCase;
//use Illuminate\Foundation\Testing\RefreshDatabase;
//use Illuminate\Foundation\Testing\WithoutMiddleware;
//
//class ApiAdvertTest extends TestCase
//{
////    use refreshDatabase;
//
//
////    /**
////     * Connect to adverts page test.
////     * @test
////     * @return void
////     */
////    public function connect_to_adverts_page()
////    {
////        $this->withoutExceptionHandling();
////        $response = $this->get('/api/skelbimai');
////        $response->assertStatus(200);
////    }
//
//    /**
//     * @test
//     */
//    public function non_authenticated_users_cannot_access_the_following_endpoints_for_the_advert_api()
//    {
//        $store = $this->json('POST', '/api/skelbimai');
//        $store->assertStatus(401);
//        $update = $this->json('PUT', '/api/skelbimai/-1');
//        $update->assertStatus(401);
//        $update = $this->json('PATCH', '/api/skelbimai/-1');
//        $update->assertStatus(401);
//        $destroy = $this->json('DELETE', '/api/skelbimai/-1');
//        $destroy->assertStatus(401);
//    }
//
//    /**
//     * @test
//     */
//    public function can_return_a_collection_of_paginated_adverts()
//    {
//        $faker = Factory::create();
//        $ad1 = factory(Advert::class)->create();
//        $ad2 = factory(Advert::class)->create();
//        $ad3 = factory(Advert::class)->create();
//        $ad4 = factory(Advert::class)->create();
//        $ad5 = factory(Advert::class)->create();
//
//        $user = factory(User::class)->create();
//        $response = $this->actingAs($user, 'api')
//            ->json('GET', '/api/skelbimai/');
//$response->assertStatus(200);
////        dd($response->assertJsonStructure());
////        $response->assertStatus(200)
////            ->ç([
////                'data'=>['id', 'title', 'type', 'short_desc','city_name', 'price', 'created_at'],
////
////            ]);
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
//}
