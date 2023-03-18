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
              <div class="card-title">Listar Condições &nbsp;&nbsp; <a
                  href="/extras/condicaos/create"><i class="fa fa-plus-circle"></i></a></div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">

                    <div class="table-responsive">
                        <table class="table table-head-bg-primary mt-4">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Instituição</th>
                        <th scope="col">Ano Lectivo</th>
                        <th scope="col">Data de Início</th>
                        <th scope="col">Data de Fim</th>
                        <th scope="col">Operações</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($condicaos as $condicao)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$condicao->instituicaos->instituicao}}</td>
                        <td>{{$condicao->ano_lectivos->ano}}</td>

                        <td>{{$condicao->data_inicio}}</td>
                        <td>{{$condicao->data_fim}}</td>
                        <td>
                            <a href="/extras/condicaos/edit/{{$condicao->id}}" class="btn btn-primary btn-sm">Editar</a>
                            &nbsp;
                            {{--<a href="/estudantes/destroy/{{$estudante->id}}" class="btn btn-danger btn-sm">Eliminar</a>--}}
                        </td>
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
                    </div>
                <div class="paginate">
                {{$condicaos->links()}}
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
