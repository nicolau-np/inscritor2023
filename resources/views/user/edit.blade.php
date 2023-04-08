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
                    {{Form::open(['url'=>"/user/edit", 'method'=>"post", 'enctype' => "multipart/form-data"])}}
                    @csrf
                    <div class="card-header">
                        <div class="card-title">Formulário
                           </div>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                @include('includes.messages')
                            </div>

                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Palavra-Passe Actual <span
                                            class="text-danger">*</span></label>
                                            <input type="password" name="password_actual" class="form-control"/>
                                        @if ($errors->has('password_actual'))
                                        <span class="text-danger">{{ $errors->first('password_actual')}}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Palavra-Passe Nova<span
                                            class="text-danger">*</span></label>
                                            <input type="password" name="password" class="form-control"/>
                                        @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password')}}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Confirmar Palavra-Passe<span
                                            class="text-danger">*</span></label>
                                            <input type="password" name="password_confirmation" class="form-control"/>
                                        @if ($errors->has('password_confirmation'))
                                        <span class="text-danger">{{ $errors->first('password_confirmation')}}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-12 mt-4">
                                        <button class="btn btn-success" type="submit">Salvar</button>
                                        <button class="btn btn-danger" type="reset">Cancelar</button>
                                    </div>

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
