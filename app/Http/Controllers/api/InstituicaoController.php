<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Instituicao;
use App\Models\Provincia;
use Illuminate\Http\Request;

class InstituicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instituicaos = Instituicao::paginate(10);
        $title = 'Instituição - Listar';
        $type = 'instituicaos';
        $menu = 'Instituição';
        $submenu = 'Listar';

        return view('instituicaos.index', compact('title', 'type', 'menu', 'submenu', 'instituicaos'));
    }

    public function create()
    {
        $provincias = Provincia::orderBy('provincia', 'asc');
        $title = 'Instituição - Nova';
        $type = 'instituicaos';
        $menu = 'Instituição';
        $submenu = 'Nova';

        return view('instituicaos.create', compact('title', 'type', 'menu', 'submenu', 'provincias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
