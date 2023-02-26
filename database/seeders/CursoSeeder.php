<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    static $cursos = [
        [
            'id_instituicao' => 1,
            'curso' => 'Ciencias Fisicas e Biologicas',
            'sigla' => 'CFB',
            'estado' => 'on',
        ], [
            'id_instituicao' => 1,
            'curso' => 'Ciencias Economicas e Juridicas',
            'sigla' => 'CEJ',
            'estado' => 'on',
        ],

    ];
    public function run()
    {
        foreach (Self::$cursos as $cursos) {
            Curso::create($cursos);
        }
    }
}