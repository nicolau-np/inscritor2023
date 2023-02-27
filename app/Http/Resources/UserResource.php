<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'pessoa' => new PessoaResource($this->pessoas),
            'name' => $this->name,
            'password' => $this->password,
            'nivel_acesso' => $this->nivel_acesso,
            'estado' => $this->estado,
        ];
    }
}