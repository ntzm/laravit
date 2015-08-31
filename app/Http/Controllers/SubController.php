<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sub;
use Auth;

class SubController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    public function show($name)
    {
        $sub = Sub::where('name', $name)->firstOrFail();
        $posts = $sub->posts()->simplePaginate(10);

        return view('subs.show', compact('sub', 'posts'));
    }

    public function create()
    {
        return view('subs.create');
    }

    public function store(Request $request)
    {
        $sub = Sub::create($request->all());
        $sub->owner()->associate(Auth::user());
        $sub->save();

        return redirect()->route('subs.show', $sub->name);
    }
}
