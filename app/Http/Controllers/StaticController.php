<?php

namespace App\Http\Controllers;

use App\Models\Estudante;
use Illuminate\Http\Request;

class StaticController extends Controller
{

    public static function countEstudantes($id_curso, $id_instituicao, $id_ano_lectivo, $genero = null, $idade = null)
    {
        $estudantes = null;

        $data = [
            'idade' => $idade,
            'genero' => $genero,
        ];

        if ($genero != null && $idade != null) {
            $estudantes = Estudante::whereHas('pessoas', function ($query) use ($data) {
                $query->where(['genero' => $data['genero'], 'idade' => $data['idade']]);
            })->where([
                'id_curso' => $id_curso,
                'id_instituicao' => $id_instituicao,
                'id_ano_lectivo' => $id_ano_lectivo
            ])->get();
        } elseif ($genero != null && $idade == null) {

            $estudantes = Estudante::whereHas('pessoas', function ($query) use ($data) {
                $query->where('genero', $data['genero']);
            })->where([
                'id_curso' => $id_curso,
                'id_instituicao' => $id_instituicao,
                'id_ano_lectivo' => $id_ano_lectivo
            ])->get();
            
        } elseif ($genero == null && $idade != null) {

            $estudantes = Estudante::whereHas('pessoas', function ($query) use ($data) {
                $query->where('idade', $data['idade']);
            })->where([
                'id_curso' => $id_curso,
                'id_instituicao' => $id_instituicao,
                'id_ano_lectivo' => $id_ano_lectivo
            ])->get();

        } elseif ($genero == null && $idade == null) {

            $estudantes = Estudante::where([
                'id_curso' => $id_curso,
                'id_instituicao' => $id_instituicao,
                'id_ano_lectivo' => $id_ano_lectivo
            ])->get();

        }


        return $estudantes;
    }
}