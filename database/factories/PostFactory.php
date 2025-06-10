<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
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
            'description' => fake()->sentence(),
            'slug' => fake()->regexify('[A-Za-z0-9]{10}'),
            'user_id' => User::factory(),
            'image' => 'https://picsum.photos/seed/' . fake()->unique()->numberBetween(1, 1000) . '/640/480',
            'likes' => fake()->numberBetween(0, 1000),
        ];
    }
}
