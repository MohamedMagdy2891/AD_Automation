<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/dashboard')->name('dashboard.')->namespace('DASHBOARD')->group(function(){
    Route::resource('/region','RegionController');
    Route::get('/region/delete/all','RegionController@deleteAll')->name('region.delete.all');

    Route::resource('/garage','GarageController');
    Route::get('/garage/delete/all','GarageController@deleteAll')->name('garage.delete.all');
    Route::post('/garage/search','GarageController@search')->name('garage.search');

    Route::resource('/car-model','CarModelController');
    Route::get('/car-model/delete/all','CarModelController@deleteAll')->name('car_model.delete.all');
    Route::post('/car-model/search','CarModelController@search')->name('car_model.search');


    Route::resource('/car','CarController');
    Route::get('/car/delete/all','CarController@deleteAll')->name('car.delete.all');
    Route::post('/car/search','CarController@search')->name('car.search');

    Route::get('/car/{id}/images','CarImageController@index')->name('car.image');

});
