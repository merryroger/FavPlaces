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

Route::post('places/photos/add', 'PlaceController@doAddPhoto');

Route::get('places/{id}/photos/add', 'PlaceController@addPhoto');

Route::post('places/create', 'PlaceController@doAddPlace');

Route::get('places/create', 'PlaceController@addPlace');

Route::get('places/{id}/', 'PlaceController@showPlace');

Route::get('places', 'PlaceController@placeList');

Route::get('/', function () {
    return redirect('places');
});
