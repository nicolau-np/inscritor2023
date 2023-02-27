<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MunicipioResource;
use App\Models\Municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    public function index(){
        $municipios = Municipio::all();
        return MunicipioResource::collection($municipios);
    }

    public function municipiosProvincia($provincia){
        $municipios = Municipio::whereHas('provincias', function($query) use($provincia){
            $query->where('provincia', $provincia);
        })->get();
        return MunicipioResource::collection($municipios);
    }
}