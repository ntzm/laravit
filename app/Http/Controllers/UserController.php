<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    public function show($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $posts = $user->posts()->simplePaginate(self::RESULTS_PER_PAGE);

        return view('user.show', compact('user', 'posts'));
    }
}
