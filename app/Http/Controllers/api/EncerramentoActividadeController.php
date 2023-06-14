<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\EncerramentoActividade;
use App\Models\AnoLectivo;
use Illuminate\Support\Facades\DB;

class EncerramentoActividadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $encerramento_actividades = EncerramentoActividade::paginate(12);
        $title = 'Encerramento de Actividade - Listar';
        $type = 'encerramento';
        $menu = 'Encerramento de Actividade';
        $submenu = 'Listar';

        return view('encerramento_actividade.index', compact('title', 'type', 'menu', 'submenu', 'encerramento_actividades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id_instituicao = Auth::user()->id_instituicao;

        $ano_lectivos = AnoLectivo::where('id_instituicao', $id_instituicao)->orderBy('id','asc');

        $title = 'Encerramento de Actividade - Listar';
        $type = 'encerramento';
        $menu = 'Encerramento de Actividade';
        $submenu = 'Novo';

        return view('encerramento_actividade.create', compact('title', 'type', 'menu', 'submenu', 'ano_lectivos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_instituicao = Auth::user()->id_instituicao;
        $this->validate($request, [
            'id_ano_lectivo'=>'required|integer|exists:ano_lectivos,id',
            'estado'=>'required|string',
        ],[]);

        $data = $request->all();
        $data['id_instituicao'] = $id_instituicao;
        DB::beginTransaction();
        try {
            EncerramentoActividade::create($data);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        $encerramento_actividade = EncerramentoActividade::find($id);
        if(!$encerramento_actividade)
            return back()->with('error', 'Nao encontrou');

            DB::beginTransaction();
            try {
                $encerramento_actividade->delete();
                DB::commit();
                return back()->with('success', "Feito com sucesso!");
            } catch (\Exception $e) {
                DB::rollBack();
                return back()->with('error', 'Sem permição para prosseguir com a operação. Code: '.$e->getCode());
            }
    }
}
