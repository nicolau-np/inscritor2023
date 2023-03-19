<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\AnoLectivo;
use App\Models\Classe;
use App\Models\Curso;
use App\Models\Estudante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalancoController extends Controller
{
    public function index()
    {
        $id_instituicao = Auth::user()->id_instituicao;
        $ano_lectivos = AnoLectivo::where('id_instituicao', $id_instituicao)->orderBy('id', 'desc');
        $cursos = Curso::where('id_instituicao', $id_instituicao)->orderBy('curso', 'asc');
        $classes = Classe::where('id_instituicao', $id_instituicao)->orderBy('classe', 'asc');
        $title = 'Balanços - Extrair';
        $type = 'balancos';
        $menu = 'Balanços';
        $submenu = 'Extrair';
        return view('balancos.index', compact('title', 'type', 'menu', 'submenu', 'ano_lectivos', 'cursos', 'classes'));
    }

    public function search(Request $request)
    {
        $id_instituicao = Auth::user()->id_instituicao;

        $this->validate($request, [
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date',
            'id_ano_lectivo' => 'required|integer|exists:ano_lectivos,id',
        ], [], [
            'data_inicio' => 'Data de Início',
            'data_fim' => 'Data de Fim',
            'id_ano_lectivo' => 'Ano Lectivo',
        ]);

        $estudantes = Estudante::where(['id_instituicao' => $id_instituicao, 'id_ano_lectivo' => $request->id_ano_lectivo])->get();
        $ano_lectivo = AnoLectivo::find($request->id_ano_lectivo);

        if ($request->data_inicio > $request->data_fim)
            return back()->with('error', "A data inicial não deve ser superior a data final");


        return back()->with(['estudantes' => $estudantes, 'data_inicio' => $request->data_inicio, 'data_fim' => $request->data_fim, 'ano_lectivo' => $ano_lectivo]);
    }
}