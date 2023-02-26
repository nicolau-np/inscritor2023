<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emolumento extends Model
{
    use HasFactory;

    protected $table = 'emolumentos';

    protected $fillable = [
        'id_instituicao',
        'id_ano_lectivo',
        'emolumento',
        'valor',
        'estado',
    ];

    public function ano_lectivos()
    {
        return $this->belongsTo(AnoLectivo::class, 'id_ano_lectivo');
    }

    public function instituicaos()
    {
        return $this->belongsTo(Instituicao::class, 'id_instituicao');
    }
}
