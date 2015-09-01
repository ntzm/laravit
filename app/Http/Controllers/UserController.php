<?php

namespace App\Http\Controllers;

use App\Repositories\User\UserRepositoryInterface as UserRepository;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function show($username)
    {
        $user = $this->userRepository->findByUsername($username);

        return view('users.show', compact('user'));
    }
}
