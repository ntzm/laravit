<?php

namespace App\Repositories;

use App\User;

class UserRepository extends Repository
{
    private $user;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function findByUsername($username)
    {
        $user = $this->user->where('username', $username)->firstOrFail();
        $user->posts = $user->posts()->simplePaginate($this->resultsPerPage);

        return $user;
    }
}
