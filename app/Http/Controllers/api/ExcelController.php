<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\AnoLectivo;
use App\Models\Classe;
use App\Models\Classificador;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExcelController extends Controller
{
    public function listas($id_curso, $id_classe, $id_ano_lectivo, $estado)
    {
        dd('excel');
        $estudantes = null;

        $id_instituicao = Auth::user()->id_instituicao;

        $ano_lectivo = AnoLectivo::where(['id_ano_lectivo' => $id_ano_lectivo, 'id_instituicao' => $id_instituicao])->first();
        if (!$ano_lectivo)
            return back()->with('error', "Nao encontrou");

        $curso = Curso::where(['id_curso' => $id_curso, 'id_instituicao' => $id_instituicao])->first();
        if (!$curso)
            return back()->with('error', "Nao encontrou");

        $classe = Classe::where(['id_classe' => $id_classe, 'id_instituicao' => $id_instituicao])->first();
        if (!$classe)
            return back()->with('error', "Nao encontrou");

        $estado = $estado;

        $classificador = Classificador::where(['id_instituicao' => $id_instituicao, 'id_ano_lectivo' => $id_ano_lectivo])->first();

    }
}