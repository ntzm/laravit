<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    public function show($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $posts = $user->posts()->simplePaginate(10);

        return view('users.show', compact('user', 'posts'));
    }
}
