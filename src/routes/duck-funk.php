<?php

use Illuminate\Support\Facades\Route;

/*
 *
 */

Route::group(['middleware' => ['web', 'auth'], 'namespace' => 'Torralbodavid\DuckFunkCore\Http\Controllers'], function () {
    Route::prefix(config('duck-funk.route'))->group(function () {
        Route::get('home', 'DuckController')->name('duck');
        Route::get('hello', 'TestController@hello')->name('hello');
    });
});

Route::fallback(function () {
    return 'Hm, why did you land here somehow?';
});
