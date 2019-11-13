<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \Torralbodavid\DuckFunkCore\Http\Middleware\BanMiddleware;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::group(['middleware' => ['web'], 'namespace' => 'App\Http\Controllers'], function () {
    Auth::routes();
    Route::get('logout', 'Auth\LoginController@logout');
});

Route::group(['middleware' => ['web', 'auth', BanMiddleware::class], 'namespace' => 'Torralbodavid\DuckFunkCore\Http\Controllers'], function () {
    /*
     * Check where we start to construct the routes based in the config route param
     */
    Route::prefix(config('duck-funk.route'))->group(function () {

        Route::get('home', 'DuckController')->name('home');
        Route::get('expulsion', function () {
            return view('duck-funk-core::ban');
        })->name('ban');

        Route::get('hotel', 'GameController@showHotel')->name('hotel');
    });
});

Route::fallback(function (){
    abort(404);
});
