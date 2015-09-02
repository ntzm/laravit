<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Repositories\CommentRepository;
use App\Repositories\PostRepository;

class CommentController extends Controller
{
    private $comment;
    private $post;

    public function __construct(CommentRepository $comment, PostRepository $post)
    {
        $this->comment = $comment;
        $this->post = $post;
    }

    public function store($subName, $postSlug, Request $request)
    {
        $post = $this->post->findBySlugThroughSubName($subName, $postSlug);
        $this->comment->store($request, $post, Auth::user());

        return redirect()->back();
    }
}