<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudante extends Model
{
    use HasFactory;

    protected $table = 'estudantes';

    protected $fillable = [
        'id_pessoa',
        'id_instituicao',
        'id_classe',
        'id_curso',
        'id_ano_lectivo',
        'estado_classificacao',
        'estado',
    ];

    public function pessoas(){
        return $this->belongsTo(Pessoa::class, 'id_pessoa');
    }

    public function instituicaos()
    {
        return $this->belongsTo(Instituicao::class, 'id_instituicao');
    }

    public function classes()
    {
        return $this->belongsTo(Classe::class, 'id_classe');
    }

    public function ano_lectivos()
    {
        return $this->belongsTo(AnoLectivo::class, 'id_ano_lectivo');
    }

    public function cursos()
    {
        return $this->belongsTo(Curso::class, 'id_curso');
    }
}
