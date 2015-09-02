<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubRequest;
use App\Repositories\SubRepository;

class SubController extends Controller
{
    private $sub;

    public function __construct(SubRepository $sub)
    {
        $this->sub = $sub;

        $this->middleware('auth', ['except' => ['show']]);
    }

    public function show($name)
    {
        $sub = $this->sub->findByName($name);

        return view('subs.show', compact('sub'));
    }

    public function create()
    {
        return view('subs.create');
    }

    public function store(StoreSubRequest $request)
    {
        $sub = $this->sub->store($request);

        return redirect()->route('subs.show', $sub->name);
    }
}
