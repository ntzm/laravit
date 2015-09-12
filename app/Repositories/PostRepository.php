<?php

namespace App\Repositories;

use App\Post;
use App\Vote;
use App\Sub;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostRepository extends Repository
{
    /**
     * @var Post
     */
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Get paginated posts
     *
     * @return \Illuminate\Pagination\Paginator
     */
    public function all()
    {
        return $this->post->hot()->simplePaginate($this->resultsPerPage);
    }

    /**
     * Find a post by slug that belongs to a given sub
     *
     * @param Sub $sub  The sub the post belongs to
     * @param     $slug The slug of the post
     * @return Post
     */
    public function findBySlugThroughSub(Sub $sub, $slug)
    {
        $post = $this->post->where('slug', $slug)->where('sub_id', $sub->id)->firstOrFail();

        return $post;
    }

    /**
     * Create and store a new post
     *
     * @param Sub   $sub    The sub the post is being posted to
     * @param User  $user   The user that posted the post
     * @param array $values The values to be filled
     * @return Post
     */
    public function store(Sub $sub, User $user, array $values)
    {
        $post = $this->post->create($values);

        $sub->posts()->save($post);
        $user->posts()->save($post);

        // Upvote your own posts automatically
        $this->vote($post, $user, 1);

        return $post;
    }

    /**
     * Vote on a post
     *
     * @param Post $post  The post being voted on
     * @param User $user  The user voting
     * @param int  $value The vote weight
     */
    public function vote(Post $post, User $user, $value)
    {
        if (!in_array($value, [-1, 0, 1])) {
            abort(400); // TODO: Throw an exception here
        }

        try {
            $vote = $post->votes()->where('user_id', $user->id)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            $vote = new Vote;
        }

        $vote->value = $value;
        $vote->save();

        $user->votes()->save($vote);
        $post->votes()->save($vote);
    }
}
