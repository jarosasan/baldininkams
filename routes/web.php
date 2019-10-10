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

Route::resource('/skelbimai', 'AdvertsController')->middleware('auth')->except(['index', 'show']);
Route::resource('/skelbimai', 'AdvertsController')->only(['index', 'show']);

