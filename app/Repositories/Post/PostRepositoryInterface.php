<?php

namespace App\Repositories\Post;

use App\Sub;
use App\User;
use Illuminate\Http\Request;

interface PostRepositoryInterface
{
    public function findStrict($subName, $slug);
    public function store(Request $request, Sub $sub, User $user);
}
