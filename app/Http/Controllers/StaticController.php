<?php

namespace App\Http\Controllers;

use App\Models\Estudante;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class StaticController extends Controller
{

    public static function countEstudantes($id_curso, $id_instituicao, $id_ano_lectivo, $idade = null, $genero = null)
    {
        $estudantes = null;

        $data = [
            'idade' => $idade,
            'genero' => $genero,
        ];

        if ($idade != null && $genero != null) {

            $estudantes = Estudante::with('pessoas')->whereHas('pessoas', function ($query) use ($data) {
                $query->where(['idade' => $data['idade'], 'genero' => $data['genero']]);
            })->where([
                'id_curso' => $id_curso,
                'id_instituicao' => $id_instituicao,
                'id_ano_lectivo' => $id_ano_lectivo
            ])->get();
        } elseif ($idade == null && $genero != null) {

            $estudantes = Estudante::with('pessoas')->whereHas('pessoas', function ($query) use ($data) {
                $query->where(['genero' => $data['genero']]);
            })->where([
                'id_curso' => $id_curso,
                'id_instituicao' => $id_instituicao,
                'id_ano_lectivo' => $id_ano_lectivo
            ])->get();
        } elseif ($idade == null && $genero == null) {

            $estudantes = Estudante::with('pessoas')->where([
                'id_curso' => $id_curso,
                'id_instituicao' => $id_instituicao,
                'id_ano_lectivo' => $id_ano_lectivo
            ])->get();
        }

        return $estudantes;
    }

    public static function getPessoaData($id_pessoa)
    {
        $pessoa = Pessoa::find($id_pessoa);

        return $pessoa;
    }
}