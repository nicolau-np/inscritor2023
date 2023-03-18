@extends('layouts.app')
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">{{$menu}}</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="/">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">{{$menu}}</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">{{$submenu}}</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{Form::open(['url'=>"estudantes/{$estudante->id}", 'method'=>"put"])}}
                    <div class="card-header">
                        <div class="card-title">Formulário de Cadastro
                            &nbsp;&nbsp; <a href="/estudantes"><i class="fa
                                    fa-search"></i></a></div>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                @include('includes.messages')
                            </div>

                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Nome Completo <span
                                                class="text-danger">*</span></label>
                                        {{Form::text('nome', $estudante->pessoas->nome,
                                        ['placeholder'=>"Nome completo",
                                        'class'=>"form-control"])}}
                                        @if ($errors->has('nome'))
                                        <span class="text-danger">{{ $errors->first('nome')}}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-2">
                                        <label for="">Gênero <span
                                                class="text-danger">*</span></label>
                                        {{Form::select('genero', [
                                        'M'=>"M",
                                        'F'=>"F"
                                        ],$estudante->pessoas->genero, ['placeholder'=>"Gênero", 'class'=>"form-control"])}}

                                        @if ($errors->has('genero'))
                                        <span class="text-danger">{{ $errors->first('genero')}}</span>
                                        @endif
                                    </div>



                                    <div class="col-md-4">
                                        <label for="">Data de Nascimento <span
                                                class="text-danger">*</span></label>
                                        {{Form::date('data_nascimento', $estudante->pessoas->data_nascimento,
                                        ['placeholder'=>"Data de Nascimento",
                                        'class'=>"form-control"])}}
                                        @if ($errors->has('data_nascimento'))
                                        <span class="text-danger">{{ $errors->first('data_nascimento')}}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Curso <span
                                                class="text-danger">*</span></label>
                                                {{Form::select('id_curso', $cursos, $estudante->id_curso, ['placeholder'=>"Curso", 'class'=>"form-control"])}}
                                        @if ($errors->has('id_curso'))
                                        <span class="text-danger">{{ $errors->first('id_curso')}}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-2">
                                        <label for="">Classe <span
                                                class="text-danger">*</span></label>
                                                {{Form::select('id_classe', $classes->pluck('classe', 'id'), $estudante->id_classe, ['placeholder'=>"Classe", 'class'=>"form-control"])}}
                                        @if ($errors->has('id_classe'))
                                        <span class="text-danger">{{ $errors->first('id_classe')}}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Ano Lectivo <span
                                                class="text-danger">*</span></label>
                                                {{Form::select('id_ano_lectivo', $ano_lectivos->pluck('ano', 'id'), $estudante->id_ano_lectivo, ['placeholder'=>"Ano Lectivo", 'class'=>"form-control"])}}
                                        @if ($errors->has('id_ano_lectivo'))
                                        <span class="text-danger">{{ $errors->first('id_ano_lectivo')}}</span>
                                        @endif
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button class="btn btn-success" type="submit">Salvar</button>
                        <button class="btn btn-danger" type="reset">Cancelar</button>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
