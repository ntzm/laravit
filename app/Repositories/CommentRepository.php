<?php

namespace App\Repositories;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class CommentRepository extends Repository
{
    /**
     * Create and store a new comment
     *
     * @param Request $request
     * @param Post    $post The post that is being commented on
     * @param User    $user The user that is commenting
     * @return Comment
     */
    public function store(Request $request, Post $post, User $user)
    {
        $comment = Comment::create($request->all());
        $comment->post()->associate($post);
        $comment->user()->associate($user);
        $comment->save();

        return $comment;
    }
}
