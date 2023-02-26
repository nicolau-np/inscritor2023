<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $fillable = [
        'id_instituicao',
        'classe',
        'estado',
    ];

    public function instituicaos()
    {
        return $this->belongsTo(Instituicao::class, 'id_instituicao');
    }

    public function turmas()
    {
        return $this->hasMany(Turma::class, 'id_classe');
    }

    public function estudantes()
    {
        return $this->hasMany(Estudante::class, 'id_classe');
    }
}