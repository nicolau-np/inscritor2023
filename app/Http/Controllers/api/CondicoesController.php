<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\AnoLectivo;
use App\Models\Classificador;
use App\Models\Instituicao;
use App\Models\Classe;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CondicoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $condicaos = Classificador::paginate(10);
        $title = 'Condições - Listar';
        $type = 'extras';
        $menu = 'Condições';
        $submenu = 'Listar';

        return view('extras.condicoes.index', compact('title', 'type', 'menu', 'submenu', 'condicaos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $instituicaos = Instituicao::orderBy('instituicao', 'asc');
        $ano_lectivos = AnoLectivo::orderBy('ano_lectivos', 'asc');
        $classes = Classe::orderBy('classe', 'asc');
        $cursos = Curso::orderBy('curso', 'asc');
        $title = 'Condições - Nova';
        $type = 'extras';
        $menu = 'Condições';
        $submenu = 'Nova';

        return view('extras.condicoes.create', compact('title', 'type', 'menu', 'submenu', 'instituicaos', 'ano_lectivos', 'classes', 'cursos'));
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
            'id_instituicao' => 'required|integer|exists:instituicaos,id',
            'id_ano_lectivo' => 'required|integer|exists:ano_lectivos,id',
            'id_classe' => 'required|integer|exists:classes,id',
            'id_curso'=>'required|integer|exists:cursos,id',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date',
            'estado'=>'required|string'
        ], [], [
            'id_instituicao' => 'Instituição',
            'id_ano_lectivo' => 'Ano Lectivo',
            'id_classe'=>"Classe",
            'id_curso'=>"Curso",
            'data_inicio' => 'Data de Início',
            'data_fim' => 'Data de Fim',
            'estado'=>'Estado'
        ]);

        DB::beginTransaction();
        try {
            Classificador::create($request->all());
            DB::commit();
            return back()->with('success', "Feito com sucesso!");
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Sem permição para prosseguir com a operação. Code: '.$e->getCode());
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $condicao = Classificador::find($id);
        if (!$condicao)
            return back()->with('errors', "Nao encontrou");

        $instituicaos = Instituicao::orderBy('instituicao', 'asc');
        $ano_lectivos = AnoLectivo::where('id_instituicao', $condicao->id_instituicao)->orderBy('id', 'desc');
        $classes = Classe::orderBy('classe', 'asc');
        $cursos = Curso::orderBy('curso', 'asc');
        $title = 'Condições - Nova';
        $type = 'extras';
        $menu = 'Condições';
        $submenu = 'Nova';

        return view('extras.condicoes.edit', compact('title', 'type', 'menu', 'submenu', 'instituicaos', 'ano_lectivos', 'condicao', 'cursos', 'classes'));
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
        $condicao = Classificador::find($id);
        if (!$condicao)
            return back()->with('errors', "Nao encontrou");

        $this->validate($request, [
            'id_instituicao' => 'required|integer|exists:instituicaos,id',
            'id_ano_lectivo' => 'required|integer|exists:ano_lectivos,id',
            'id_classe' => 'required|integer|exists:classes,id',
            'id_curso'=>'required|integer|exists:cursos,id',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date',
            'estado'=>'required|string'
        ], [], [
            'id_instituicao' => 'Instituição',
            'id_ano_lectivo' => 'Ano Lectivo',
            'id_classe'=>"Classe",
            'id_curso'=>"Curso",
            'data_inicio' => 'Data de Início',
            'data_fim' => 'Data de Fim',
            'estado'=>'Estado'
        ]);

        DB::beginTransaction();
        try {
            Classificador::find($id)->update($request->all());
            DB::commit();
            return back()->with('success', "Feito com sucesso!");
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
        $condicao = Classificador::find($id);
        if(!$condicao)
            return back()->with('error', 'Não encontrou');
        
        DB::beginTransaction();
        try {
            $condicao->delete();
            DB::commit();
            return back()->with('success', "Eliminada com sucesso!");
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Sem permição para prosseguir com a operação. Code: '.$e->getCode());
        }
    }
}
