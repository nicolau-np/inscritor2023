<?php

namespace App\Http\Controllers;

use App\Models\Estudante;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class StaticController extends Controller
{

    public static function countEstudantes($id_curso, $id_instituicao, $id_ano_lectivo, $genero = null, $data_inicial, $data_final)
    {
        $estudantes = null;

        $data = [
            'genero' => $genero,
        ];

        if ($genero != null) {

            $estudantes = Estudante::with('pessoas')->whereHas('pessoas', function ($query) use ($data) {
                $query->where('genero', $data['genero']);
            })->where([
                'id_curso' => $id_curso,
                'id_instituicao' => $id_instituicao,
                'id_ano_lectivo' => $id_ano_lectivo
            ])->whereDate('created_at', '>=', $data_inicial)->whereDate('created_at', '<=', $data_final)
                ->get();
        } elseif ($genero == null) {

            $estudantes = Estudante::with('pessoas')->where([
                'id_curso' => $id_curso,
                'id_instituicao' => $id_instituicao,
                'id_ano_lectivo' => $id_ano_lectivo
            ])->whereDate('created_at', '>=', $data_inicial)->whereDate('created_at', '<=', $data_final)
                ->get();
        }

        return $estudantes;
    }

    public static function countEstudantesIdade($id_curso, $id_instituicao, $id_ano_lectivo, $idade, $data_inicial, $data_final)
    {
        $estudantes = null;

        $ano_actual = date('Y');
        $ano_nascimento = $ano_actual - $idade;

        $data = [
            'ano_nascimento' => $ano_nascimento,
        ];

        if ($idade >= 17) {
            $estudantes = Estudante::with('pessoas')->whereHas('pessoas', function ($query) use ($data) {
                $query->whereYear('data_nascimento', '<=', $data['ano_nascimento']);
            })->where([
                'id_curso' => $id_curso,
                'id_instituicao' => $id_instituicao,
                'id_ano_lectivo' => $id_ano_lectivo
            ])->whereDate('created_at', '>=', $data_inicial)->whereDate('created_at', '<=', $data_final)
                ->get();
        } else {
            $estudantes = Estudante::with('pessoas')->whereHas('pessoas', function ($query) use ($data) {
                $query->whereYear('data_nascimento', $data['ano_nascimento']);
            })->where([
                'id_curso' => $id_curso,
                'id_instituicao' => $id_instituicao,
                'id_ano_lectivo' => $id_ano_lectivo
            ])->whereDate('created_at', '>=', $data_inicial)->whereDate('created_at', '<=', $data_final)
                ->get();
        }

        return $estudantes;
    }

    public static function countEstudantesIdadeGenero($id_curso, $id_instituicao, $id_ano_lectivo, $idade, $genero, $data_inicial, $data_final)
    {
        $estudantes = null;

        $ano_actual = date('Y');
        $ano_nascimento = $ano_actual - $idade;

        $data = [
            'ano_nascimento' => $ano_nascimento,
            'genero' => $genero,
        ];

        if ($idade >= 17) {
            $estudantes = Estudante::with('pessoas')->whereHas('pessoas', function ($query) use ($data) {
                $query->whereYear('data_nascimento', '<=', $data['ano_nascimento']);
                $query->where('genero', $data['genero']);
            })->where([
                'id_curso' => $id_curso,
                'id_instituicao' => $id_instituicao,
                'id_ano_lectivo' => $id_ano_lectivo
            ])->whereDate('created_at', '>=', $data_inicial)->whereDate('created_at', '<=', $data_final)
            ->get();
        } else {
            $estudantes = Estudante::with('pessoas')->whereHas('pessoas', function ($query) use ($data) {
                $query->whereYear('data_nascimento', $data['ano_nascimento']);
                $query->where('genero', $data['genero']);
            })->where([
                'id_curso' => $id_curso,
                'id_instituicao' => $id_instituicao,
                'id_ano_lectivo' => $id_ano_lectivo
            ])->whereDate('created_at', '>=', $data_inicial)->whereDate('created_at', '<=', $data_final)
            ->get();
        }

        return $estudantes;
    }
}
