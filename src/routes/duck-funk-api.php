<?php

use Illuminate\Support\Facades\Route;
use Torralbodavid\DuckFunkCore\Http\Middleware\BanMiddleware;

Route::prefix('api')->group(function () {
    Route::group(['middleware' => ['web', 'auth', BanMiddleware::class]], function () {
        Route::post('newuser/name/check', [\Torralbodavid\DuckFunkCore\Http\Controllers\API\Welcome\WelcomeController::class, 'check']);
        Route::post('newuser/name/select', [\Torralbodavid\DuckFunkCore\Http\Controllers\API\Welcome\WelcomeController::class, 'select']);
        Route::post('newuser/room/select', [\Torralbodavid\DuckFunkCore\Http\Controllers\API\Welcome\WelcomeController::class, 'roomSelect']);
        Route::post('user/look/save', [\Torralbodavid\DuckFunkCore\Http\Controllers\API\Welcome\WelcomeController::class, 'save']);
    });
});
