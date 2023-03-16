<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login()
    {
        $title = '[INSCRITOR] - Iniciar Sessão';
        $type = 'login';
        $menu = 'Login';
        $submenu = null;
        return view('user.login', compact('title', 'type', 'menu', 'submenu'));
    }

    public function logar(Request $request)
    {
        $this->validate(
            $request,
            [
                'username' => 'required|string|exists:usuarios,name',
                'password' => 'required|string|min:6',
            ]
        );

        $user = User::where(['name' => $request->username])->first();

        if ($user->estado == "off") {
            return back()->with(['error' => "Usuário bloqueado, sem permissão."]);
        }

        if (Auth::attempt(['name' => $request->username, 'password' => $request->password])) {
            return redirect('/home');
        } else {
            return back()->with(['error' => "Palavra passe incorrectas"]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
