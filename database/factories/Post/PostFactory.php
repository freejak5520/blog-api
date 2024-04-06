<?php

declare(strict_types=1);

namespace Database\Factories\Post;

use App\Models\Post\Post;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => fake()->text(255),
            'content' => fake()->text(1000),
        ];
    }
}
