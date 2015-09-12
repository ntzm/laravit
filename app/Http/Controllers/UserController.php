<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;

class UserController extends Controller
{
    private $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function show($username)
    {
        $user = $this->user->findByUsername($username);

        return view('user.show', compact('user'));
    }
}
