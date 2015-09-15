<?php

namespace App\Repositories;

use App\User;

class UserRepository extends Repository
{
    /**
     * @var User
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Find a user by username.
     *
     * @param string $username
     * @return User
     */
    public function findByUsername($username)
    {
        $user = $this->user->where('username', $username)->firstOrFail();
        $user->posts = $user->posts()->simplePaginate($this::RESULTS_PER_PAGE);

        return $user;
    }
}
