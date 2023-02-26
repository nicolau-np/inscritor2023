<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;

    protected $table = 'municipios';

    protected $fillable = [
        'id_provincia',
        'municipio',
    ];

    public function provincias()
    {
        return $this->belongsTo(Provincia::class, 'id_provincia');
    }

    public function pessoas()
    {
        return $this->hasMany(Pessoa::class, 'id_municipio');
    }

    public function instituicaos()
    {
        return $this->hasMany(Instituicao::class, 'id_municipio');
    }
}