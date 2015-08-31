<?php

namespace App\Http\Controllers;

use App\Repositories\User\UserRepositoryInterface as User;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function show($username)
    {
        $user = $this->user->find($username);

        return view('users.show', compact('user'));
    }
}
