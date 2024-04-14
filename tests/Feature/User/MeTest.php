<?php

declare(strict_types=1);


use App\Models\User\User;

test('Test user me api Unauthorized', function () {
    $response = $this->get(route('users.me'));

    $response->assertUnauthorized();
});

test('Test user me api Success', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('users.me'));

    $response->assertJsonStructure([
        'data' => [
            'id',
            'name',
            'email',
            'created_at',
            'updated_at',
        ],
    ]);
    $response->assertJson(['data' => ['id' => $user->getKey()]]);
});
