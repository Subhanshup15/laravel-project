<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Post;


class PostFactory extends Factory
{
    protected $model = \App\Models\Post::class;

    public function definition()
    {
        return [
            'user_id' => Post::factory(), // create a user automatically
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraph(3),
            'published' => $this->faker->boolean(70), // 70% chance published
        ];
    }
}
