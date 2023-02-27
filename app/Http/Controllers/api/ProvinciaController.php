<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProvinciaResource;
use App\Models\Provincia;
use Illuminate\Http\Request;

class ProvinciaController extends Controller
{
    public function index(){
        $provincias = Provincia::all();
        return ProvinciaResource::collection($provincias);
    }
}