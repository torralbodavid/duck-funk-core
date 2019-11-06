<?php

use Illuminate\Support\Facades\Route;

/*
 *
 */

/*
 * All routes inside here requires a login
 */
Route::group(['middleware' => ['web', 'auth', \Torralbodavid\DuckFunkCore\Http\Middleware\BanMiddleware::class], 'namespace' => 'Torralbodavid\DuckFunkCore\Http\Controllers'], function () {
    /*
     * Check where we start to construct the routes based in the config route param
     */
    Route::prefix(config('duck-funk.route'))->group(function () {

        /*
         * Those routes user will see if has logged in but has no avatar selected
         */
        Route::get('home', 'DuckController')->name('home');
        Route::get('hello', 'TestController@hello')->name('hello');
        Route::get('expulsion', function () {
            return view('duck-funk-core::ban');
        })->name('ban');

        /*
         * Avatar settings
         */
        Route::prefix('avatars')->group(function () {
            Route::get('select', 'AvatarController@select')->name('avatarSelect');
            Route::get('login', 'AvatarLoginController@login')->name('avatarLogin');
        });

        Route::get('hotel', 'GameController@showHotel')->name('hotel');
    });
});

Route::fallback(function () {
    abort(404, 'Page not found');
});
