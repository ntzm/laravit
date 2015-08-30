<?php

namespace App\Http\Controllers;

use App\Sub;

class SubController extends Controller
{
    public function show($name)
    {
        $sub = Sub::where('name', $name)->firstOrFail();

        return view('subs.show', compact($sub));
    }
}
