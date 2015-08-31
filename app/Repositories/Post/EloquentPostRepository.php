<?php

namespace App\Repositories\Post;

use App\Repositories\EloquentRepository;
use App\Post;
use App\Sub;

class EloquentPostRepository extends EloquentRepository implements PostRepositoryInterface
{
    protected $field = 'slug';

    public function __construct(Post $post)
    {
        $this->model = $post;
    }

    public function findStrict($subName, $slug)
    {
        $sub = Sub::where('name', $subName)->firstOrFail();
        $post = Post::where('slug', $slug)->where('sub_id', $sub->id)->firstOrFail();

        return $post;
    }
}
