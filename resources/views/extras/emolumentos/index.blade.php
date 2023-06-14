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
              <div class="card-title">Listar Emolumentos &nbsp;&nbsp; <a
                  href="/extras/emolumentos/create"><i class="fa fa-plus-circle"></i></a></div>
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
                        <th scope="col">Emolumento</th>
                        <th scope="col">Instituição</th>
                        <th scope="col">Curso</th>
                        <th scope="col">Classe</th>
                        <th scope="col">Ano Lectivo</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Operações</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($emolumentos as $emolumento)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$emolumento->emolumento}}</td>
                        <td>{{$emolumento->instituicaos->instituicao}}</td>
                        <td>{{$emolumento->cursos->curso ?? null}}</td>
                        <td>{{$emolumento->classes->classe ?? null}}</td>
                        <td>{{$emolumento->ano_lectivos->ano}}</td>
                        <td>{{number_format($emolumento->valor,2,',','.')}}</td>
                        <td>
                            <a href="/extras/emolumentos/edit/{{$emolumento->id}}" class="btn btn-primary btn-sm">Editar</a>
                            &nbsp;
                            <a href="/extras/emolumentos/destroy/{{$emolumento->id}}" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
                    </div>
                <div class="paginate">
                    @if ($emolumentos->hasPages())
                    <ul class="pagination justify-content-center m-0">
                        @if ($emolumentos->onFirstPage())
                            <li class="disabled"><span>
                                    <i class="fa fa-chevron-left"></i> Anterior</span>
                            </li>
                        @else
                            <li> <a href="{{ $emolumentos->previousPageUrl() }}" rel="prev"><span>
                                        <i class="fa fa-chevron-left"></i> Anterior</span></a>
                            </li>
                        @endif
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        &nbsp;
                        @if ($emolumentos->hasMorePages())
                            <li> <a href="{{ $emolumentos->nextPageUrl() }}" rel="next"><span>
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
