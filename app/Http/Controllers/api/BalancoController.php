<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalancoController extends Controller
{
    public function index(){
        $id_instituicao = Auth::user()->id_instituicao;
        $title = 'Balanços - Extrair';
        $type = 'balancos';
        $menu = 'Balanços';
        $submenu = 'Extrair';
        return view('balancos.index', compact('title', 'type', 'menu', 'submenu'));
    }
}
