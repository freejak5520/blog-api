<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Post\PostDeleteController;
use App\Http\Controllers\Post\PostDetailController;
use App\Http\Controllers\Post\PostListController;
use App\Http\Controllers\Post\PostSaveController;
use App\Http\Controllers\User\UserMeController;
use Illuminate\Support\Facades\Route;

Route::withoutMiddleware('auth:api')
    ->post('login', [AuthController::class, 'login'])->name('login');

Route::post('logout', [AuthController::class, 'logout']);
Route::post('refresh', [AuthController::class, 'refresh']);
Route::get('me', UserMeController::class);

Route::prefix('posts')
    ->group(function () {
        Route::get('', PostListController::class)->name('posts');
        Route::post('', PostSaveController::class);
        Route::get('{id}', PostDetailController::class)->name('posts.detail');
        Route::delete('{id}', PostDeleteController::class)->name('posts.detail');
    });
