<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'string', 'exists:users,email'],
            'password' => ['required'],
            'remember' => ['boolean'],
        ]);

        $remember = $credentials['remember'] ?? false;
        unset($credentials['remember']);

        if (!Auth::attempt($credentials, $remember)) {
            return response()->json([
                'message' => 'Usuário e/ou senha inválido(s)'
            ], 422);
        }

        $user = Auth::user();

        if (!is_null($user->deleted_at)) {
            return response()->json([
                'message' => 'Usuário e/ou senha inválido(s)'
            ], 422);
        }

        $token = $user->createToken(config('app.name'), [$user->type])->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function logout()
    {
        $user = Auth::user();
        $user->currentAccessToken()->delete();

        return response(['success' => true]);
    }
}
