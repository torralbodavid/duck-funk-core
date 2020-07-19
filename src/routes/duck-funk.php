<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Torralbodavid\DuckFunkCore\Http\Middleware\BanMiddleware;
use Torralbodavid\DuckFunkCore\Http\Middleware\HousekeepingMiddleware;
use Torralbodavid\DuckFunkCore\Http\Middleware\PageMiddleware;

Route::group(['middleware' => ['web'], 'namespace' => 'Torralbodavid\DuckFunkCore\Http\Controllers'], function () {
    Auth::routes();

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
        Route::get('expulsion', function () {
            Session::flush();

            return view('duck-funk-core::fuse.ban');
        })->name('ban');

        /*
         * Housekeeping routes
         */
        Route::group(['middleware' => [HousekeepingMiddleware::class, 'password.confirm'], 'namespace' => 'Housekeeping'], function () {
            Route::prefix(config('duck-funk.housekeeping_route'))->group(function () {
                Route::resource('news', 'NewsController');
                Route::resource('pages', 'PageController');
                Route::get('/', 'DashboardController@index')->name('housekeeping');
                Route::post('dashboard-parser', 'DashboardController@getUpdateWall')->name('dashboard-parser');
            });
        });

        Route::group(['middleware' => [PageMiddleware::class]], function () {
            Route::get('{slug}', ['uses' => 'PageController'])->where('slug', '([A-Za-z0-9\-\/]+)');
            Route::post('{slug}', ['uses' => 'PageController'])->where('slug', '([A-Za-z0-9\-\/]+)');
        });
    });
});

Route::fallback(function () {
    abort(404);
});
