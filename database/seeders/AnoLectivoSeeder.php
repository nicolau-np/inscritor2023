<?php

namespace Database\Seeders;

use App\Models\AnoLectivo;
use Illuminate\Database\Seeder;

class AnoLectivoSeeder extends Seeder
{
    static $ano_lectivos = [
        [
            'id_instituicao' => 1,
            'ano' => '2023-2024',
            'estado' => 'on',
        ]
    ];
    public function run()
    {
        foreach (Self::$ano_lectivos as $ano_lectivos) {
            AnoLectivo::create($ano_lectivos);
        }
    }
}