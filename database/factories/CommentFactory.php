<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\{Comment, Post, User};

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_id' => function() {
                return Post::factory()->create()->id;
            },
            'commentator_id' => function() {
                return User::factory()->create()->id;
            },
            'content' => $this->faker->text(),
            'created_at' => now()
        ];
    }
}
