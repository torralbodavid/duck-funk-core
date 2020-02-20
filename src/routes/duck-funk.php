<?php

use Illuminate\Support\Facades\Route;
use Torralbodavid\DuckFunkCore\Http\Middleware\BanMiddleware;
use Torralbodavid\DuckFunkCore\Http\Middleware\HousekeepingMiddleware;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::group(['middleware' => ['web'], 'namespace' => 'Torralbodavid\DuckFunkCore\Http\Controllers'], function () {
    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');

    Route::get('logout', 'Auth\LoginController@logout');
});

Route::group(['middleware' => ['web'], 'namespace' => 'Torralbodavid\DuckFunkCore\Http\Controllers'], function () {
    Route::get('auth/social', 'AuthController@redirectToProvider')->name('facebook.login');
    Route::get('auth/facebook/callback', 'AuthController@handleProviderCallback')->name('facebook.callback');
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

        /*
         * Housekeeping routes
         */
        Route::group(['middleware' => [HousekeepingMiddleware::class, 'password.confirm'], 'namespace' => 'Housekeeping'], function () {
            Route::prefix(config('duck-funk.housekeeping_route'))->group(function () {
                Route::resource('news', 'NewsController');
                Route::get('/', 'DashboardController@index')->name('housekeeping');
                Route::post('dashboard-parser', 'DashboardController@getUpdateWall')->name('dashboard-parser');
            });
        });
    });
});

Route::fallback(function () {
    abort(404);
});
