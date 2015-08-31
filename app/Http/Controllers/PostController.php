<?php

namespace App\Http\Controllers;

use App\Post;
use App\Sub;

class PostController extends Controller
{
    public function show($subName, $slug)
    {
        $sub = Sub::where('name', $subName)->firstOrFail();
        $post = Post::where('slug', $slug)->where('sub_id', $sub->id)->firstOrFail();
        $comments = $post->comments;

        return view('subs.posts.show', compact('post', 'comments'));
    }
}
