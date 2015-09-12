<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubRequest;
use App\Repositories\SubRepository;
use Illuminate\Contracts\Auth\Guard as Auth;

class SubController extends Controller
{
    private $sub;
    private $auth;

    public function __construct(SubRepository $sub, Auth $auth)
    {
        $this->sub = $sub;
        $this->auth = $auth;

        $this->middleware('auth', ['except' => ['show']]);
    }

    public function show($name)
    {
        $sub = $this->sub->findByName($name);

        return view('sub.show', compact('sub'));
    }

    public function create()
    {
        return view('sub.create');
    }

    public function store(StoreSubRequest $request)
    {
        $sub = $this->sub->store($this->auth->user(), $request->all());

        return redirect()->route('sub.show', $sub->name);
    }
}
