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
                    {{Form::open(['url'=>"usuarios", 'method'=>"post"])}}
                    @csrf
                    <div class="card-header">
                        <div class="card-title">Formulário de Cadastro
                            &nbsp;&nbsp; <a href="/usuarios"><i class="fa
                                    fa-search"></i></a>

                                </div>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12" style="font-weight:bold; font-size:15px;">

                                @include('includes.messages')
                            </div>

                            <div class="col-md-12">

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Nome Completo <span class="text-danger">*</span></label>
                                        {{ Form::text('nome', null, ['placeholder' => 'Nome completo', 'class' => 'form-control']) }}
                                        @if ($errors->has('nome'))
                                            <span class="text-danger">{{ $errors->first('nome') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-2">
                                        <label for="">Gênero <span class="text-danger">*</span></label>
                                        {{ Form::select(
                                            'genero',
                                            [
                                                'M' => 'M',
                                                'F' => 'F',
                                            ],
                                            null,
                                            ['placeholder' => 'Gênero', 'class' => 'form-control'],
                                        ) }}

                                        @if ($errors->has('genero'))
                                            <span class="text-danger">{{ $errors->first('genero') }}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Data de Nascimento <span
                                                class="text-danger">*</span></label>
                                        {{ Form::date('data_nascimento', null, ['placeholder' => 'Data de Nascimento', 'class' => 'form-control']) }}
                                        @if ($errors->has('data_nascimento'))
                                            <span class="text-danger">{{ $errors->first('data_nascimento') }}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Nome de Usuário <span class="text-danger">*</span></label>
                                        {{ Form::text('name', null, ['placeholder' => 'Nome de Usuário', 'class' => 'form-control']) }}
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">E-mail <span class="text-danger">*</span></label>
                                        {{ Form::text('email', null, ['placeholder' => 'E-mail', 'class' => 'form-control']) }}
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Foto </label>
                                        {{ Form::file('foto', null, ['placeholder' => 'Foto', 'class' => 'form-control']) }}
                                        @if ($errors->has('foto'))
                                            <span class="text-danger">{{ $errors->first('foto') }}</span>
                                        @endif
                                    </div>

                                    
                                    <div class="col-md-4">
                                        <label for="">Curso </label>
                                        {{ Form::select('id_curso', $cursos->pluck('curso', 'id'), null, ['placeholder' => 'Curso', 'class' => 'form-control']) }}
                                        @if ($errors->has('id_curso'))
                                            <span class="text-danger">{{ $errors->first('id_curso') }}</span>
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
