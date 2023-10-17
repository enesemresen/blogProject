<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\User;


class CommentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'post_id' => Post::factory()->create()->id,
            'user_id' => User::factory()->create()->id,
            'content' => $this->faker->paragraph(2),
        ];
    }
}
