<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classificador extends Model
{
    use HasFactory;

    protected $table = 'classificadors';

    protected $fillable = [
        'id_instituicao',
        'id_ano_lectivo',
        'data_inicio',
        'data_fim',
        'estado',
    ];

    public function instituicaos(){
        return $this->belongsTo(Instituicao::class, 'id_instituicao');
    }

    public function ano_lectivos(){
        return $this->belongsTo(AnoLectivo::class, 'id_ano_lectivo');
    }
}