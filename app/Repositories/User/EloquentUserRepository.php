<?php

namespace App\Repositories\User;

use App\User;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function findByUsername($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $user->posts = $user->posts()->simplePaginate(10);

        return $user;
    }
}
