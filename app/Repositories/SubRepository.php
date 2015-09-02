<?php

namespace App\Repositories;

use Auth;
use App\Sub;

class SubRepository extends Repository
{
    public function findByName($name)
    {
        $sub = Sub::where('name', $name)->firstOrFail();
        $sub->posts = $sub->posts()->simplePaginate($this->resultsPerPage);

        return $sub;
    }

    public function store($request)
    {
        $sub = Sub::create($request->all());
        $sub->owner()->associate(Auth::user());
        $sub->save();

        return $sub;
    }
}
