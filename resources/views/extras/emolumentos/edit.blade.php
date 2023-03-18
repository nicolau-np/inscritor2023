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
                    {{Form::open(['url'=>"extras/emolumentos/{$emolumento->id}", 'method'=>"put"])}}
                    @csrf
                    <div class="card-header">
                        <div class="card-title">Formulário de Cadastro
                            &nbsp;&nbsp; <a href="/extras/emolumentos"><i class="fa
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
                                                {{Form::select('id_instituicao', $instituicaos->pluck('instituicao', 'id'),$emolumento->id_instituicao, ['placeholder'=>"Instituição", 'class'=>"form-control", 'id'=>"instituicao"])}}
                                        @if ($errors->has('id_instituicao'))
                                        <span class="text-danger">{{ $errors->first('id_instituicao')}}</span>
                                        @endif
                                    </div>



                                    <div class="col-md-4">
                                        <label for="">Emolumento <span
                                                class="text-danger">*</span></label>
                                        {{Form::text('emolumento', $emolumento->emolumento,
                                        ['placeholder'=>"Emolumento",
                                        'class'=>"form-control"])}}
                                        @if ($errors->has('emolumento'))
                                        <span class="text-danger">{{ $errors->first('emolumento')}}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Valor <span
                                                class="text-danger">*</span></label>
                                        {{Form::number('valor', $emolumento->valor,
                                        ['placeholder'=>"Valor",
                                        'class'=>"form-control"])}}
                                        @if ($errors->has('valor'))
                                        <span class="text-danger">{{ $errors->first('valor')}}</span>
                                        @endif
                                    </div>


                                    <div class="col-md-3">
                                        <label for="">Ano Lectivo <span
                                                class="text-danger">*</span></label>
                                        <span id="load-anos">
                                            {{Form::select('id_ano_lectivo',$ano_lectivos->pluck('ano', 'id'), $emolumento->id_ano_lectivo,
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
