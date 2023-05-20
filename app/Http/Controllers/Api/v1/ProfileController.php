<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileCompleteRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function store(ProfileCompleteRequest $request)
    {
        auth()->user()->profile()->create($request->all());
    }
}
