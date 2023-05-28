<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
       if($request->numero_inscricao){

        $parte_restante = substr($request->numero_inscricao, 4); #pegando o numero de inscricao sabendo que os 4 primeiros representam o ano civil os restantes e o id do estudante

        $estudante = $parte_restante;
       }

        $title = '[INSCRITOR] - Sistema de Selecção Automática';
        $type = 'consultar';
        $menu = 'Consultar';
        $submenu = null;
        return view('client.consultar', compact('title', 'type', 'menu', 'submenu', 'estudante'));
    }
}
