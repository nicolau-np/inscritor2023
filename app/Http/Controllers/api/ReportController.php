<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\AnoLectivo;
use App\Models\Classe;
use App\Models\Curso;
use App\Models\Estudante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class ReportController extends Controller
{
    public function listas(Request $request)
    {
        $this->validate($request, [
            'id_curso' => 'required|integer|exists:cursos,id',
            'id_classe' => 'required|integer|exists:classes,id',
            'estado' => 'required|string',
            'id_ano_lectivo' => 'required|integer|exists:ano_lectivos,id',
        ], [], [
            'id_curso' => 'Curso',
            'id_classe' => 'Classe',
            'estado' => 'Estado',
            'id_ano_lectivo' => 'Ano Lectivo',
        ]);

        $id_instituicao = Auth::user()->id_instituicao;

        $estudantes = Estudante::where(['id_ano_lectivo'=>$request->id_ano_lectivo, 'id_instituicao'=>$id_instituicao, 'id_classe'=>$request->id_classe, 'id_curso'=>$request->id_curso])->get();

        $ano_lectivo = AnoLectivo::find($request->id_ano_lectivo);
        $curso = Curso::find($request->id_curso);
        $classe = Classe::find($request->id_classe);
        $estado = $request->estado;

        $pdf = PDF::loadView('report.lista', compact('ano_lectivo', 'curso', 'classe', 'estado', 'estudantes'))->setPaper('A4', 'normal');
        return $pdf->stream('LISTA  - [ ' . strtoupper($estado) . ' ].pdf');
    }
}
