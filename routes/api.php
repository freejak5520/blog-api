<?php

declare(strict_types=1);

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login', [\App\Http\Controllers\Auth\AuthController::class, 'login']);

Route::middleware('auth:api')
    ->group(function () {
        Route::post('logout', [\App\Http\Controllers\Auth\AuthController::class, 'logout']);
        Route::post('refresh', [\App\Http\Controllers\Auth\AuthController::class, 'refresh']);
        Route::get('me', \App\Http\Controllers\User\UserMeController::class);
    });
