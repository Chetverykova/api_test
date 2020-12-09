<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Post, Image, User};

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory()
        ->count(25)
        ->create()
        ->each(function ($user) {
            $user = User::find(rand(1, 50));
        })
        ->each(function ($post) {
            $image = Image::find(rand(1, 5));
        });
    }
}
