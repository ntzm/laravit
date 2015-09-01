<?php

namespace App\Repositories\Post;

use App\Sub;
use App\User;
use Illuminate\Http\Request;

interface PostRepositoryInterface
{
    public function findBySlugThroughSubName($subName, $slug);
    public function store(Request $request, Sub $sub, User $user);
}
