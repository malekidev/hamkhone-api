<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequset;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        return User::create($request->all());
    }

    public function login(LoginRequset $request)
    {
        $request->authenticate();
        $token =  auth()->user()->createToken('login')->plainTextToken;
        return response()->json([
            'token' => $token
        ]);
    }

    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'logout success'
        ]);
    }
    public function logoutAll(){
        auth()->user()->tokens()->delete();
        return response()->json([
            'message' => 'logout from all tokens success'
        ]);
    }
}
