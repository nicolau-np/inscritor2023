<?php

namespace Database\Seeders;

use App\Models\Emolumento;
use Illuminate\Database\Seeder;

class EmolumentoSeeder extends Seeder
{
    static $emolumentos = [
        [
            'id_instituicao' => 1,
            'id_ano_lectivo' => 1,
            'valor' => 2000,
            'estado' => 'on',
        ]
    ];

    public function run()
    {
        foreach (Self::$emolumentos as $emolumentos) {
            Emolumento::create($emolumentos);
        }
    }
}