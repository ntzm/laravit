<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use App\Repositories\SubRepository;
use App\Http\Requests\StorePostRequest;
use Illuminate\Contracts\Auth\Guard as Auth;

class PostController extends Controller
{
    private $post;
    private $sub;
    private $auth;

    public function __construct(PostRepository $post, SubRepository $sub, Auth $auth)
    {
        $this->post = $post;
        $this->sub = $sub;
        $this->auth = $auth;

        $this->middleware('auth', ['except' => ['show']]);
    }

    public function show($subName, $slug)
    {
        $sub = $this->sub->findByName($subName);
        $post = $this->post->findBySlugThroughSub($sub, $slug);

        return view('subs.posts.show', compact('post'));
    }

    public function create($subName)
    {
        $sub = $this->sub->findByName($subName);

        return view('subs.posts.create', compact('sub'));
    }

    public function store($subName, StorePostRequest $request)
    {
        $sub = $this->sub->findByName($subName);
        $post = $this->post->store($sub, $this->auth->user(), $request->all());

        return redirect()->route('subs.posts.show', [$sub->name, $post->slug]);
    }

    public function vote($subName, $slug, $type)
    {
        $sub = $this->sub->findByName($subName);
        $post = $this->post->findBySlugThroughSub($sub, $slug);

        $this->post->vote($post, $this->auth->user(), $type);
    }
}
