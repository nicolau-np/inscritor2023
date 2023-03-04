<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{

    public function run()
    {
        User::create(
            [
                'id_instituicao' => null,
                'id_pessoa' => 1,
                'name' => 'manager.inscritor',
                'password' => Hash::make('welwitchia2023'),
                'nivel_acesso' => 'manager',
                'estado' => 'on',
            ],
            [
                'id_instituicao' => 1,
                'id_pessoa' => 2,
                'name' => 'admin.inscritor',
                'password' => Hash::make('welwitchia2023'),
                'nivel_acesso' => 'admin',
                'estado' => 'on',
            ],
            [
                'id_instituicao' => 1,
                'id_pessoa' => 3,
                'name' => 'user.inscritor',
                'password' => Hash::make('welwitchia2023'),
                'nivel_acesso' => 'user',
                'estado' => 'on',
            ],
        );
    }
}
