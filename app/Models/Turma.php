<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $table = 'turmas';

    protected $fillable = [
        'id_curso',
        'id_classe',
        'id_ano_lectivo',
        'turma',
        'estado',
    ];

    public function cursos()
    {
        return $this->belongsTo(Curso::class, 'id_curso');
    }

    public function classes()
    {
        return $this->belongsTo(Classe::class, 'id_classe');
    }

    public function ano_lectivos()
    {
        return $this->belongsTo(AnoLectivo::class, 'id_ano_lectivo');
    }
}