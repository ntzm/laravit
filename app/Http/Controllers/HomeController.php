<?php

namespace App\Http\Controllers;

use App\Post;
use Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::sort(Request::get('sort'))->simplePaginate(self::RESULTS_PER_PAGE);

        return view('index', compact('posts'));
    }
}
