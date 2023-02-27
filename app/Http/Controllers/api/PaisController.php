<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PaisResource;
use App\Models\Pais;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    public function index(){
        $pais = Pais::all();
        return PaisResource::collection($pais);
    }
}