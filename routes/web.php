<?php

use Illuminate\Support\Facades\Route;
use App\Jobs\playagain;

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
Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/get-actors', 'HomeController@storeActors')->name('home.storeActors');
    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');
        Route::get('/choose-house','HomeController@chooseHouse');
        Route::post('/play-along','HomeController@showAlongPlayer');
        Route::post('/store-match','HomeController@storePlayAlong');
        Route::get('/follow-character', 'HomeController@chooseActors')->name('home.chooseActors');
        Route::put('/allot-users/{id}','HomeController@allotUsers');
        Route::get('/play-again','HomeController@playGame');
    });
});
