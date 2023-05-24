<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EstudanteResource;
use App\Models\AnoLectivo;
use App\Models\Classe;
use App\Models\Curso;
use App\Models\Estudante;
use App\Models\Instituicao;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class EstudanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_instituicao = Auth::user()->id_instituicao;
        $estudantes = Estudante::with('pessoas')->where('id_instituicao', $id_instituicao)->paginate(10);

        $title = 'Estudantes - Listar';
        $type = 'estudantes';
        $menu = 'Estudantes';
        $submenu = 'Listar';

        return view('estudantes.index', compact('title', 'type', 'menu', 'submenu', 'estudantes'));
    }

    public function create()
    {
        $cursos = null;

        $id_instituicao = Auth::user()->id_instituicao;
        $ano_lectivos = AnoLectivo::where('id_instituicao', $id_instituicao)->orderBy('id', 'desc');
        $classes = Classe::where('id_instituicao', $id_instituicao)->orderBy('id', 'asc');

        if (Auth::user()->id_curso == null) {
            $cursos = Curso::where('id_instituicao', $id_instituicao)->orderBy('id', 'asc')->pluck('curso', 'id');
        } else {
            $cursos = Curso::where(['id' => Auth::user()->id_curso, 'id_instituicao' => $id_instituicao])->orderBy('id', 'asc')->pluck('curso', 'id');
        }
        $title = 'Estudantes - Novo';
        $type = 'estudantes';
        $menu = 'Estudantes';
        $submenu = 'Novo';
        return view('estudantes.create', compact('title', 'type', 'menu', 'submenu', 'ano_lectivos', 'classes', 'cursos'));
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
            'nome' => 'required|string|min:10',
            'data_nascimento' => 'required|date|before:today',
            'genero' => 'required|string',
            'id_classe' => 'required|integer|exists:classes,id',
            'id_curso' => 'required|integer|exists:cursos,id',
            'id_ano_lectivo' => 'required|integer|exists:ano_lectivos,id',
            'telefone' => 'required|integer',
            'bilhete'=>'required|string|unique:pessoas,bilhete'
        ], [], [
            'nome' => 'Nome',
            'data_nascimento' => 'Data de Nascimento',
            'genero' => 'Gênero',
            'id_classe' => 'Classe',
            'id_curso' => 'Curso',
            'id_ano_lectivo' => 'Ano Lectivo',
            'email' => "E-mail",
            'telefone' => "Telefone",
            'bilhete'=>"Nº do Bilhete de Identidade",
        ]);

        $data['person'] = [
            'nome' => $request->nome,
            'genero' => $request->genero,
            'data_nascimento' => $request->data_nascimento,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'bilhete'=>$request->bilhete,
        ];

        $data['student'] = [
            'id_pessoa' => null,
            'id_instituicao' => Auth::user()->id_instituicao,
            'id_classe' => $request->id_classe,
            'id_curso' => $request->id_curso,
            'id_ano_lectivo' => $request->id_ano_lectivo,
        ];

        DB::beginTransaction();
        try {
            $pessoa = Pessoa::create($data['person']);
            $data['student']['id_pessoa'] = $pessoa->id;
            $estudante = Estudante::create($data['student']);
            DB::commit();
            return back()->with('success', "Feito com sucesso");
        } catch (\Exception $e) {
            DB::rollBack();
            return response(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estudante = Estudante::where(['id' => $id, 'id_instituicao' => Auth::user()->id_instituicao])->first();
        if (!$estudante)
            return back()->with('errors', "Nao encontrou");

        $title = 'Estudantes - Detalhes';
        $type = 'estudantes';
        $menu = 'Estudantes';
        $submenu = 'Detalhes';

        return view('estudantes.show', compact('title', 'type', 'menu', 'submenu', 'estudante'));
    }

    public function edit($id)
    {
        $estudante = Estudante::where(['id' => $id, 'id_instituicao' => Auth::user()->id_instituicao])->first();
        if (!$estudante)
            return back()->with('errors', "Nao encontrou");

        $id_instituicao = Auth::user()->id_instituicao;
        $ano_lectivos = AnoLectivo::where('id_instituicao', $id_instituicao)->orderBy('id', 'desc');
        $classes = Classe::where('id_instituicao', $id_instituicao)->orderBy('id', 'asc');
        $cursos = Curso::where('id_instituicao', $id_instituicao)->orderBy('id', 'asc')->pluck('curso', 'id');

        $title = 'Estudantes - Editar';
        $type = 'estudantes';
        $menu = 'Estudantes';
        $submenu = 'Editar';

        return view('estudantes.edit', compact('title', 'type', 'menu', 'submenu', 'estudante', 'cursos', 'classes', 'ano_lectivos'));
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
        $estudante = Estudante::where(['id' => $id, 'id_instituicao' => Auth::user()->id_instituicao])->first();
        if (!$estudante)
            return response(['errors' => "Nao encontrou"], 400);

        $this->validate($request, [
            'nome' => 'required|string|min:10',
            'data_nascimento' => 'required|date|before_or_equal:today',
            'genero' => 'required|string',
            'id_classe' => 'required|integer|exists:classes,id',
            'id_curso' => 'required|integer|exists:cursos,id',
            'id_ano_lectivo' => 'required|integer|exists:ano_lectivos,id',
        ], [], [
            'nome' => 'Nome',
            'data_nascimento' => 'Data de Nascimento',
            'genero' => 'Gênero',
            'id_classe' => 'Classe',
            'id_curso' => 'Curso',
            'id_ano_lectivo' => 'Ano Lectivo',
        ]);

        if($request->bilhete!=$estudante->pessoas->bilhete){
            $this->validate($request,[
                'bilhete'=>'required|string|unique:pessoas,bilhete'
            ],[],[
                'bilhete'=>"Nº do Bilhete de Identidade",
            ]);
        }

        $data['person'] = [
            'nome' => $request->nome,
            'genero' => $request->genero,
            'data_nascimento' => $request->data_nascimento,
            'bilhete'=>$request->bilhete,
            'telefone' => $request->telefone,
            'email' => $request->email,
        ];

        $data['student'] = [
            'id_classe' => $request->id_classe,
            'id_curso' => $request->id_curso,
            'id_ano_lectivo' => $request->id_ano_lectivo,
        ];



        DB::beginTransaction();
        try {
            $pessoa = Pessoa::find($estudante->id_pessoa)->update($data['person']);
            Estudante::find($estudante->id)->update($data['student']);
            DB::commit();
            return back()->with('success', "Feito com sucesso!");
        } catch (\Exception $e) {
            DB::rollBack();
            return response(['error' => $e->getMessage()], 500);
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
        $estudante = Estudante::where(['id' => $id, 'id_instituicao' => Auth::user()->id_instituicao])->first();
        if (!$estudante)
            return response('errors', "Nao encontrou");

        Pessoa::find($estudante->id_pessoa)->delete();

        return back()->with('success', "Feito com sucesso!");
    }
}
