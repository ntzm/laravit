<?php

namespace App\Repositories;

use Auth;
use App\Sub;
use Illuminate\Http\Request;

class SubRepository extends Repository
{
    public function findByName($name)
    {
        $sub = Sub::where('name', $name)->firstOrFail();
        $sub->posts = $sub->posts()->simplePaginate($this->resultsPerPage);

        return $sub;
    }

    public function store(Request $request)
    {
        $sub = Sub::create($request->all());
        $sub->owner()->associate(Auth::user());
        $sub->save();

        return $sub;
    }
}
