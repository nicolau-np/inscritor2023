<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Estudante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalancoController extends Controller
{
    public function index()
    {

        $title = 'Balanços - Extrair';
        $type = 'balancos';
        $menu = 'Balanços';
        $submenu = 'Extrair';
        return view('balancos.index', compact('title', 'type', 'menu', 'submenu'));
    }

    public function search(Request $request)
    {
        $id_instituicao = Auth::user()->id_instituicao;

        $this->validate($request, [
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date',
        ], [], [
            'data_inicio' => 'Data de Início',
            'data_fim' => 'Data de Fim',
        ]);

        $estudantes = Estudante::where(['id_instituicao', $id_instituicao])->get();

        return back()->with(['estudantes' => $estudantes]);
    }
}