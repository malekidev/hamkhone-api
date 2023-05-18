<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateHomeRequest;
use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function store(CreateHomeRequest $request)
    {
        $this->authorize("create",Home::class);
        auth()->user()->homes()->create($request->all());
    }
}
