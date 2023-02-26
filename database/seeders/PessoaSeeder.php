<?php

namespace Database\Seeders;

use App\Models\Pessoa;
use Illuminate\Database\Seeder;

class PessoaSeeder extends Seeder
{
    static $pessoas = [
        [
            'nome' => 'Administrador Inscritor',
            'genero' => 'N',
        ], [
            'nome' => 'Liceu Welwitchia 0',
            'genero' => 'N',
        ], [
            'nome' => 'Liceu Welwitchia 1',
            'genero' => 'N',
        ],
    ];

    public function run()
    {
        foreach (Self::$pessoas as $pessoas) {
            Pessoa::create($pessoas);
        }
    }
}