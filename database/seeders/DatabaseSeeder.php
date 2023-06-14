<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PaisSeeder::class,
            ProvinciaSeeder::class,
            MunicipioSeeder::class,
            PessoaSeeder::class,
            InstituicaoSeeder::class,
            UsuarioSeeder::class,
            CursoSeeder::class,
            ClasseSeeder::class,
            AnoLectivoSeeder::class,
            /*ClassificadorSeeder::class,
            EmolumentoSeeder::class,*/
        ]);
    }
}
