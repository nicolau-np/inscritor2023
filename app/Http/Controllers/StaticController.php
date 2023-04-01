<?php

namespace App\Http\Controllers;

use App\Models\Estudante;
use Illuminate\Http\Request;

class StaticController extends Controller
{

    public static function countEstudantes($id_curso, $id_instituicao, $id_ano_lectivo, $idade = null)
    {
        $estudantes = null;

        $data = [
            'idade' => $idade,
        ];

        if ($idade != null) {
            $estudantes = Estudante::with('pessoas')->whereHas('pessoas', function ($query) use ($data) {
                $query->where('idade', $data['idade']);
            })->where([
                'id_curso' => $id_curso,
                'id_instituicao' => $id_instituicao,
                'id_ano_lectivo' => $id_ano_lectivo
            ])->get();
        } elseif ($idade == null) {

            $estudantes = Estudante::with('pessoas')->where([
                'id_curso' => $id_curso,
                'id_instituicao' => $id_instituicao,
                'id_ano_lectivo' => $id_ano_lectivo
            ])->get();
        }

        return $estudantes;
    }
}