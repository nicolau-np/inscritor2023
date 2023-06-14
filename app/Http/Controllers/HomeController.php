<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudante;
use App\Models\Classificador;
use App\Models\EncerramentoActividade;

class HomeController extends Controller
{
    public function home()
    {
        $title = '[INSCRITOR] - Sistema de Selecção Automática';
        $type = 'home';
        $menu = 'Home';
        $submenu = null;
        return view('home', compact('title', 'type', 'menu', 'submenu'));
    }

    public function client()
    {
        $title = '[INSCRITOR] - Sistema de Selecção Automática';
        $type = 'home';
        $menu = 'Home';
        $submenu = null;
        return view('client.home', compact('title', 'type', 'menu', 'submenu'));
    }

    public function consultar(Request $request){

       $estudante = "no";
       $classificador = "no";
       $inscricao = $request->numero_inscricao;
       if($request->numero_inscricao){

        $parte_restante = substr($request->numero_inscricao, 4); #pegando o numero de inscricao sabendo que os 4 primeiros representam o ano civil os restantes e o id do estudante

        try{
            $estudante = Estudante::find($parte_restante);
            if(!$estudante)
                return back()->with('error', "Nº de Inscrição não existente!");

            $encerramento_actividade = EncerramentoActividade::where(['id_ano_lectivo'=>$estudante->id_ano_lectivo, 'id_instituicao'=>$estudante->id_instituicao])->first();
            if(!$encerramento_actividade){
                $classificador = "no";
            }else{
                $classificador = Classificador::where(['id_ano_lectivo'=>$estudante->id_ano_lectivo, 'id_classe'=>$estudante->id_classe, 'id_curso'=>$estudante->id_curso])->first();
                if(!$classificador){
                    $classificador = "no";
                }
            }
        }catch(\Exception $e){
            $classificador = "no";
            return back()->with('error', 'Sem permissão para prosseguir com a operação. Code:'.$e->getCode());
        }
    }

        $title = '[INSCRITOR] - Sistema de Selecção Automática';
        $type = 'consultar';
        $menu = 'Consultar';
        $submenu = null;
        return view('client.consultar', compact('title', 'type', 'menu', 'submenu', 'estudante', 'classificador', 'inscricao'));
    }
}
