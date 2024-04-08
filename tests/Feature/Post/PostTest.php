<?php

declare(strict_types=1);

use App\Models\Post\Post;
use App\Models\User\User;

test('회원과 연결된 게시글', function () {
    $post = Post::factory()->hasUser()->create();

    $user = $post->user;

    $this->assertInstanceOf(User::class, $user);
});

test('게시글 목록', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get(route('posts'));

    $response->assertOk();
});

test('게시글 목록 권한 실패', function () {
    $response = $this->get(route('posts'));

    $response->assertUnauthorized();
});

test('게시글 등록', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('posts'), [
        'title' => fake()->title,
        'content' => fake()->sentences(asText: true),
    ]);

    $response->assertCreated();
});

test('게시글 등록 권한 실패', function () {
    $response = $this->post(route('posts'), [
        'title' => fake()->title,
        'content' => fake()->sentences(asText: true),
    ]);

    $response->assertUnauthorized();
});

test('게시글 상세페이지', function () {
    $user = User::factory()->hasPosts()->create();

    $post = $user->posts()->first();

    $response = $this->actingAs($user)->get(route('posts.detail', ['id' => $post->getKey()]));

    $response->assertOk();
});

test('게시글 상세페이지 권한 실패', function () {
    $user = User::factory()->has(
        Post::factory()
    )->create();

    $post = $user->posts()->first();

    $response = $this->get(route('posts.detail', ['id' => $post?->getKey()]));

    $response->assertUnauthorized();
});

test('게시글 삭제 권한 실패', function () {
    $users = User::factory(2)->has(Post::factory())->create();
    $user = $users->first();
    $post = $users->get(1)->posts()->first();

    $response = $this->actingAs($user)->delete(route('posts.detail', ['id' => $post->getKey()]));

    $response->assertForbidden();
});

test('게시글 삭제 비로그인', function () {
    $user = User::factory()->has(Post::factory())->create();
    $post = $user->posts()->first();

    $response = $this->delete(route('posts.detail', ['id' => $post->getKey()]));

    $response->assertUnauthorized();
});

test('게시글 삭제 성공', function () {
    $user = User::factory()->has(Post::factory())->create();
    $post = $user->posts()->first();

    $response = $this->actingAs($user)->delete(route('posts.detail', ['id' => $post->getKey()]));

    $response->assertOk();
});
