<?php

namespace App\Repositories\User;

use App\Repositories\EloquentRepository;
use App\User;

class EloquentUserRepository extends EloquentRepository implements UserRepositoryInterface
{
    protected $field = 'username';

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function find($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $user->posts = $user->posts()->simplePaginate(10);

        return $user;
    }
}
