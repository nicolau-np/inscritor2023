<?php

namespace Database\Seeders;

use App\Models\Classificador;
use Illuminate\Database\Seeder;

class ClassificadorSeeder extends Seeder
{
    static $classificadors = [
        [
            'id_instituicao' => 1,
            'id_ano_lectivo' => 1,
            'data_inicio' => '2007-01-01',
            'data_fim' => '2023-01-01',
            'estado' => 'on',
        ]
    ];
    public function run()
    {
        foreach (Self::$classificadors as $classificadors) {
            Classificador::create($classificadors);
        }
    }
}