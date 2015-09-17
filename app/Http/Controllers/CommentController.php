<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Sub;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store($subName, $postSlug, Request $request)
    {
        $sub = Sub::where('name', $subName)->firstOrFail();
        $post = Post::where('slug', $postSlug)
            ->where('sub_id', $sub->id)
            ->firstOrFail();

        $comment = Comment::create($request->all());
        $comment->post()->associate($post);
        $comment->user()->associate(auth()->user());

        $comment->save();

        return redirect()->back();
    }
}
