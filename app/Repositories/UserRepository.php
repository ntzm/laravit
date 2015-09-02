<?php

namespace App\Repositories;

use App\User;

class UserRepository extends Repository
{
    public function findByUsername($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $user->posts = $user->posts()->simplePaginate($this->resultsPerPage);

        return $user;
    }
}
