<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');

Auth::routes();

Route::view('/admin/{path?}', 'admin.app')
    ->where('path', '.*')
    ->name('react');

Route::get('/skelbimai', 'AdvertsController@index')->name('adverts.all');
Route::get('/skelbimai/{id}', 'AdvertsController@show')->name('adverts.single');

Route::middleware('auth')->group( function(){
    Route::get('/mano-skelbimai', 'AdvertsController@getUserAdverts')->name('user.adverts');
    Route::get('/mano-skelbimai/create', 'AdvertsController@create')->name('adverts.create');
    Route::post('/mano-skelbimai', 'AdvertsController@store')->name('adverts.store');
    Route::get('/mano-skelbimai/{id}/edit', 'AdvertsController@edit')->name('adverts.edit');
    Route::patch('/mano-skelbimai/', 'AdvertsController@update')->name('adverts.update');
    Route::delete('/mano-skelbimai/{id}', 'AdvertsController@destroy')->name('adverts.delete');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
