<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    require __DIR__ . '/v1.php';
});

Route::prefix('v2')->group(function () {
    require __DIR__ . '/v2.php';
});
