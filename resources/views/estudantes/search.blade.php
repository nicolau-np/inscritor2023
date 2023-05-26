@extends('layouts.app')
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">{{$menu}}</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#" href="/">
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
                    <div class="card-header">
                        <div class="card-title">Listar Estudantes &nbsp;&nbsp; <a href="/estudantes/"><i
                                    class="fa fa-search"></i></a></div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="table-responsive">
                                    @if($estudantes->count()<=0)
                                    <div class="alert alert-warning">
                                        Nenhum estudante encontrado com o topico {{ strtoupper($search_text) }}
                                    </div>
                                    @else
                                    <div class="alert alert-info">
                                        Pesquisa feita no topico {{ strtoupper($search_text) }}
                                    </div>
                                    <table class="table table-head-bg-primary mt-4">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nº de Insc.</th>
                                                <th scope="col">Nome Completo</th>
                                                <th scope="col">Gênero</th>
                                                <th scope="col">Telefone</th>
                                                <th scope="col">E-mail</th>
                                                <th scope="col">Data de Nascimento</th>
                                                <th scope="col">Curso</th>
                                                <th scope="col">Operações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($estudantes as $estudante)
                                            <tr>
                                                <td>{{ date('Y', strtotime($estudante->created_at)) }}{{ $estudante->id
                                                    }}</td>
                                                <td>{{$estudante->pessoas->nome}}</td>
                                                <td>{{$estudante->pessoas->genero}}</td>
                                                <td>{{$estudante->pessoas->telefone}}</td>
                                                <td>{{$estudante->pessoas->email}}</td>
                                                <td>{{date('d-m-Y', strtotime($estudante->pessoas->data_nascimento))}}
                                                </td>
                                                <td>{{$estudante->cursos->curso}}</td>
                                                <td>
                                                    <a href="/estudantes/edit/{{$estudante->id}}"
                                                        class="btn btn-primary btn-sm">Editar</a>
                                                    &nbsp;
                                                    {{--<a href="/estudantes/destroy/{{$estudante->id}}"
                                                        class="btn btn-danger btn-sm">Eliminar</a>--}}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
