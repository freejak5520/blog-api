<?php

declare(strict_types=1);

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('register', function () {
    $email = $this->ask('Email');
    $username = $this->ask('Username');
    $password = $this->ask('Password');

    $user = \App\Models\User::create([
        'email' => $email,
        'name' => $username,
        'password' => bcrypt($password),
    ]);

    $this->info($user->toJson());
});
