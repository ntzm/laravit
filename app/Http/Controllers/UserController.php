<?php

namespace App\Http\Controllers;

use App\User;
use Request;

class UserController extends Controller
{
    public function show($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $posts = $user->posts()->sort(Request::get('sort'))->simplePaginate(self::RESULTS_PER_PAGE);

        return view('user.show', compact('user', 'posts'));
    }
}
