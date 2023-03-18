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
                    {{Form::open(['url'=>"/extras/classes", 'method'=>"post"])}}
                    @csrf
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
                                    <div class="col-md-5">
                                        <label for="">Classe <span
                                                class="text-danger">*</span></label>
                                        {{Form::text('classe', null,
                                        ['placeholder'=>"Classe",
                                        'class'=>"form-control"])}}
                                        @if ($errors->has('classe'))
                                        <span class="text-danger">{{ $errors->first('classe')}}</span>
                                        @endif
                                    </div>
                                     <div class="col-md-4">
                                        <label for="">Instituição <span
                                                class="text-danger">*</span></label>
                                                {{Form::select('id_instituicao', $instituicaos->pluck('instituicao', 'id'),null, ['placeholder'=>"Instituição", 'class'=>"form-control"])}}
                                        @if ($errors->has('id_instituicao'))
                                        <span class="text-danger">{{ $errors->first('id_instituicao')}}</span>
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
