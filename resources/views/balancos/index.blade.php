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
                    {{Form::open(['url'=>"balancos", 'method'=>"post"])}}
                    @csrf
                    <div class="card-header">
                        <div class="card-title">
                            &nbsp;&nbsp; <a href="/balancos"><i class="fa
                                    fa-search"></i></a></div>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                @include('includes.messages')
                            </div>

                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Data de Início <span class="text-danger">*</span></label>
                                        {{Form::date('data_inicio', null, ['class'=>"form-control", 'placeholder'=>"Data de Início"])}}
                                        @if ($errors->has('data_inicio'))
                                        <span class="text-danger">{{ $errors->first('data_inicio')}}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">Data de Fim <span class="text-danger">*</span></label>
                                        {{Form::date('data_fim', null, ['class'=>"form-control", 'placeholder'=>"Data de Fim"])}}
                                        @if ($errors->has('data_fim'))
                                        <span class="text-danger">{{ $errors->first('data_fim')}}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-3 mt-4">
                                        <button class="btn btn-primary btn-sm" type="submit"><i class="fas fa-search"></i> Pesquisar</button>
                                    </div>
                                    <div class="col-md-12">
                                        @if($estudantes)
                                        {{ $estudantes }}
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card-action">

                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
