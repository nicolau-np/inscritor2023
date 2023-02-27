<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request, [
            'username'=>'required|string|exists:usuarios,username',
            'password'=>'required|string|min:6'
        ]);

        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            $user = Auth::user();
            $token = $user->createToken('token_name');
            return response()->json(['message' => ['token' => $token->plainTextToken]], 200);
        }

        return response(['message' => "Palavra-Passe Incorrecta"], 401);
    }

    public function logout(Request $request)
    {
        $this->validate($request, [
            'allDevice' => 'required|boolean'
        ]);

        $user = Auth::user();

        if ($request->allDevice) {
            $user->tokens->each(function ($token) {
                $token->delete();
            });
            return response(['message' => "Terminou sessao em todos os dispositivos"], 200);
        }
        $user->currentAccessToken()->delete();
        return response(['message' => "Terminou sessao em um dispositivo"], 200);

    }
}
