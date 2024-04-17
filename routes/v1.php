<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Post\PostDeleteController;
use App\Http\Controllers\Post\PostDetailController;
use App\Http\Controllers\Post\PostListController;
use App\Http\Controllers\Post\PostSaveController;
use App\Http\Controllers\User\UserMeController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')
    ->group(function () {
        Route::withoutMiddleware('auth:api')
            ->post('login', LoginController::class)->name('login');
    });

Route::prefix('users')
    ->group(function () {
        Route::get('me', UserMeController::class)->name('users.me');
    });

Route::prefix('posts')
    ->group(function () {
        Route::withoutMiddleware('auth:api')->group(function () {
            Route::get('', PostListController::class)->name('posts');
            Route::get('{slug}', PostDetailController::class)->name('posts.detail');
        });

        Route::post('', PostSaveController::class);
        Route::delete('{slug}', PostDeleteController::class);
    });
