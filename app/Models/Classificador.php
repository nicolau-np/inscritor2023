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
        'id_classe',
        'id_curso',
        'data_inicio',
        'data_fim',
        'estado',
    ];

    public function classes(){
        return $this->belongsTo(Classe::class, 'id_classe');
    }

    public function cursos(){
        return $this->belongsTo(Curso::class, 'id_curso');
    }

    public function instituicaos(){
        return $this->belongsTo(Instituicao::class, 'id_instituicao');
    }

    public function ano_lectivos(){
        return $this->belongsTo(AnoLectivo::class, 'id_ano_lectivo');
    }
}
