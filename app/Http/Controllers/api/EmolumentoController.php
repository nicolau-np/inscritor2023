<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\AnoLectivo;
use App\Models\Emolumento;
use App\Models\Instituicao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Psy\VersionUpdater\Installer;

class EmolumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emolumentos = Emolumento::paginate(10);
        $title = 'Emolumentos - Listar';
        $type = 'extras';
        $menu = 'Emolumentos';
        $submenu = 'Listar';

        return view('extras.emolumentos.index', compact('title', 'type', 'menu', 'submenu', 'emolumentos'));
    }

    public function create()
    {
        $instituicaos = Instituicao::orderBy('instituicao', 'asc');
        $ano_lectivos = AnoLectivo::orderBy('ano_lectivos', 'asc');
        $title = 'Emolumentos - Nova';
        $type = 'extras';
        $menu = 'Emolumentos';
        $submenu = 'Nova';

        return view('extras.emolumentos.create', compact('title', 'type', 'menu', 'submenu', 'instituicaos', 'ano_lectivos'));
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
            'id_ano_lectivo' => 'required|integer|exists:ano_lectivos,id',
            'emolumento' => 'required|string',
            'valor' => 'required|numeric|min:1',
        ], [], [
            'id_instituicao' => 'Instituição',
            'id_ano_lectivo' => 'Ano Lectivo',
            'emolumento' => 'Emolumento',
            'valor' => 'Valor',
        ]);

        DB::beginTransaction();
        try {
            Emolumento::create($request->all());
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
        $emolumento = Emolumento::find($id);
        if (!$emolumento)
            return back()->with('errors', "Nao encontrou");

        $instituicaos = Instituicao::orderBy('instituicao', 'asc');
        $ano_lectivos = AnoLectivo::where('id_instituicao', $emolumento->id_instituicao)->orderBy('ano_lectivos', 'asc');
        $title = 'Emolumentos - Editar';
        $type = 'extras';
        $menu = 'Emolumentos';
        $submenu = 'Editar';

        return view('extras.emolumentos.edit', compact('title', 'type', 'menu', 'submenu', 'instituicaos', 'ano_lectivos'));
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
        $emolumento = Emolumento::find($id);
        if (!$emolumento)
            return back()->with('errors', "Nao encontrou");

        $this->validate($request, [
            'id_instituicao' => 'required|integer|exists:instituicaos,id',
            'id_ano_lectivo' => 'required|integer|exists:ano_lectivos,id',
            'emolumento' => 'required|string',
            'valor' => 'required|numeric|min:1',
        ], [], [
            'id_instituicao' => 'Instituição',
            'id_ano_lectivo' => 'Ano Lectivo',
            'emolumento' => 'Emolumento',
            'valor' => 'Valor',
        ]);

        DB::beginTransaction();
        try {
            Emolumento::find($id)->update($request->all());
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