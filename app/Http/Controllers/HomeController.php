<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudante;
use App\Models\Classificador;

class HomeController extends Controller
{
    public function home()
    {
        $title = '[INSCRITOR] - Sistema de Selecção Automática';
        $type = 'home';
        $menu = 'Home';
        $submenu = null;
        return view('home', compact('title', 'type', 'menu', 'submenu'));
    }

    public function client()
    {
        $title = '[INSCRITOR] - Sistema de Selecção Automática';
        $type = 'home';
        $menu = 'Home';
        $submenu = null;
        return view('client.home', compact('title', 'type', 'menu', 'submenu'));
    }

    public function consultar(Request $request){

       $estudante = "no";
       $classificador = "no";
       $inscricao = $request->numero_inscricao;
       if($request->numero_inscricao){

        $parte_restante = substr($request->numero_inscricao, 4); #pegando o numero de inscricao sabendo que os 4 primeiros representam o ano civil os restantes e o id do estudante

        $estudante = Estudante::find($parte_restante);
        if(!$estudante)
            return back()->with('error', "Nº de Inscrição não existente!");

            $classificador = Classificador::where(['id_ano_lectivo'=>$estudante->id_ano_lectivo, 'id_classe'=>$estudante->id_classe, 'id_curso'=>$estudante->id_curso])->first();

        }

        $title = '[INSCRITOR] - Sistema de Selecção Automática';
        $type = 'consultar';
        $menu = 'Consultar';
        $submenu = null;
        return view('client.consultar', compact('title', 'type', 'menu', 'submenu', 'estudante', 'classificador', 'inscricao'));
    }
}
