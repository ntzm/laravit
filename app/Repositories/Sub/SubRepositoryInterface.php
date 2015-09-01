<?php

namespace App\Repositories\Sub;

use Illuminate\Http\Request;

interface SubRepositoryInterface
{
    public function findByName($name);
    public function store(Request $request);
}
