<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Sub\SubRepositoryInterface as SubRepository;

class SubController extends Controller
{
    private $subRepository;

    public function __construct(SubRepository $subRepository)
    {
        $this->subRepository = $subRepository;

        $this->middleware('auth', ['except' => ['show']]);
    }

    public function show($name)
    {
        $sub = $this->subRepository->findByName($name);

        return view('subs.show', compact('sub'));
    }

    public function create()
    {
        return view('subs.create');
    }

    public function store(Request $request)
    {
        $sub = $this->subRepository->store($request);

        return redirect()->route('subs.show', $sub->name);
    }
}
