<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    use HasFactory;

    protected $table = 'instituicaos';

    protected $fillable = [
        'id_municipio',
        'instituicao',
        'sigla',
        'endereco',
        'telefone',
        'estado',
    ];

    public function municipios()
    {
        return $this->belongsTo(Municipio::class, 'id_municipio');
    }

    public function usuarios()
    {
        return $this->hasMany(User::class, 'id_instituicao');
    }

    public function cursos()
    {
        return $this->hasMany(Curso::class, 'id_instituicao');
    }

    public function classes()
    {
        return $this->hasMany(Classe::class, 'id_instituicao');
    }

    public function emolumentos()
    {
        return $this->hasMany(Emolumento::class, 'id_instituicao');
    }

    public function classificadors()
    {
        return $this->hasMany(Classificador::class, 'id_instituicao');
    }

    public function estudantes()
    {
        return $this->hasMany(Estudante::class, 'id_instituicao');
    }

    public function ano_lectivos()
    {
        return $this->hasMany(AnoLectivo::class, 'id_instituicao');
    }

    public function encerramento_actividades(){
        return $this->hasMany(EncerramentoActividade::class, 'id_instituicao');
    }

}
