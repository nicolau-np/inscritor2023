<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Instituicao;
use App\Models\Provincia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $this->validate($request, [
            'id_municipio'=>'required|integer|exists:municipios,id',
            'instituicao'=>'required|string|unique:instituicaos,instituicao',
            'endereco'=>'required|string',

        ], [], [
            'id_municipio'=>'Município',
            'instituicao'=>'Instituição',
            'endereco'=>'Endereço',
        ]);

        DB::beginTransaction();
        try {
            Instituicao::create($request->all());
            DB::commit();
            return back()->with('success', "Feito com sucesso");
        } catch (\Exception $e) {
            DB::rollBack();
            return response(['error' => $e->getMessage()], 500);
        }
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