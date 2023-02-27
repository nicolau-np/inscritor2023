<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmolumentoResource extends JsonResource
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
            'id' => $this->id,
            'instituicao' => new InstituicaoResource($this->instituicaos),
            'ano_lectivo' => new AnoLectivoResource($this->ano_lectivos),
            'emolumento' => $this->emolumento,
            'valor' => $this->valor,
            'estado' => $this->estado,
        ];
    }
}