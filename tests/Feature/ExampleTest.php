<?php

declare(strict_types=1);

test('Application up', function () {
    $response = $this->get('/up');

    $response->assertStatus(200);
});

test('ping', function () {
    $response = $this->get('/ping');

    $response->assertStatus(200);
    $response->assertSee('pong');
});
