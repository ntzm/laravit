<?php

namespace App\Http\Controllers;

use App\Repositories\CommentRepository;
use App\Repositories\PostRepository;
use App\Repositories\SubRepository;
use Illuminate\Contracts\Auth\Guard as Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private $comment;
    private $post;
    private $sub;
    private $auth;

    public function __construct(CommentRepository $comment, PostRepository $post, SubRepository $sub, Auth $auth)
    {
        $this->comment = $comment;
        $this->post = $post;
        $this->sub = $sub;
        $this->auth = $auth;
    }

    public function store($subName, $postSlug, Request $request)
    {
        $sub = $this->sub->findByName($subName);
        $post = $this->post->findBySlugThroughSub($sub, $postSlug);
        $this->comment->store($post, $this->auth->user(), $request->all());

        return redirect()->back();
    }
}
