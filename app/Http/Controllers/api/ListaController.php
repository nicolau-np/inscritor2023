<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListaController extends Controller
{
    public function index($estado)
    {

        $estudantes = null;

        if ($estado == "admitidos") {

        } elseif ($estado == "nadmitidos") {
            
        }

        return $estudantes;
    }
}