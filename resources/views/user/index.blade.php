@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">{{ $menu }}</h4>
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
                        <a href="#">{{ $menu }}</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">{{ $submenu }}</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Listar Usuários &nbsp;&nbsp; <a href="/usuarios/create"><i
                                        class="fa fa-plus-circle"></i></a></div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    @include('includes.messages')
                                </div>
                                <div class="col-md-12">

                                    <div class="table-responsive">
                                        <table class="table table-head-bg-primary mt-4">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nome Completo</th>
                                                    <th scope="col">Curso</th>
                                                    <th scope="col">Nome de Usuário</th>
                                                    <th scope="col">E-mail</th>
                                                    <th scope="col">Nível de Acesso</th>
                                                    <th scope="col">Operações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $user->pessoas->nome }}</td>
                                                        <td>{{ $user->cursos ? $user->cursos->curso : null }}</td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->nivel_acesso }}</td>
                                                        <td>
                                                            <a href="/usuarios/reset_passe/{{ $user->id }}"
                                                                class="btn btn-warning btn-sm">Resetar Passe</a>
                                                            &nbsp;
                                                            <a href="/usuarios/destroy/{{ $user->id }}"
                                                                class="btn btn-danger btn-sm">Eliminar</a>
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
                </div>

            </div>
        </div>
    </div>
@endsection
