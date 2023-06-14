<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Instituicao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::paginate(10);
        $title = 'Cursos - Listar';
        $type = 'extras';
        $menu = 'Cursos';
        $submenu = 'Listar';

        return view('extras.cursos.index', compact('title', 'type', 'menu', 'submenu', 'cursos'));
    }

    public function create()
    {
        $instituicaos = Instituicao::orderBy('instituicao', 'asc');
        $title = 'Cursos - Novo';
        $type = 'extras';
        $menu = 'Cursos';
        $submenu = 'Novo';

        return view('extras.cursos.create', compact('title', 'type', 'menu', 'submenu', 'instituicaos'));
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
            'curso' => 'required|string',
            'id_instituicao' => 'required|integer|exists:instituicaos,id',
        ], [], [
            'curso' => 'Curso',
            'id_instituicao' => 'Instituição'
        ]);

        DB::beginTransaction();
        try {
            $curso = Curso::create($request->all());
            DB::commit();
            return back()->with('success', "Feito com sucesso!");
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Sem permição para prosseguir com a operação. Code: '.$e->getCode());
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
        $curso = Curso::find($id);
        if (!$curso)
            return back()->with('error', "Nao encontrou");

        $instituicaos = Instituicao::orderBy('instituicao', 'asc');
        $title = 'Cursos - Editar';
        $type = 'extras';
        $menu = 'Cursos';
        $submenu = 'Editar';

        return view('extras.cursos.edit', compact('title', 'type', 'menu', 'submenu', 'instituicaos', 'curso'));
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
        $curso = Curso::find($id);
        if (!$curso)
            return back()->with('error', "Nao encontrou");

        $this->validate($request, [
            'curso' => 'required|string',
            'id_instituicao' => 'required|integer|exists:instituicaos,id',
        ], [], [
            'curso' => 'Curso',
            'id_instituicao' => 'Instituição'
        ]);

        DB::beginTransaction();
        try {
            $curso = Curso::find($id)->update($request->all());
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
        $curso = Curso::find($id);
        if(!$curso)
            return back()->with('error', 'Não encontrou');
        
        DB::beginTransaction();
        try {
            $curso->delete();
            DB::commit();
            return back()->with('success', "Eliminado com sucesso!");
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Sem permição para prosseguir com a operação. Code: '.$e->getCode());
        }
    }
}
