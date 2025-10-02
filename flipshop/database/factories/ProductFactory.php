<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->unique()->words(3, true);
        return [
            'title' => ucfirst($title),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 99, 9999),
            'stock' => $this->faker->numberBetween(0, 200),
            'image_url' => 'https://picsum.photos/seed/'.md5($title).'/600/400',
            'is_active' => true,
        ];
    }
}