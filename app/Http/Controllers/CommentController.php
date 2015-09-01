<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Repositories\Comment\CommentRepositoryInterface as CommentRepository;
use App\Repositories\Post\PostRepositoryInterface as PostRepository;

class CommentController extends Controller
{
    private $commentRepository;
    private $postRepository;

    public function __construct(CommentRepository $commentRepository, PostRepository $postRepository)
    {
        $this->commentRepository = $commentRepository;
        $this->postRepository = $postRepository;
    }

    public function store($subName, $postSlug, Request $request)
    {
        $post = $this->postRepository->findBySlugThroughSubName($subName, $postSlug);
        $this->commentRepository->store($request, $post, Auth::user());

        return redirect()->back();
    }
}