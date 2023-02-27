<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnoLectivo extends Model
{
    use HasFactory;

    protected $table = 'ano_lectivos';

    protected $fillable = [
        'id_instituicao',
        'ano',
        'estado',
    ];

    public function instituicaos()
    {
        return $this->belongsTo(Instituicao::class, 'id_instituicao');
    }

    public function turmas()
    {
        return $this->hasMany(Turma::class, 'id_ano_lectivo');
    }

    public function estudantes()
    {
        return $this->hasMany(Estudante::class, 'id_ano_lectivo');
    }

    public function classificadors()
    {
        return $this->hasMany(Classificador::class, 'id_ano_lectivo');
    }

    public function emolumentos()
    {
        return $this->hasMany(Emolumento::class, 'id_ano_lectivo');
    }
}
