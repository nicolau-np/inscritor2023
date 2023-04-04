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
              <div class="card-title">Listar Estudantes &nbsp;&nbsp; <a
                  href="/estudantes/create"><i class="fa fa-plus-circle"></i></a></div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">

                    <div class="table-responsive">
                        <table class="table table-head-bg-primary mt-4">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome Completo</th>
                        <th scope="col">Gênero</th>
                        <th scope="col">Data de Nascimento</th>
                        <th scope="col">Curso</th>
                        <th scope="col">Ano Lectivo</th>
                        <th scope="col">Data de Inscrição</th>
                        <th scope="col">Operações</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($estudantes as $estudante)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$estudante->pessoas->nome}}</td>
                        <td>{{$estudante->pessoas->genero}}</td>
                        <td>{{date('d-m-Y', strtotime($estudante->pessoas->data_nascimento))}}</td>
                        <td>{{$estudante->cursos->curso}}</td>
                        <td>{{$estudante->ano_lectivos->ano}}</td>
                        <td>{{date('d-m-Y', strtotime($estudante->created_at))}}</td>
                        <td>
                            <a href="/estudantes/edit/{{$estudante->id}}" class="btn btn-primary btn-sm">Editar</a>
                            &nbsp;
                            {{--<a href="/estudantes/destroy/{{$estudante->id}}" class="btn btn-danger btn-sm">Eliminar</a>--}}
                        </td>
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
                    </div>
                    <div class="paginate">
                        @if ($estudantes->hasPages())
                        <ul class="pagination justify-content-center m-0">
                            @if ($estudantes->onFirstPage())
                                <li class="disabled"><span>
                                        <i class="fa fa-chevron-left"></i> Anterior</span>
                                </li>
                            @else
                                <li> <a href="{{ $estudantes->previousPageUrl() }}" rel="prev"><span>
                                            <i class="fa fa-chevron-left"></i> Anterior</span></a>
                                </li>
                            @endif
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            &nbsp;
                            @if ($estudantes->hasMorePages())
                                <li> <a href="{{ $estudantes->nextPageUrl() }}" rel="next"><span>
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
