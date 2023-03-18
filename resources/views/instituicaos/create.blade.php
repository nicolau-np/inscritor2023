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
                    {{Form::open(['url'=>"instituicaos", 'method'=>"post"])}}
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
                                        <label for="">Instituição <span
                                                class="text-danger">*</span></label>
                                        {{Form::text('instituicao', null,
                                        ['placeholder'=>"Instituição",
                                        'class'=>"form-control"])}}
                                        @if ($errors->has('instituicao'))
                                        <span class="text-danger">{{ $errors->first('instituicao')}}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Província <span
                                                class="text-danger">*</span></label>
                                        {{Form::select('id_provincia',
                                        $provincias->pluck('provincia',
                                        'id'),null, ['placeholder'=>"Província",
                                        'class'=>"form-control", 'id'=>"provincia"])}}
                                        @if ($errors->has('id_provincia'))
                                        <span class="text-danger">{{ $errors->first('id_provincia')}}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">Município <span
                                                class="text-danger">*</span></label>
                                        <span id="load-municipios">
                                            {{Form::select('id_municipio',
                                            [],null, ['placeholder'=>"Município",
                                            'class'=>"form-control"])}}
                                        </span>

                                        @if ($errors->has('id_municipio'))
                                        <span class="text-danger">{{ $errors->first('id_municipio')}}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">Sígla </label>
                                        {{Form::text('sigla', null,
                                        ['placeholder'=>"Sígla",
                                        'class'=>"form-control"])}}
                                        @if ($errors->has('sigla'))
                                        <span class="text-danger">{{ $errors->first('sigla')}}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Endereço <span
                                                class="text-danger">*</span></label>
                                        {{Form::text('endereco', null,
                                        ['placeholder'=>"Endereço", 'class'=>"form-control"])}}
                                        @if ($errors->has('endereco'))
                                        <span class="text-danger">{{ $errors->first('endereco')}}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">Telefone </label>
                                        {{Form::number('telefone', null,
                                        ['placeholder'=>"Telefone", 'class'=>"form-control"])}}
                                        @if ($errors->has('telefone'))
                                        <span class="text-danger">{{ $errors->first('id_classe')}}</span>
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


    <script>
    var provincia = document.getElementById('provincia');

    provincia.addEventListener('change', function (e) {
        makeRequest(provincia.value);
    });

    function makeRequest(prov) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               document.getElementById("load-municipios").innerHTML = this.responseText;
               //console.log(this.responseText);
            }
        };
        xhttp.open("GET", "/municipios/"+prov, true);
        xhttp.send();
        console.log(xhttp);
    }
    </script>
</div>

@endsection
