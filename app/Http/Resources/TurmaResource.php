<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TurmaResource extends JsonResource
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
            'curso' => new CursoResource($this->cursos),
            'classe' => new ClasseResource($this->classes),
            'ano_lectivo' => new AnoLectivoResource($this->ano_lectivos),
            'turma' => $this->turma,
            'estado' => $this->estado,
        ];
    }
}