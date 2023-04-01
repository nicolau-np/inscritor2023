<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $table = 'pessoas';

    protected $fillable = [
        'id_municipio',
        'nome',
        'data_nascimento',
        'genero',
        'email',
        'estado_civil',
        'naturalidade',
        'telefone',
        'bilhete',
        'data_emissao',
        'numero_filho',
        'local_emissao',
        'comuna',
        'foto',
    ];

    public function municipios()
    {
        return $this->belongsTo(Municipio::class, 'id_municipio');
    }

    public function usuarios()
    {
        return $this->hasMany(User::class, 'id_pessoa');
    }

    public function estudantes(){
        return $this->hasMany(Estudante::class, 'id_pessoa');
    }

    public static function getIdade($data_nascimento){

        $age = Carbon::parse($data_nascimento)->age;

        return $age;
    }
}
