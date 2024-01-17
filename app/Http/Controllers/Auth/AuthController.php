<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        if (Auth::attempt($data)) {
            $user = Auth::user();
            $token = $user->createToken('AppToken')->accessToken;
            
            $response = [
                'token' => $token,
                'user' => $user,
            ];

            return response()->json($response, 200);
        }

        return response()->json(['error' => 'Wrong login or password'], 401);
    }
}
