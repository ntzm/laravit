<?php

namespace App\Repositories;

use Auth;
use App\Post;
use App\Vote;
use App\Sub;
use App\User;

class PostRepository extends Repository
{
    public function findBySlugThroughSubName($subName, $slug)
    {
        $sub = Sub::where('name', $subName)->firstOrFail();
        $post = Post::where('slug', $slug)->where('sub_id', $sub->id)->firstOrFail();

        return $post;
    }

    public function store($request, Sub $sub, User $user)
    {
        $post = Post::create($request->all());
        $post->sub()->associate($sub);
        $post->user()->associate($user);
        $post->save();

        return $post;
    }

    public function vote($subName, $slug, $type)
    {
        $post = $this->findBySlugThroughSubName($subName, $slug);

        $type = (int)$type;
        $type = $type > 0 ? 1 : $type;
        $type = $type < 0 ? -1 : $type;

        $vote = Vote::firstOrCreate([
            'voteable_id' => $post->id,
            'voteable_type' => 'post',
            'user_id' => Auth::user()->id,
        ]);
        $vote->value = $type;
        $vote->save();
    }
}
