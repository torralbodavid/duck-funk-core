<?php

use Illuminate\Support\Facades\Route;
use Torralbodavid\DuckFunkCore\Http\Controllers\DuckController;

/*
 *
 */
Route::prefix(config('duck-funk.route'))->group(function () {
    Route::get('duck', DuckController::class)->name('duck');
});
