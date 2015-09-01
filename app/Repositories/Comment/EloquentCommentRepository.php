<?php

namespace App\Repositories\Comment;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Repositories\Post\PostRepositoryInterface as PostRepository;

class EloquentCommentRepository implements CommentRepositoryInterface
{
    private $postRepository;

    public function __construct(PostRepository $postRepository) {

        $this->postRepository = $postRepository;
    }

    public function store(Request $request, Post $post, User $user)
    {
        $comment = Comment::create($request->all());
        $comment->post()->associate($post);
        $comment->user()->associate($user);
        $comment->save();

        return $comment;
    }
}
