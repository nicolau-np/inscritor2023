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
              <div class="card-title">Listar Ano Lectivos &nbsp;&nbsp; <a
                  href="/extras/ano_lectivos/create"><i class="fa fa-plus-circle"></i></a></div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">

                    <div class="table-responsive">
                        <table class="table table-head-bg-primary mt-4">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ano Lectivo</th>
                        <th scope="col">Instituição</th>
                        <th scope="col">Operações</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($ano_lectivos as $ano_lectivo)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$ano_lectivo->ano}}</td>
                        <td>{{$ano_lectivo->instituicaos->instituicao}}</td>
                        <td>
                            <a href="/extras/ano_lectivos/edit/{{$ano_lectivo->id}}" class="btn btn-primary btn-sm">Editar</a>
                            &nbsp;
                            {{--<a href="/estudantes/destroy/{{$estudante->id}}" class="btn btn-danger btn-sm">Eliminar</a>--}}
                        </td>
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
                    </div>
                <div class="paginate">
                {{$ano_lectivos->links()}}
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
