<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

        $user = User::where('name', $request->username)->first();

        if ($user->estado == "off") {
            return back()->with('error', "Usuário bloqueado, sem permissão.");
        }

        if (Auth::attempt(['name' => $request->username, 'password' => $request->password])) {
            return redirect('/home');
        } else {
            return back()->with('error', "Palavra passe incorrecta");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function edit()
    {
        $title = '[INSCRITOR] - Editar Perfil';
        $type = 'edit';
        $menu = 'Editar Perfil';
        $submenu = null;
        return view('user.edit', compact('title', 'type', 'menu', 'submenu'));
    }

    public function editar(Request $request)
    {
        $this->validate($request, [
            'password_actual' => 'required|string|min:6',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required|string|min:6'
        ], [], [
            'password_actual' => 'Palavra-Passe Actual',
            'password' => 'Nova Palavra-Passe',
            'password_confirmation' => 'Confirmar Palavra-Passe'
        ]);

        if (!Hash::check($request->password_actual, Auth::user()->password))
            return back()->with('error', "Palavra-Passe actual incorrecta!");

        $password = Hash::make($request->password);

        DB::beginTransaction();
        try {
            User::find(Auth::user()->id)->update(['password' => $password]);
            DB::commit();
            return back()->with('success', "Feito com sucesso");
        } catch (\Exception $e) {
            DB::rollBack();
            return response(['error' => $e->getMessage()], 500);
        }
    }
}