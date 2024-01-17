<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        $data["password"] = Hash::make($data["password"]);

        $user = User::create($data);

        $token = $user->createToken('AppToken')->accessToken;

        return response()->json([
            'token' => $token,
            'user' => $user,
        ], 201);
    }
}
