<?php

namespace App\Exports;

use App\Models\AnoLectivo;
use App\Models\Classe;
use App\Models\Classificador;
use App\Models\Curso;
use App\Models\Estudante;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ListasFinaisExport implements FromView, ShouldAutoSize
{
    private $estudantes;
    private $id_instituicao;
    private $curso;
    private $classe;
    private $ano_lectivo;
    private $classificador;
    private $estado;

    public function __construct(Curso $curso, Classe $classe, AnoLectivo $ano_lectivo, Classificador $classificador, $estado)
    {
        $this->id_instituicao = Auth::user()->id_instituicao;
        $this->curso = $curso;
        $this->classe = $classe;
        $this->ano_lectivo = $ano_lectivo;
        $this->classificador = $classificador;
        $this->estado = $estado;
    }

    public function view(): View
    {

        if ($this->estado == 'Admitidos') {
            $this->estudantes = Estudante::whereHas('pessoas', function ($query) {
                $query->whereBetween('data_nascimento', [$this->classificador->data_inicio, $this->classificador->data_fim]);
            })->where(['id_ano_lectivo' => $this->ano_lectivo->id, 'id_instituicao' => $this->id_instituicao, 'id_classe' => $this->classe->id, 'id_curso' => $this->curso->id])->get()->sortBy('pessoas.nome');
        } elseif ($this->estado == 'Não Admitidos') {
            $this->estudantes = Estudante::whereHas('pessoas', function ($query) {
                $query->whereDate('data_nascimento', '<', $this->classificador->data_inicio);
            })->where(['id_ano_lectivo' => $this->ano_lectivo->id, 'id_instituicao' => $this->id_instituicao, 'id_classe' => $this->classe->id, 'id_curso' => $this->curso->id])->get()->sortBy('pessoas.nome');
        }

        $data = [
            'ano_lectivo' => $this->ano_lectivo,
            'curso' => $this->curso,
            'classe' => $this->classe,
            'estado' => $this->estado,
            'estudantes' => $this->estudantes,
        ];
        return view('excel.lista', $data);
    }
}
