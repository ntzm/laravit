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

        return view('subs.show', compact('sub'));
    }

    public function create()
    {
        return view('subs.create');
    }

    public function store(StoreSubRequest $request)
    {
        $sub = $this->sub->store($this->auth->user(), $request->all());

        return redirect()->route('subs.show', $sub->name);
    }
}
