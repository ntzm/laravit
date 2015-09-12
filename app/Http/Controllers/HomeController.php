<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;

class HomeController extends Controller
{
    private $post;

    public function __construct(PostRepository $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        $posts = $this->post->all();

        return view('index', compact('posts'));
    }
}
