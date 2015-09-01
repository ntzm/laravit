<?php

namespace App\Repositories\Comment;

use App\Post;
use App\User;
use Illuminate\Http\Request;

interface CommentRepositoryInterface
{
    public function store(Request $request, Post $post, User $user);
}
