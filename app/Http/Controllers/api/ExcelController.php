<?php

namespace App\Http\Controllers\api;

use App\Exports\ListasFinaisExport;
use App\Http\Controllers\Controller;
use App\Models\AnoLectivo;
use App\Models\Classe;
use App\Models\Classificador;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{
    public function listas($id_curso, $id_classe, $id_ano_lectivo, $estado)
    {
        $id_instituicao = Auth::user()->id_instituicao;

        $ano_lectivo = AnoLectivo::where(['id' => $id_ano_lectivo, 'id_instituicao' => $id_instituicao])->first();
        if (!$ano_lectivo)
            return back()->with('error', "Nao encontrou");

        $curso = Curso::where(['id' => $id_curso, 'id_instituicao' => $id_instituicao])->first();
        if (!$curso)
            return back()->with('error', "Nao encontrou");

        $classe = Classe::where(['id' => $id_classe, 'id_instituicao' => $id_instituicao])->first();
        if (!$classe)
            return back()->with('error', "Nao encontrou");

        $classificador = Classificador::where(['id_instituicao' => $id_instituicao, 'id_ano_lectivo' => $id_ano_lectivo])->first();
        if (!$classificador)
            return back()->with('error', "Nao encontrou");

        $filename = "Lista de " . $estado . ".xlsx";
        return Excel::download(new ListasFinaisExport($curso, $classe, $ano_lectivo, $classificador, $estado), $filename);
    }
}