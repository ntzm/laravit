<?php

namespace App\Repositories;

use App\Comment;
use App\Post;
use App\User;

class CommentRepository extends Repository
{
    /**
     * @var Comment
     */
    private $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Create and store a new comment
     *
     * @param Post  $post   The post that is being commented on
     * @param User  $user   The user that is commenting
     * @param array $values The values to be filled
     * @return Comment
     */
    public function store(Post $post, User $user, array $values)
    {
        $comment = $this->comment->create($values);
        $comment->post()->associate($post);
        $comment->user()->associate($user);
        $comment->save();

        return $comment;
    }
}
