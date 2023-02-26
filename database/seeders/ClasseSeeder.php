<?php

namespace Database\Seeders;

use App\Models\Classe;
use Illuminate\Database\Seeder;

class ClasseSeeder extends Seeder
{
    static $classes = [
        [
            'id_instituicao' => 1,
            'classe' => '10ª',
            'estado' => 'on',
        ]
    ];
    public function run()
    {
        foreach (Self::$classes as $classes) {
            Classe::create($classes);
        }
    }
}