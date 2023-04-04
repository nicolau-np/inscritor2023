<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos';

    protected $fillable = [
        'id_instituicao',
        'curso',
        'sigla',
        'estado',
    ];

    public function instituicaos()
    {
        return $this->belongsTo(Instituicao::class, 'id_instituicao');
    }

    public function turmas()
    {
        return $this->hasMany(Turma::class, 'id_curso');
    }

    public function estudantes()
    {
        return $this->hasMany(Estudante::class, 'id_curso');
    }

    public function users()
    {
        return $this->hasMany(Curso::class, 'id_curso');
    }
}