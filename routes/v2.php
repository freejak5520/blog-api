<?php

declare(strict_types=1);

use App\Http\Controllers\Post\PostDetailV2Controller;

Route::prefix('posts')
    ->group(function () {
        Route::withoutMiddleware('auth:api')->group(function () {
            Route::get('{slug}', PostDetailV2Controller::class)->name('posts.detail');
        });
    });
