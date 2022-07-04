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

    Route::resource('/area','AreaController');
    Route::get('/area/delete/all','AreaController@deleteAll')->name('area.delete.all');
    Route::post('/area/search','AreaController@search')->name('area.search');

    Route::resource('/car-model','CarModelController');
    Route::get('/car-model/delete/all','CarModelController@deleteAll')->name('car_model.delete.all');
    Route::post('/car-model/search','CarModelController@search')->name('car_model.search');


    Route::resource('/car','CarController');
    Route::get('/car/delete/all','CarController@deleteAll')->name('car.delete.all');
    Route::post('/car/search','CarController@search')->name('car.search');

    Route::get('/car/{id}/images','CarImageController@index')->name('car.image');
    Route::post('/car/{id}/create','CarImageController@store')->name('car.image.store');
    Route::delete('/car/{id}/destroy','CarImageController@destroy')->name('car.image.destroy');

    Route::resource('/device','CarDeviceController');
    Route::get('/device/delete/all','CarDeviceController@deleteAll')->name('device.delete.all');
    Route::post('/device/search','CarDeviceController@search')->name('device.search');

    Route::resource('/category','CarDeviceController');

    Route::resource('/user','UserController');
    Route::post('/user/search','UserController@search')->name('user.search');
    Route::get('/user/delete/all','UserController@deleteAll')->name('user.delete.all');

    Route::resource('/carstatuses','CarStatusController');
    Route::get('/carstatuses/delete/all','CarStatusController@deleteAll')->name('carstatuses.delete.all');

    Route::resource('/carcategories','CarCategoryController');
    Route::get('/carcategories/delete/all','CarCategoryController@deleteAll')->name('carcategories.delete.all');

    Route::resource('/orders','OrderController',
    [
        'only' => ['index', 'edit', 'update','show']
    ]
);
    Route::post('/orders/{id}/updateStatus','OrderController@updateStatus')->name('orders.updateStatus');
    Route::post('/orders/search','OrderController@search')->name('orders.search');
    Route::get('/orders/delete/all','OrderController@deleteAll')->name('orders.delete.all');

});
