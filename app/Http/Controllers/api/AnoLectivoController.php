<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\AnoLectivo;
use App\Models\Instituicao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnoLectivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ano_lectivos = AnoLectivo::paginate(10);
        $title = 'Ano Lectivo - Listar';
        $type = 'extras';
        $menu = 'Ano Lectivo';
        $submenu = 'Listar';

        return view('extras.ano_lectivos.index', compact('title', 'type', 'menu', 'submenu', 'ano_lectivos'));
    }


    public function create()
    {
        $instituicaos = Instituicao::orderBy('instituicao', 'asc');
        $title = 'Ano Lectivo - Novo';
        $type = 'extras';
        $menu = 'Ano Lectivo';
        $submenu = 'Novo';

        return view('extras.ano_lectivos.create', compact('title', 'type', 'menu', 'submenu', 'instituicaos'));
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
            'id_instituicao' => 'required|integer|exists:instituicaos,id',
            'ano' => 'required|string',
        ], [], [
            'id_instituicao' => 'Instituição',
            'ano' => 'Ano Lectivo',
        ]);

        DB::beginTransaction();
        try {
            AnoLectivo::create($request->all());
            DB::commit();
            return back()->with('success', "Feito com sucesso!");
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

    public function edit($id)
    {
        $ano_lectivo = AnoLectivo::find($id);
        if (!$ano_lectivo)
            return back()->with('error', "Nao encontrou");

        $instituicaos = Instituicao::orderBy('instituicao', 'asc');
        $title = 'Ano Lectivo - Editar';
        $type = 'extras';
        $menu = 'Ano Lectivo';
        $submenu = 'Editar';

        return view('extras.ano_lectivos.edit', compact('title', 'type', 'menu', 'submenu', 'instituicaos', 'ano_lectivo'));
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
        $ano_lectivo = AnoLectivo::find($id);
        if (!$ano_lectivo)
            return back()->with('error', "Nao encontrou");

        $this->validate($request, [
            'id_instituicao' => 'required|integer|exists:instituicaos,id',
            'ano' => 'required|string',
        ], [], [
            'id_instituicao' => 'Instituição',
            'ano' => 'Ano Lectivo',
        ]);

        DB::beginTransaction();
        try {
            AnoLectivo::find($id)->update($request->all());
            DB::commit();
            return back()->with('success', "Feito com sucesso!");
        } catch (\Exception $e) {
            DB::rollBack();
            return response(['error' => $e->getMessage()], 500);
        }
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
