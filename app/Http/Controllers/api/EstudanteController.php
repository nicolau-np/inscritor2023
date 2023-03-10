<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EstudanteResource;
use App\Models\Estudante;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstudanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudantes = Estudante::paginate(10);
        return EstudanteResource::collection($estudantes);
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
            'nome' => 'required|string|min:10',
            'data_nascimento' => 'required|date|before_or_equal:today',
            'genero' => 'required|string',
            'id_instituicao' => 'required|integer|exists:instituicaos,id',
            'id_classe' => 'required|integer|exists:classes,id',
            'id_ano_lectivo' => 'required|integer|ano_lectivos,id',
        ], [], [
            'nome' => 'Nome',
            'data_nascimento' => 'Data de Nascimento',
            'genero' => 'Gênero',
            'id_instituicao' => 'Instituição',
            'id_classe' => 'Classe',
            'id_ano_lectivo' => 'Ano Lectivo',
        ]);

        $data['person'] = [
            'nome' => $request->nome,
            'genero' => $request->genero,
            'data_nascimento' => $request->data_nascimento
        ];

        $data['student'] = [
            'id_pessoa' => null,
            'id_instituicao' => $request->id_instituicao,
            'id_classe' => $request->id_classe,
            'id_ano_lectivo' => $request->id_ano_lectivo,
        ];

        DB::beginTransaction();
        try {
            $pessoa = Pessoa::create($data['person']);
            $data['student']['id_pessoa'] = $pessoa->id;
            $estudante = Estudante::create($data['student']);
            DB::commit();
            return new EstudanteResource($estudante);
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
        $estudante = Estudante::find($id);
        if (!$estudante)
            return response(['errors' => "Nao encontrou"], 400);
        return new EstudanteResource($estudante);
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

        $estudante = Estudante::find($id);
        if (!$estudante)
            return response(['errors' => "Nao encontrou"], 400);

        $this->validate($request, [
            'nome' => 'required|string|min:10',
            'data_nascimento' => 'required|date|before_or_equal:today',
            'genero' => 'required|string',
            'id_instituicao' => 'required|integer|exists:instituicaos,id',
            'id_classe' => 'required|integer|exists:classes,id',
            'id_ano_lectivo' => 'required|integer|ano_lectivos,id',
        ], [], [
            'nome' => 'Nome',
            'data_nascimento' => 'Data de Nascimento',
            'genero' => 'Gênero',
            'id_instituicao' => 'Instituição',
            'id_classe' => 'Classe',
            'id_ano_lectivo' => 'Ano Lectivo',
        ]);

        $data['person'] = [
            'nome' => $request->nome,
            'genero' => $request->genero,
            'data_nascimento' => $request->data_nascimento
        ];

        $data['student'] = [
            'id_instituicao' => $request->id_instituicao,
            'id_classe' => $request->id_classe,
            'id_ano_lectivo' => $request->id_ano_lectivo,
        ];

        DB::beginTransaction();
        try {
            $pessoa = Pessoa::find($estudante->id_pessoa)->update($data['person']);
            Estudante::find($estudante->id)->update($data['student']);
            DB::commit();
            return new EstudanteResource($estudante);
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
        $estudante = Estudante::find($id);
        if (!$estudante)
            return response(['errors' => "Nao encontrou"], 400);

        Pessoa::find($estudante->id_pessoa)->delete();

        return response(['success' => "Feito com sucesso"], 200);
    }
}