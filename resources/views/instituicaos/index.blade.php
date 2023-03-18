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
              <div class="card-title">Listar Instituição &nbsp;&nbsp; <a
                  href="/instituicaos/create"><i class="fa fa-plus-circle"></i></a></div>
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
                        <th scope="col">Município</th>
                        <th scope="col">Sígla</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Operações</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($instituicaos as $instituicao)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$instituicao->instituicao}}</td>
                        <td>{{$instituicao->municipios->municipio}}</td>
                        <td>{{$instituicao->sigla}}</td>
                        <td>{{$instituicao->endereco}}</td>
                        <td>{{$instituicao->telefone}}</td>
                        <td>
                            <a href="/instituicaos/edit/{{$instituicao->id}}" class="btn btn-primary btn-sm">Editar</a>
                            &nbsp;
                            <a href="/instituicaos/users/{{$instituicao->id}}" class="btn btn-warning btn-sm">User</a>
                        </td>
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
                    </div>
<div class="paginate">
{{$instituicaos->links()}}
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
