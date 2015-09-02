<?php

namespace App\Repositories;

use App\User;

class UserRepository
{
    public function findByUsername($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $user->posts = $user->posts()->simplePaginate(10);

        return $user;
    }
}
