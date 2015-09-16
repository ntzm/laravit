<?php

namespace App\Http\Controllers;

use App\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::simplePaginate(self::RESULTS_PER_PAGE);

        return view('index', compact('posts'));
    }
}
