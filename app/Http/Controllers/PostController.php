<?php

namespace App\Http\Controllers;

use App\Repositories\Post\PostRepositoryInterface as Post;

class PostController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }
    
    public function show($subName, $slug)
    {
        $post = $this->post->findStrict($subName, $slug);

        return view('subs.posts.show', compact('post'));
    }
}
