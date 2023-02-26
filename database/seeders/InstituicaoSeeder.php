<?php

namespace Database\Seeders;

use App\Models\Instituicao;
use Illuminate\Database\Seeder;

class InstituicaoSeeder extends Seeder
{
    static $instituicaos = [
        [
            'id_municipio' => 1,
            'instituicao' => 'Liceu Welwitchia Mirabilis',
            'sigla' => 'LWM',
            'endereco' => 'Eucaliptos - Moçamedes',
            'telefone' => 923983921,
            'estado' => 'on',
        ]
    ];

    public function run()
    {
        foreach (Self::$instituicaos as $instituicaos) {
            Instituicao::create($instituicaos);
        }
    }
}