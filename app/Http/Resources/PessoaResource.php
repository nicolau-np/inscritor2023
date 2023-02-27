<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PessoaResource extends JsonResource
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
            'municipio' => new MunicipioResource($this->municipios),
            'nome' => $this->nome,
            'data_nascimento' => $this->data_nascimento,
            'genero' => $this->genero,
            'email' => $this->email,
            'estado_civil' => $this->estado_civil,
            'naturalidade' => $this->naturalidade,
            'telefone' => $this->telefone,
            'bilhete' => $this->bilhete,
            'data_emissao' => $this->data_emissao,
            'numero_filho' => $this->numero_filho,
            'local_emissao' => $this->local_emissao,
            'comuna' => $this->comuna,
            'foto' => $this->foto,
        ];
    }
}
