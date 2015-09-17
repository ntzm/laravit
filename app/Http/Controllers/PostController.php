<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Jobs\GeneratePreview;
use App\Post;
use App\Sub;
use App\Vote;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function show($subName, $slug)
    {
        $sub = Sub::where('name', $subName)->firstOrFail();
        $post = Post::where('slug', $slug)
            ->where('sub_id', $sub->id)
            ->firstOrFail();

        return view('post.show', compact('post'));
    }

    public function create($subName)
    {
        $sub = Sub::where('name', $subName)->firstOrFail();

        return view('post.create', compact('sub'));
    }

    public function store($subName, StorePostRequest $request)
    {
        $sub = Sub::where('name', $subName)->firstOrFail();

        $post = Post::create($request->all());
        $post->sub()->associate($sub);
        $post->user()->associate(auth()->user());

        $post->save();

        $this->dispatch(new GeneratePreview($post));

        return redirect()->route('sub.post.show', [$sub->name, $post->slug]);
    }

    public function vote($subName, $slug, $value)
    {
        if (! in_array($value, [-1, 0, 1])) {
            abort(400);
        }

        $sub = Sub::where('name', $subName)->firstOrFail();
        $post = Post::where('slug', $slug)
            ->where('sub_id', $sub->id)
            ->firstOrFail();

        try {
            $vote = $post->votes()
                ->where('user_id', auth()->id())
                ->firstOrFail();
        } catch (ModelNotFoundException $e) {
            $vote = new Vote;
        }

        $vote->value = $value;
        $vote->user()->associate(auth()->user());
        $vote->voteable()->associate($post);

        $vote->save();

        $post->score += $value;
        $post->save();
    }
}
