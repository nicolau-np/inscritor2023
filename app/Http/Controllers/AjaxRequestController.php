<?php

namespace App\Http\Controllers;

use App\Models\AnoLectivo;
use App\Models\Classe;
use App\Models\Curso;
use App\Models\Municipio;
use Illuminate\Http\Request;

class AjaxRequestController extends Controller
{
    public function municipios($id_provincia)
    {
        $municipios = Municipio::where('id_provincia', $id_provincia)->orderBy('municipio', 'asc')->pluck('municipio', 'id');
        return view('ajaxrequest.municipios', compact('municipios'));
    }

    public function classes($id_instituicao)
    {
        $classes = Classe::where('id_instituicao', $id_instituicao);
        return view('ajaxrequest.classes', compact('classes'));
    }

    public function cursos($id_instituicao)
    {
        $cursos = Curso::where('id_instituicao', $id_instituicao);
        return view('ajaxrequest.cursos', compact('cursos'));
    }

    public function anos($id_instituicao)
    {
        $ano_lectivos = AnoLectivo::where('id_instituicao', $id_instituicao);
        return view('ajaxrequest.ano_lectivos', compact('ano_lectivos'));
    }
}
