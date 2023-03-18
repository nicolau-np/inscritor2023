<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use Illuminate\Http\Request;

class AjaxRequestController extends Controller
{
    public function municipio($id_provincia){
        $municipios = Municipio::where('id_provincia',$id_provincia)->orderBy('municipio', 'asc')->pluck('municipio', 'id');
        return view('ajaxrequest.municipios', compact('municipios'));
    }
}