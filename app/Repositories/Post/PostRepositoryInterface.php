<?php

namespace App\Repositories\Post;

interface PostRepositoryInterface
{
    public function all();
    public function find($slug);
    public function findStrict($subName, $slug);
}
