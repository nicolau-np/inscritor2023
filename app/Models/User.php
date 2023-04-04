<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'usuarios';

    protected $fillable = [
        'id_instituicao',
        'id_pessoa',
        'id_curso',
        'name',
        'password',
        'nivel_acesso',
        'estado',
    ];

    public function instituicaos(){
        return $this->belongsTo(Instituicao::class, 'id_instituicao');
    }

    public function pessoas(){
        return $this->belongsTo(Pessoa::class, 'id_pessoa');
    }

    public function cursos(){
        return $this->belongsTo(Curso::class, 'id_curso');
    }
}