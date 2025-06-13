<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\User;

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
        $title = $this->faker->sentence();
        return [
            'title' => $title,
            'user_id' => User::inRandomOrder()->first()->id,  // <-- Asigna un user_id existente aleatorio
            'slug' => Post::generateSlug($title),
            'content' => $this->faker->text(1000),
            
        ];
    }
}
