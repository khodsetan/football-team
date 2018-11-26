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

Route::get('/', function () {
    return view('welcome');
    
});
Route::get('/clear', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode1 = Artisan::call('config:cache');
    return "<p>cache was cleared</p><a href='/'>Home</a>";
});

Route::get('/',function(){
    return view('index');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
