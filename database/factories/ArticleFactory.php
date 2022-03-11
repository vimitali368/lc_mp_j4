<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->sentence(10),
            'content' => $this->faker->text,
            'preview_image' => $this->faker->imageUrl(320, 240),
            'user_id' => User::role('author-user')->get()->random()->id,
        ];
    }
}
