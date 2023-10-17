<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;


class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(10),
            'content' => $this->faker->paragraph(2),
            'user_id' => User::factory()->create()->id,
            'category_id' => Category::factory()->create()->id,
        ];
    }
}
