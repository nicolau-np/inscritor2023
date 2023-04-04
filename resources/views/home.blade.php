@extends('layouts.app')
@section('content')
<div class="content">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">{{Auth::user()->nivel_acesso!='manager' ? Auth::user()->instituicaos->instituicao : 'Principal'}}</h2>
                    <h5 class="text-white op-7 mb-2">INSCRITOR - Sistema de Selecção Automática</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <a href="#" class="btn btn-white btn-border btn-round mr-2">Administração</a>
                    <a href="#" class="btn btn-secondary btn-round">Estudantes</a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                       hello
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

