<?php

namespace App\Repositories;

use App\Sub;
use App\User;

class SubRepository extends Repository
{
    /**
     * @var Sub
     */
    private $sub;

    public function __construct(Sub $sub)
    {
        $this->sub = $sub;
    }

    /**
     * Find a sub by name
     *
     * @param string $name The name of the sub
     * @return Sub
     */
    public function findByName($name)
    {
        $sub = $this->sub->where('name', $name)->firstOrFail();
        $sub->posts = $sub->posts()->simplePaginate($this::RESULTS_PER_PAGE);

        return $sub;
    }

    /**
     * Create and store a sub
     *
     * @param User  $user   The user creating the sub
     * @param array $values The values to be filled
     * @return Sub
     */
    public function store(User $user, array $values)
    {
        $sub = $this->sub->create($values);
        $user->subs()->save($sub);

        return $sub;
    }
}
