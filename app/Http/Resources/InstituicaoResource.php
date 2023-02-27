<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InstituicaoResource extends JsonResource
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
            'municipio' => new MunicipioResource($this->municipios),
            'instituicao' => $this->instituicao,
            'sigla' => $this->sigla,
            'endereco' => $this->endereco,
            'telefone' => $this->telefone,
            'estado' => $this->estado,
        ];
    }
}