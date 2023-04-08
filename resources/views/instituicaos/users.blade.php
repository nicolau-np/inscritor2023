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
                    {{Form::open(['url'=>"/instituicaos/users/{$instituicao->id}", 'method'=>"put", 'enctype' => "multipart/form-data"])}}
                    @csrf
                    <div class="card-header">
                        <div class="card-title">Formulário de Cadastro
                            &nbsp;&nbsp; <a href="/instituicaos"><i class="fa
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
                                        {{Form::text('nome', null,
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
                                        ],null, ['placeholder'=>"Gênero", 'class'=>"form-control"])}}

                                        @if ($errors->has('genero'))
                                        <span class="text-danger">{{ $errors->first('genero')}}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Data de Nascimento <span
                                                class="text-danger">*</span></label>
                                        {{Form::date('data_nascimento', null,
                                        ['placeholder'=>"Data de Nascimento",
                                        'class'=>"form-control"])}}
                                        @if ($errors->has('data_nascimento'))
                                        <span class="text-danger">{{ $errors->first('data_nascimento')}}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Nome de Usuário <span
                                                class="text-danger">*</span></label>
                                                {{Form::text('name',null, ['placeholder'=>"Nome de Usuário", 'class'=>"form-control"])}}
                                        @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name')}}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Foto </label>
                                        {{Form::file('foto',null, ['placeholder'=>"Foto", 'class'=>"form-control"])}}
                                        @if ($errors->has('foto'))
                                        <span class="text-danger">{{ $errors->first('foto')}}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Nível de Acesso <span
                                                class="text-danger">*</span></label>
                                                {{Form::select('nivel_acesso', [
                                                    'user'=>"user",
                                                    'admin'=>'admin'
                                                ], null, ['placeholder'=>"Nível de Acesso", 'class'=>"form-control"])}}
                                        @if ($errors->has('nivel_acesso'))
                                        <span class="text-danger">{{ $errors->first('nivel_acesso')}}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Curso </label>
                                        {{Form::select('id_curso', $cursos->pluck('curso', 'id'), null, ['placeholder'=>"Curso", 'class'=>"form-control"])}}
                                        @if ($errors->has('id_curso'))
                                        <span class="text-danger">{{ $errors->first('id_curso')}}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-12 mt-4">
                                        <button class="btn btn-success" type="submit">Salvar</button>
                                        <button class="btn btn-danger" type="reset">Cancelar</button>
                                    </div>

                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-head-bg-primary mt-4">
                                            <thead>
                                              <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nome Completo</th>
                                                <th scope="col">Data de Nascimento</th>
                                                <th scope="col">Curso</th>
                                                <th scope="col">Nome de Usuário</th>
                                                <th scope="col">Nível de Acesso</th>
                                                <th scope="col">Operações</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($users as $user)
                                              <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$user->pessoas->nome}}</td>
                                                <td>{{$user->pessoas->data_nascimento}}</td>
                                                <td>{{$user->cursos ? $user->cursos->curso : null}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->nivel_acesso}}</td>
                                                <td>
                                                    <a href="/instituicaos/users/destroy/{{$user->id}}" class="btn btn-danger btn-sm">Eliminar</a>

                                                </td>
                                              </tr>
                                             @endforeach
                                            </tbody>
                                          </table>
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
