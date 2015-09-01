<?php

namespace App\Repositories\Sub;

use Auth;
use App\Sub;
use Illuminate\Http\Request;

class EloquentSubRepository implements SubRepositoryInterface
{
    public function findByName($name)
    {
        $sub = Sub::where('name', $name)->firstOrFail();
        $sub->posts = $sub->posts()->simplePaginate(10);

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
