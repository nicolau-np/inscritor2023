<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaisResource extends JsonResource
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
            'pais'=>$this->pais,
            'capital'=>$this->capital,
            'indicativo'=>$this->indicativo,
            'img_bandeira'=>$this->img_bandeira,
        ];
    }
}
