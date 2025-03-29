<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(6), // Generates a random title
            'content' => $this->faker->paragraph(4), // Generates random content
            'image' => 'posts/' . $this->faker->image('public/', 640, 480, null, false), // Dummy image path
            'user_id' => 1, // Default user ID
            'created_at' => now(), // Current date and time
            'updated_at' => now(),
        ];
    }
}
