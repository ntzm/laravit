<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class, 100)->create()->each(function ($post) {
            $post->user()->associate(App\User::random()->first());
            $post->sub()->associate(App\Sub::random()->first());
            $post->save();
        });
    }
}
