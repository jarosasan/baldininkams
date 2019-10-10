<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
//Route::get('admin/categories', 'CategoryController@index');
//Route::get('admin/categories/{id}', 'CategoryController@getCategory');
//Route::delete('admin/categories/{id}', 'CategoryController@destroy');
//Route::post('admin/categories', 'CategoryController@store');
//Route::patch('admin/categories/{id}', 'CategoryController@update');

Route::group(['namespace'=>'Admin', 'prefix'=>'admin'], function(){
    Route::resource('categories', 'CategoryController')
        ->except('show');
    Route::get('categories/{id}', 'CategoryController@getCategory')->name('getCategory');
});

Route::middleware('auth:api')->group(function(){
   Route::resource('skelbimai', 'AdvertsController')->except(['index', 'show']);
});
Route::get('skelbimai', 'AdvertsController@index');
Route::get('skelbimai/{id}', 'AdvertsController@show');

