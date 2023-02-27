<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EstudanteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'instituicao'=>new InstituicaoResource($this->instituicaos),
            'classe'=>new ClasseResource($this->classes),
            'ano_lectivo'=>new AnoLectivoResource($this->ano_lectivos),
            'estado_classificacao'=>$this->estado_classificacao,
            'estado'=>$this->estado,
        ];
    }
}
