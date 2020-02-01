<?php

use Illuminate\Support\Facades\Route;
use Torralbodavid\DuckFunkCore\Http\Middleware\BanMiddleware;

Route::prefix('api')->group(function () {
    Route::prefix('newuser')->group(function () {
        Route::group(['middleware' => ['web', 'auth', BanMiddleware::class]], function () {
            Route::prefix('name')->group(function () {
                Route::post('check', [\Torralbodavid\DuckFunkCore\Http\Controllers\API\Welcome\WelcomeController::class, 'check']);
            });
        });
    });
});
