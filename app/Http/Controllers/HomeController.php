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
}
