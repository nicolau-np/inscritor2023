<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\AnoLectivo;
use App\Models\Classe;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListaController extends Controller
{
    public function index()
    {
        $id_instituicao = Auth::user()->id_instituicao;
        $ano_lectivos = AnoLectivo::where('id_instituicao', $id_instituicao)->orderBy('id', 'desc');
        $cursos = Curso::where('id_instituicao', $id_instituicao)->orderBy('curso', 'asc');
        $classes = Classe::where('id_instituicao', $id_instituicao)->orderBy('classe', 'asc');
        $title = 'Listas - Extrair';
        $type = 'listas';
        $menu = 'Listas';
        $submenu = 'Extrair';
        return view('listas.index', compact('title', 'type', 'menu', 'submenu', 'ano_lectivos', 'cursos', 'classes'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_curso' => 'required|integer|exists:cursos,id',
            'id_classe' => 'required|integer|exists:classes,id',
            'estado' => 'required|string',
            'id_ano_lectivo' => 'required|integer|exists:ano_lectivos,id',
            'tipo' => 'required|string'
        ], [], [
            'id_curso' => 'Curso',
            'id_classe' => 'Classe',
            'estado' => 'Estado',
            'id_ano_lectivo' => 'Ano Lectivo',
            'tipo' => "Tipo",
        ]);

        if ($request->tipo == 'PDF') {
            return  redirect('/pdf/listas/' . $request->id_curso . '/' . $request->id_classe . '/' . $request->id_ano_lectivo . '/' . $request->estado);
        } elseif ($request->tipo == 'Excel') {
            return redirect('/excel/listas/' . $request->id_curso . '/' . $request->id_classe . '/' . $request->id_ano_lectivo . '/' . $request->estado);
        }

        return back()->with('error', "Não encontrou");
    }
}