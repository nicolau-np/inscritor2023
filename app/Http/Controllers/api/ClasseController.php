<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Instituicao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classe::paginate(10);
        $title = 'Classes - Listar';
        $type = 'extras';
        $menu = 'Classes';
        $submenu = 'Listar';

        return view('extras.classes.index', compact('title', 'type', 'menu', 'submenu', 'classes'));
    }

    public function create()
    {
        $instituicaos = Instituicao::orderBy('instituicao', 'asc');
        $title = 'Classes - Nova';
        $type = 'extras';
        $menu = 'Classes';
        $submenu = 'Nova';

        return view('extras.classes.create', compact('title', 'type', 'menu', 'submenu', 'instituicaos'));
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
            'classe' => 'required|string',
            'id_instituicao' => 'required|integer|exists:instituicaos,id',
        ], [], [
            'classe' => 'Classe',
            'id_instituicao' => 'Instituição'
        ]);

        DB::beginTransaction();
        try {
            $classe = Classe::create($request->all());
            DB::commit();
            return back()->with('success', "Feito com sucesso!");
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Sem permição para prosseguir com a operação. Code: '.$e->getCode());
        }
    }

    public function edit($id)
    {
        $classe = Classe::find($id);
        if (!$classe)
            return back()->with('error', 'Nao encontrou');

        $instituicaos = Instituicao::orderBy('instituicao', 'asc');
        $title = 'Classes - Nova';
        $type = 'extras';
        $menu = 'Classes';
        $submenu = 'Nova';

        return view('extras.classes.edit', compact('title', 'type', 'menu', 'submenu', 'instituicaos', 'classe'));
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

        $classe = Classe::find($id);
        if (!$classe)
            return back()->with('error', 'Nao encontrou');

        $this->validate($request, [
            'classe' => 'required|string',
            'id_instituicao' => 'required|integer|exists:instituicaos,id',
        ], [], [
            'classe' => 'Curso',
            'id_instituicao' => 'Instituição'
        ]);

        DB::beginTransaction();
        try {
            $classe = Classe::find($id)->update($request->all());
            DB::commit();
            return back()->with('success', "Feito com sucesso!");
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Sem permição para prosseguir com a operação. Code: '.$e->getCode());
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
        $classe = Classe::find($id);
        if(!$classe)
            return back()->with('error', 'Não encontrou');
        
        DB::beginTransaction();
        try {
            $classe->delete();
            DB::commit();
            return back()->with('success', "Eliminada com sucesso!");
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Sem permição para prosseguir com a operação. Code: '.$e->getCode());
        }
    }
}