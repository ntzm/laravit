<?php

namespace App\Http\Controllers;

use App\Post;

class PostController extends Controller
{
    public function show($slug)
    {
        $post = Post::findBySlug($slug);
        $comments = $post->comments;

        return view('subs.posts.show', compact('post', 'comments'));
    }
}
