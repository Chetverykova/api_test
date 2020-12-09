<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{Post, User, Image};

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'author_id' => function() {
                return User::factory()->create()->id;
            },
            'image_id' => function() {
                return Image::factory()->create()->id;
            },
            'content' => $this->faker->text(),
            'created_at' => now()
        ];
    }
}
