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
}