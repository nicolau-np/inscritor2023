<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pessoa;
use App\Models\Curso;
use App\Models\PasswordReset;
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

    public function index(){
      $id_instituicao = Auth::user()->id_instituicao;
        $users = User::where('id_instituicao', $id_instituicao)->get();
        $title = 'Usuário';
        $type = 'users';
        $menu = 'Usuário';
        $submenu = "Listar";
        return view('user.index', compact('title', 'type', 'menu', 'submenu', 'users'));

    }

    public function create(){
        $id_instituicao = Auth::user()->id_instituicao;
        $cursos = Curso::where('id_instituicao', $id_instituicao)->orderBy('id', 'asc');
        $title = 'Usuário';
        $type = 'users';
        $menu = 'Usuário';
        $submenu = "Novo";
        return view('user.create', compact('title', 'type', 'menu', 'submenu', 'cursos'));
    }

    public function store(Request $request){
$id_instituicao = Auth::user()->id_instituicao;
        $this->validate($request, [
            'nome' => 'required|string',
            'data_nascimento' => 'required|date|before:today',
            'genero' => 'required|string',
            'name' => 'required|string|unique:usuarios,name',
            'email'=>'required|email|unique:usuarios,email',

        ], [], [
            'nome' => 'Nome Completo',
            'data_nascimento' => 'Data de Nascimento',
            'genero' => 'Gênero',
            'name' => 'Nome de Usuário',
            'email'=> 'E-mail',

        ]);

        $password = Hash::make('puniv2023');

        $data['person'] = [
            'nome' => $request->nome,
            'data_nascimento' => $request->data_nascimento,
            'genero' => $request->genero,
            'foto' => null,
        ];

        $data['user'] = [
            'id_instituicao' => $id_instituicao,
            'id_pessoa' => null,
            'id_curso' => $request->id_curso,
            'name' => $request->name,
            'email'=>$request->email,
            'password' => $password,
            'nivel_acesso' => 'user',
        ];


        if ($request->foto) {
            $this->validate($request, [
                'foto' => 'required|mimes:jpg,jpeg,png,JPG,JPEG,PNG|max:6000',
            ], [], [
                'foto' => "Foto"
            ]);

            $path =  time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->storeAS('users', $path, 'uploads');
            $data['person']['foto'] = $path;
        }

        DB::beginTransaction();
        try {

            $pessoa = Pessoa::create($data['person']);
            $data['user']['id_pessoa'] = $pessoa->id;
            User::create($data['user']);
            DB::commit();
            return back()->with('success', "Feito com sucesso!");
        } catch (\Exception $e) {
            DB::rollBack();
           return back()->with('error', 'Sem permição para prosseguir com a operação. Code: '.$e->getCode());
        }
    }

    public function destroy($id){
        $id_instituicao = Auth::user()->id_instituicao;
        $user = User::where(['id'=>$id, 'id_instituicao'=>$id_instituicao])->first();
        if(!$user)
            return back()->with('error', 'Não encontrou');
        $id_pessoa = $user->id_pessoa;
        DB::beginTransaction();
        try {
            $user->delete();
            Pessoa::find($id_pessoa)->delete();
            DB::commit();
            return back()->with('success', "Eliminado com sucesso!");
        } catch (\Exception $e) {
            DB::rollBack();
           return back()->with('error', 'Sem permição para prosseguir com a operação. Code: '.$e->getCode());
        }
    }

    public function reset($id){
        $user = User::find($id);
        if(!$user)
            return back()->with('errors', 'Nao encontrou');

        $password = Hash::make('puniv2023');

        DB::beginTransaction();
        try {

           $user->update(['password'=>$password]);
            DB::commit();
            return back()->with('success', "Palavra Passe de ".$user->name. " Resetada com sucesso!");
        } catch (\Exception $e) {
            DB::rollBack();
           return back()->with('error', 'Sem permição para prosseguir com a operação. Code: '.$e->getCode());
        }


    }

    public function profile(){
        $title = 'Usuário';
        $type = 'user';
        $menu = 'Usuário';
        $submenu = "Perfil";
        return view('user.profile', compact('title', 'type', 'menu', 'submenu'));
    }

    public function recuperar(){
        $title = 'Recuperar Senha';
        $type = 'login';
        $menu = 'Recuperar Senha';
        $submenu = "Recuperar Senha";
        return view('user.recuperar', compact('title', 'type', 'menu', 'submenu'));
    }

    public function recuperarStore(Request $request){

        $this->validate($request, [
            'email'=>'required|email|exists:usuarios,email'
        ],[],
        [
            'email'=>'E-mail'
        ]);

        $password_reset = PasswordReset::where('email', $request->email)->first();
        
        DB::beginTransaction();
        try {
            if($password_reset){ #existe ja um reset
                $password_reset->update(['token'=>$request->_token]);
            }else{ #nao existe nenhum reset
                $password_reset = PasswordReset::create(['email'=>$request->email, 'token'=>$request->_token]);
            }
            $password_reset = PasswordReset::where('email', $request->email)->first();
            $user = User::where('email', $password_reset->email)->first();
            $this->sendEmail($request->_token, $password_reset->id, $user->pessoas->nome, $user->email);
            DB::commit();
            return back()->with('success', "Deve verificar o seu E-mail para poder fazer a recuperação da Palavra-Passe");
        } catch (\Exception $e) {
            DB::rollBack();
           return back()->with('error', 'Sem permição para prosseguir com a operação. Code: '.$e->getCode());
        }
    }

    public function sendEmail($token, $id, $nome, $email){
        $user = new \stdClass();
        $user->name = $nome;
        $user->email = $email;
        $user->token = $token;
        $user->id = $id;
        \Illuminate\Support\Facades\Mail::send(new \App\Mail\RecuperacaoSenha($user));
    }

    public function mail($token, $id){

        $password_reset = PasswordReset::where(['token'=>$token, 'id'=>$id])->first();
        if(!$password_reset)
            return redirect('/user/recuperar')->with('error', 'Usuário não encontrado! Deve fazer a recuperação novamente.');

        $user = User::where('email', $password_reset->email)->first();
        $password = Hash::make('puniv2023');
            DB::beginTransaction();
            try {
                $user->update(['password'=>$password]);
                $password_reset->delete();
                DB::commit();
                return redirect('/user/login')->with('success', "A sua Palavra-Passe foi resetada com sucesso!");
            } catch (\Exception $e) {
                DB::rollBack();
               return back()->with('error', 'Sem permição para prosseguir com a operação. Code: '.$e->getCode());
            }
    }
}
