<?php

namespace App\Http\Controllers;

use App\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::simplePaginate(15);

        return view('index', compact('posts'));
    }
}
