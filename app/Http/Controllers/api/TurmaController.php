<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Instituicao;
use App\Models\Turma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TurmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turmas = Turma::paginate(10);
        $title = 'Turmas - Listar';
        $type = 'extras';
        $menu = 'Turmas';
        $submenu = 'Listar';

        return view('extras.turmas.index', compact('title', 'type', 'menu', 'submenu', 'turmas'));
    }

    public function create(){
        $instituicaos = Instituicao::orderBy('instituicao', 'asc');

        $title = 'Turmas - Nova';
        $type = 'extras';
        $menu = 'Turmas';
        $submenu = 'Nova';

        return view('extras.turmas.create', compact('title', 'type', 'menu', 'submenu', 'instituicaos'));
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
            'id_curso' => 'required|integer|exists:cursos,id',
            'id_classe'=>'required|integer|exists:classes,id',
            'id_ano_lectivo' => 'required|integer|exists:ano_lectivos,id',
            'turma'=>'required|string',

        ], [], [
            'id_curso' => 'Curso',
            'id_classe'=>'Classe',
            'id_ano_lectivo' => 'Ano Lectivo',
            'turma'=>'Turma',
        ]);

        DB::beginTransaction();
        try {
            $turma = Turma::create($request->all());
            DB::commit();
            return back()->with('success', "Feito com sucesso!");
        } catch (\Exception $e) {
            DB::rollBack();
            return response(['error' => $e->getMessage()], 500);
        }
    }

    public function edit($id){
        $turma = Turma::find($id);
        if(!$turma)
        return back()->with('error', 'Nao encontrou');

        $instituicaos = Instituicao::orderBy('instituicao', 'asc');

        $title = 'Turmas - Nova';
        $type = 'extras';
        $menu = 'Turmas';
        $submenu = 'Nova';

        return view('extras.turmas.edit', compact('title', 'type', 'menu', 'submenu', 'instituicaos'));
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
        $turma = Turma::find($id);
        if(!$turma)
        return back()->with('error', 'Nao encontrou');

        $this->validate($request, [
            'id_curso' => 'required|integer|exists:cursos,id',
            'id_classe'=>'required|integer|exists:classes,id',
            'id_ano_lectivo' => 'required|integer|exists:ano_lectivos,id',
            'turma'=>'required|string',

        ], [], [
            'id_curso' => 'Curso',
            'id_classe'=>'Classe',
            'id_ano_lectivo' => 'Ano Lectivo',
            'turma'=>'Turma',
        ]);

        DB::beginTransaction();
        try {
            $turma = Turma::find($id)->update($request->all());
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
        //
    }
}
