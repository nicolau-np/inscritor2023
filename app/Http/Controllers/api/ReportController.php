<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\AnoLectivo;
use App\Models\Classe;
use App\Models\Classificador;
use App\Models\Curso;
use App\Models\Estudante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class ReportController extends Controller
{
    public function listas($id_curso, $id_classe, $id_ano_lectivo, $estado)
    {

        $estudantes = null;

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

        $estado = $estado;

        $classificador = Classificador::where(['id_instituicao' => $id_instituicao, 'id_ano_lectivo' => $id_ano_lectivo])->first();
        if (!$classificador)
            return back()->with('error', "Nao encontrou");

        if ($estado == 'Admitidos') {
            $estudantes = Estudante::whereHas('pessoas', function ($query) use ($classificador) {
                $query->whereBetween('data_nascimento', [$classificador->data_inicio, $classificador->data_fim]);
            })->where(['id_ano_lectivo' => $id_ano_lectivo, 'id_instituicao' => $id_instituicao, 'id_classe' => $id_classe, 'id_curso' => $id_curso])->get()->sortBy('pessoas.nome');
        } elseif ($estado == 'N/Admitidos') {
            $estudantes = Estudante::whereHas('pessoas', function ($query) use ($classificador) {
                $query->whereDate('data_nascimento', '<', $classificador->data_inicio);
            })->where(['id_ano_lectivo' => $id_ano_lectivo, 'id_instituicao' => $id_instituicao, 'id_classe' => $id_classe, 'id_curso' => $id_curso])->get()->sortBy('pessoas.nome');
        }

        $pdf = PDF::loadView('pdf.lista', compact('ano_lectivo', 'curso', 'classe', 'estado', 'estudantes'))->setPaper('A4', 'normal');
        return $pdf->stream('LISTA  - [ ' . strtoupper($estado) . ' ].pdf');
    }
}