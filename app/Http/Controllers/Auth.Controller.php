<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    private $relationships = [
        'user',
    ];

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;
            $expiry = strtotime('+1 day');

            $response = [
                'user' => $user,
                'access' => [
                    'expiry' => $expiry,
                    'token' => $token,
                ],
            ];

            return response()->json($response);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }


    public function  register(Request $request)
    {
        $payload = $request->all();

        $user = User::create($payload);

        $token = $user->createToken('authToken')->plainTextToken;
        $expiry = strtotime('+1 day');

        $response = [
            'user' => $user,
            'access' => [
                'expiry' => $expiry,
                'token' => $token,
            ],
        ];

        return response()->json($response);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }
}
