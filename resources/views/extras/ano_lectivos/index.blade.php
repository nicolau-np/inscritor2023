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
                    @include('includes.messages')
                </div>
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
                            <a href="/extras/ano_lectivos/destroy/{{$ano_lectivo->id}}" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
                    </div>
                <div class="paginate">
                    @if ($ano_lectivos->hasPages())
                    <ul class="pagination justify-content-center m-0">
                        @if ($ano_lectivos->onFirstPage())
                            <li class="disabled"><span>
                                    <i class="fa fa-chevron-left"></i> Anterior</span>
                            </li>
                        @else
                            <li> <a href="{{ $ano_lectivos->previousPageUrl() }}" rel="prev"><span>
                                        <i class="fa fa-chevron-left"></i> Anterior</span></a>
                            </li>
                        @endif
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        @if ($ano_lectivos->hasMorePages())
                            <li> <a href="{{ $ano_lectivos->nextPageUrl() }}" rel="next"><span>
                                        Próxima <i class="fa fa-chevron-right"></i></span></a>
                            </li>

                        @else
                            <li class="disabled"><span>
                                    Próxima <i class="fa fa-chevron-right"></i></span>
                            </li>
                        @endif
                    </ul>
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
