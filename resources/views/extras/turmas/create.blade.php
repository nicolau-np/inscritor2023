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
                    {{Form::open(['url'=>"/extras/turmas", 'method'=>"post"])}}
                    @csrf
                    <div class="card-header">
                        <div class="card-title">Formulário de Cadastro
                            &nbsp;&nbsp; <a href="/estudantes"><i class="fa
                                    fa-search"></i></a></div>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                @include('includes.messages')
                            </div>

                            <div class="col-md-12">

                                <div class="row">

                                    <div class="col-md-4">
                                        <label for="">Instituição <span
                                                class="text-danger">*</span></label>
                                                {{Form::select('id_instituicao', $instituicaos->pluck('instituicao', 'id'),null, ['placeholder'=>"Instituição", 'class'=>"form-control", 'id'=>"instituicao"])}}
                                        @if ($errors->has('id_instituicao'))
                                        <span class="text-danger">{{ $errors->first('id_instituicao')}}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">Turma </label>
                                        {{Form::text('turma',null, ['placeholder'=>"Turma", 'class'=>"form-control"])}}

                                        @if ($errors->has('turma'))
                                        <span class="text-danger">{{ $errors->first('turma')}}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-5">
                                        <label for="">Curso <span
                                                class="text-danger">*</span></label>
                                        <span id="load-cursos">
                                            {{Form::select('id_curso', [], null,
                                            ['placeholder'=>"Curso",
                                            'class'=>"form-control"])}}
                                        </span>
                                        @if ($errors->has('id_curso'))
                                        <span class="text-danger">{{ $errors->first('id_curso')}}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">Classe <span
                                                class="text-danger">*</span></label>
                                        <span id="load-classes">
                                            {{Form::select('id_classe',[], null,
                                            ['placeholder'=>"Classe",
                                            'class'=>"form-control"])}}
                                        </span>
                                        @if ($errors->has('id_classe'))
                                        <span class="text-danger">{{ $errors->first('id_classe')}}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">Ano Lectivo <span
                                                class="text-danger">*</span></label>
                                        <span id="load-anos">
                                            {{Form::select('id_ano_lectivo',[], null,
                                            ['placeholder'=>"Ano Lectivo",
                                            'class'=>"form-control"])}}
                                        </span>
                                        @if ($errors->has('id_ano_lectivo'))
                                        <span class="text-danger">{{ $errors->first('id_ano_lectivo')}}</span>
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
var instituicao = document.getElementById('instituicao');

instituicao.addEventListener('change', function (e) {
    getCursos(instituicao.value);
   getClasses(instituicao.value);
    getAnos(instituicao.value);
});

function getCursos(instituicao) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
           document.getElementById("load-cursos").innerHTML = this.responseText;
           //console.log(this.responseText);
        }
    };
    xhttp.open("GET", "/request/cursos/all/"+instituicao, true);
    xhttp.send();
    console.log(xhttp);
}

function getClasses(instituicao) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
           document.getElementById("load-classes").innerHTML = this.responseText;
           //console.log(this.responseText);
        }
    };
    xhttp.open("GET", "/request/classes/all/"+instituicao, true);
    xhttp.send();
    console.log(xhttp);
}

function getAnos(instituicao) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
           document.getElementById("load-anos").innerHTML = this.responseText;
           //console.log(this.responseText);
        }
    };
    xhttp.open("GET", "/request/anos/all/"+instituicao, true);
    xhttp.send();
    console.log(xhttp);
}
</script>

</div>

@endsection
