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


Route::post('login','Api\V1\AuthController@login');

Route::group(['middleware'=>['jwt.auth'],'namespace'=>'Api\V1'],function(){
    
    Route::get('/team','TeamController@index');
    Route::post('/team','TeamController@store');
    Route::post('/player','PlayerController@store');
    Route::put('/player','PlayerController@update');
});

