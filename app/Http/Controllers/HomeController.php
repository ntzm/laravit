<?php

namespace App\Http\Controllers;

use App\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('index', compact('posts'));
    }
}
