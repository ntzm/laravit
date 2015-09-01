<?php

namespace App\Repositories\Sub;

use App\Repositories\EloquentRepository;
use App\Sub;
use Illuminate\Http\Request;

class EloquentSubRepository extends EloquentRepository implements SubRepositoryInterface
{
    protected $field = 'name';

    public function __construct(Sub $sub)
    {
        $this->model = $sub;
    }

    public function find($name)
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
