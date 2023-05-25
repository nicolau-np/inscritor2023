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
                    {{Form::open(['url'=>"extras/condicaos", 'method'=>"post"])}}
                    @csrf
                    <div class="card-header">
                        <div class="card-title">Formulário de Cadastro
                            &nbsp;&nbsp; <a href="/extras/condicaos"><i class="fa
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


                                    <div class="col-md-4">
                                        <label for="">Curso <span
                                                class="text-danger">*</span></label>
                                        {{Form::select('id_curso', $cursos->pluck('curso', 'id'), null,
                                        ['placeholder'=>"Curso",
                                        'class'=>"form-control"])}}
                                        @if ($errors->has('id_curso'))
                                        <span class="text-danger">{{ $errors->first('id_curso')}}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Classe <span
                                                class="text-danger">*</span></label>
                                        {{Form::select('id_classe', $classes->pluck('classe', 'id'),null,
                                        ['placeholder'=>"Classe",
                                        'class'=>"form-control"])}}
                                        @if ($errors->has('id_classe'))
                                        <span class="text-danger">{{ $errors->first('id_classe')}}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Data de Início <span
                                                class="text-danger">*</span></label>
                                        {{Form::date('data_inicio', null,
                                        ['placeholder'=>"Data de Início",
                                        'class'=>"form-control"])}}
                                        @if ($errors->has('data_inicio'))
                                        <span class="text-danger">{{ $errors->first('data_inicio')}}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Data de Fim <span
                                                class="text-danger">*</span></label>
                                        {{Form::date('data_fim', null,
                                        ['placeholder'=>"Data de Fim",
                                        'class'=>"form-control"])}}
                                        @if ($errors->has('data_fim'))
                                        <span class="text-danger">{{ $errors->first('data_fim')}}</span>
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

                                    <div class="col-md-3">
                                        <label for="">Estado <span
                                                class="text-danger">*</span></label>
                                            {{Form::select('estado',[
                                                'on'=>"on",
                                                'off'=>"off"
                                            ], null,
                                            ['placeholder'=>"Estado",
                                            'class'=>"form-control"])}}

                                        @if ($errors->has('estado'))
                                        <span class="text-danger">{{ $errors->first('estado')}}</span>
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

    getAnos(instituicao.value);
});

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
