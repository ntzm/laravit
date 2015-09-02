<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepository;
use App\Repositories\SubRepository;
use Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $post;
    private $sub;

    public function __construct(PostRepository $post, SubRepository $sub)
    {
        $this->post = $post;
        $this->sub = $sub;

        $this->middleware('auth', ['except' => ['show']]);
    }

    public function show($subName, $slug)
    {
        $post = $this->post->findBySlugThroughSubName($subName, $slug);

        return view('subs.posts.show', compact('post'));
    }

    public function create($subName)
    {
        $sub = $this->sub->findByName($subName);

        return view('subs.posts.create', compact('sub'));
    }

    public function store($subName, Request $request)
    {
        $sub = $this->sub->findByName($subName);
        $post = $this->post->store($request, $sub, Auth::user());

        return redirect()->route('subs.posts.show', [$sub->name, $post->slug]);
    }
}
