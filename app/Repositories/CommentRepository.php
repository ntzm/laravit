<?php

namespace App\Repositories;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class CommentRepository
{
    public function store(Request $request, Post $post, User $user)
    {
        $comment = Comment::create($request->all());
        $comment->post()->associate($post);
        $comment->user()->associate($user);
        $comment->save();

        return $comment;
    }
}
