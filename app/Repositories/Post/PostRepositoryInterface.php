<?php

namespace App\Repositories\Post;

interface PostRepositoryInterface
{
    public function findStrict($subName, $slug);
}
