<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Comment::class, 500)->create()->each(function ($comment) {
            $comment->user()->associate(App\User::random()->first());
            $comment->post()->associate(App\Post::random()->first());
            // TODO: Seed parent/child comment relationship
            $comment->save();
        });
    }
}
