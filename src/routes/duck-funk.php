<?php

use Illuminate\Support\Facades\Route;

/*
 *
 */

Route::group(array('middleware' => 'web', 'namespace' => 'Torralbodavid\DuckFunkCore\Http\Controllers'), function () {
    Route::prefix(config('duck-funk.route'))->group(function () {
        Route::get('duck', 'DuckController')->name('duck');
        Route::get('hello', 'TestController@hello')->name('hello');
    });
});
