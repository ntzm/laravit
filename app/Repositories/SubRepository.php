<?php

namespace App\Repositories;

use App\User;
use App\Sub;

class SubRepository extends Repository
{
    private $sub;

    public function __construct(Sub $sub) {
        $this->sub = $sub;
    }

    public function findByName($name)
    {
        $sub = $this->sub->where('name', $name)->firstOrFail();
        $sub->posts = $sub->posts()->simplePaginate($this->resultsPerPage);

        return $sub;
    }

    public function store(User $user, array $values)
    {
        $sub = $this->sub->create($values);
        $user->subs()->save($sub);

        return $sub;
    }
}
