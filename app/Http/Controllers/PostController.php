<?php

namespace App\Http\Controllers;

use App\Repositories\Post\PostRepositoryInterface as PostRepository;
use App\Repositories\Sub\SubRepositoryInterface as SubRepository;
use Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $postRepository;
    private $subRepository;

    public function __construct(PostRepository $postRepository, SubRepository $subRepository)
    {
        $this->postRepository = $postRepository;
        $this->subRepository = $subRepository;

        $this->middleware('auth', ['except' => ['show']]);
    }
    
    public function show($subName, $slug)
    {
        $post = $this->postRepository->findStrict($subName, $slug);

        return view('subs.posts.show', compact('post'));
    }

    public function create($subName)
    {
        $sub = $this->subRepository->find($subName);

        return view('subs.posts.create', compact('sub'));
    }

    public function store($subName, Request $request)
    {
        $sub = $this->subRepository->find($subName);
        $post = $this->postRepository->store($request, $sub, Auth::user());

        return redirect()->route('subs.posts.show', [$sub->name, $post->slug]);
    }
}
