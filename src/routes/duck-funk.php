<?php

use Illuminate\Support\Facades\Route;

/*
 *
 */

/*
 * All routes inside here requires a login
 */
Route::group(['middleware' => ['web', 'auth'], 'namespace' => 'Torralbodavid\DuckFunkCore\Http\Controllers'], function () {
    /*
     * Check where we start to construct the routes based in the config route param
     */
    Route::prefix(config('duck-funk.route'))->group(function () {

        /*
         * Those routes user will see if has logged in but has no avatar selected
         */
        Route::get('home', 'DuckController')->name('home');
        Route::get('hello', 'TestController@hello')->name('hello');

        /*
         * Avatar settings
         */
        Route::prefix('avatars')->group(function () {
            Route::get('select', 'AvatarController@select')->name('avatarSelect');
            Route::get('login', 'AvatarLoginController@login')->name('avatarLogin');
        });

        /*
         * Those routes user will see if there is an avatar selected
         */
        Route::group(['middleware' => \Torralbodavid\DuckFunkCore\Http\Middleware\AvatarAuthenticate::class], function () {
            Route::get('hotel', 'GameController@showHotel')->name('hotel');
        });
    });
});

Route::fallback(function () {
    return 'Hm, why did you land here somehow?';
});
