<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/countries','ClientAuthController@countries')->name('client.countries');
Route::post('/register','ClientAuthController@register')->name('client.register');
Route::post('/login','ClientAuthController@login')->name('client.login');
