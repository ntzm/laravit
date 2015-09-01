<?php

namespace App\Repositories\Post;

use App\Repositories\EloquentRepository;
use App\Post;
use App\Sub;
use App\User;
use Illuminate\Http\Request;

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
        $post = Post::where($this->field, $slug)->where('sub_id', $sub->id)->firstOrFail();

        return $post;
    }

    public function store(Request $request, Sub $sub, User $user)
    {
        $post = Post::create($request->all());
        $post->sub()->associate($sub);
        $post->user()->associate($user);
        $post->save();

        return $post;
    }
}
