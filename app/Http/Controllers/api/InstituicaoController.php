<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Instituicao;
use App\Models\Municipio;
use App\Models\Pessoa;
use App\Models\Provincia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InstituicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instituicaos = Instituicao::paginate(10);
        $title = 'Instituição - Listar';
        $type = 'instituicaos';
        $menu = 'Instituição';
        $submenu = 'Listar';

        return view('instituicaos.index', compact('title', 'type', 'menu', 'submenu', 'instituicaos'));
    }

    public function create()
    {
        $provincias = Provincia::orderBy('provincia', 'asc');

        $title = 'Instituição - Nova';
        $type = 'instituicaos';
        $menu = 'Instituição';
        $submenu = 'Nova';

        return view('instituicaos.create', compact('title', 'type', 'menu', 'submenu', 'provincias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_municipio' => 'required|integer|exists:municipios,id',
            'instituicao' => 'required|string|unique:instituicaos,instituicao',
            'endereco' => 'required|string',

        ], [], [
            'id_municipio' => 'Município',
            'instituicao' => 'Instituição',
            'endereco' => 'Endereço',
        ]);

        DB::beginTransaction();
        try {
            Instituicao::create($request->all());
            DB::commit();
            return back()->with('success', "Feito com sucesso");
        } catch (\Exception $e) {
            DB::rollBack();
           return back()->with('error', 'Sem permição para prosseguir com a operação. Code: '.$e->getCode());
        }
    }

    public function edit($id)
    {
        $instituicao = Instituicao::find($id);
        if (!$instituicao)
            return back()->with('error', "Não encontrou");
        $provincias = Provincia::orderBy('provincia', 'asc');
        $municipios = Municipio::where('id_provincia', $instituicao->municipios->id_provincia)->orderBy('municipio', 'asc');
        $title = 'Instituição - Editar';
        $type = 'instituicaos';
        $menu = 'Instituição';
        $submenu = 'Editar';
        return view('instituicaos.edit', compact('title', 'type', 'menu', 'submenu', 'provincias', 'instituicao', 'municipios'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $instituicao = Instituicao::find($id);
        if (!$instituicao)
            return back()->with('error', "Não encontrou");

        $this->validate($request, [
            'id_municipio' => 'required|integer|exists:municipios,id',
            'instituicao' => 'required|string',
            'endereco' => 'required|string',

        ], [], [
            'id_municipio' => 'Município',
            'instituicao' => 'Instituição',
            'endereco' => 'Endereço',
        ]);

        if ($instituicao->instituicao != $request->instituicao) {
            $this->validate($request, [
                'instituicao' => 'required|string|unique:instituicaos,instituicao',
            ], [], [
                'instituicao' => 'Instituição',
            ]);
        }


        DB::beginTransaction();
        try {
            Instituicao::find($instituicao->id)->update($request->all());
            DB::commit();
            return back()->with('success', "Feito com sucesso");
        } catch (\Exception $e) {
            DB::rollBack();
           return back()->with('error', 'Sem permição para prosseguir com a operação. Code: '.$e->getCode());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $instituicao = Instituicao::find($id);
        if(!$instituicao)
            return back()->with('errors', 'Nao encontrou');

            DB::beginTransaction();
            try {

                $instituicao->delete();
                DB::commit();
                return back()->with('success', "Instituição eliminada com sucesso!");
            } catch (\Exception $e) {
                DB::rollBack();
               return back()->with('error', 'Sem permição para prosseguir com a operação. Code: '.$e->getCode());
            }
    }

    public function users($id)
    {
        $instituicao = Instituicao::find($id);
        if (!$instituicao)
            return back()->with('error', "Não encontrou");

        $users = User::where('id_instituicao', $instituicao->id)->get();
        $cursos = Curso::where('id_instituicao', $instituicao->id)->orderBy('curso', 'asc');

        $title = 'Instituição - Usuários';
        $type = 'instituicaos';
        $menu = 'Instituição';
        $submenu = 'Usuários';
        return view('instituicaos.users', compact('title', 'type', 'menu', 'submenu', 'instituicao', 'users', 'cursos'));
    }

    public function usersStore(Request $request, $id)
    {
        $instituicao = Instituicao::find($id);
        if (!$instituicao)
            return back()->with('error', "Não encontrou");

        $this->validate($request, [
            'nome' => 'required|string',
            'data_nascimento' => 'required|date|before:today',
            'genero' => 'required|string',
            'name' => 'required|string|unique:usuarios,name',
            'email'=>'required|email|unique:usuarios,email',
            'nivel_acesso' => 'required|string',


        ], [], [
            'nome' => 'Nome Completo',
            'data_nascimento' => 'Data de Nascimento',
            'genero' => 'Gênero',
            'name' => 'Nome de Usuário',
            'email'=> 'E-mail',
            'nivel_acesso' => 'Nível de Acesso',
        ]);


        $password = Hash::make('puniv2023');

        $data['person'] = [
            'nome' => $request->nome,
            'data_nascimento' => $request->data_nascimento,
            'genero' => $request->genero,
            'foto' => null,
        ];

        $data['user'] = [
            'id_instituicao' => $id,
            'id_pessoa' => null,
            'id_curso' => $request->id_curso,
            'name' => $request->name,
            'email'=>$request->email,
            'password' => $password,
            'nivel_acesso' => $request->nivel_acesso,
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

    public function resetPasse($id){
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

    public function usersDestroy($id){
        $user = User::find($id);
        if(!$user)
            return back()->with('errors', 'Nao encontrou');
        $id_pessoa = $user->id_pessoa;
        DB::beginTransaction();
        try {
           $user->delete();
           Pessoa::find($id_pessoa)->delete();
            DB::commit();
            return back()->with('success', "Usuário eliminado com sucesso");
        } catch (\Exception $e) {
            DB::rollBack();
           return back()->with('error', 'Sem permição para prosseguir com a operação. Code: '.$e->getCode());
        }
    }
}
