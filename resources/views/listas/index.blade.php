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
                    {{Form::open(['url'=>"listas", 'method'=>"post"])}}
                    @csrf
                    <div class="card-header">
                        <div class="card-title">
                            &nbsp;&nbsp; <a href="/balancos"><i class="fa
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
                                        <label for="">Curso <span class="text-danger">*</span></label>
                                        {{Form::select('id_curso',$cursos->pluck('curso', 'id'), null, ['class'=>"form-control", 'placeholder'=>"Curso"])}}
                                        @if ($errors->has('id_curso'))
                                        <span class="text-danger">{{ $errors->first('id_curso')}}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-2">
                                        <label for="">Classe <span class="text-danger">*</span></label>
                                        {{Form::select('id_classe',$classes->pluck('classe', 'id'), $classes->get()->first()->id, ['class'=>"form-control", 'placeholder'=>"Classe"])}}
                                        @if ($errors->has('id_classe'))
                                        <span class="text-danger">{{ $errors->first('id_classe')}}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-2">
                                        <label for="">Estado <span class="text-danger">*</span></label>
                                        {{Form::select('estado',[
                                            'Admitidos'=>"Admitidos",
                                            'N/Admitidos'=>"N/Admitidos",
                                        ], null, ['class'=>"form-control", 'placeholder'=>"Estado"])}}
                                        @if ($errors->has('estado'))
                                        <span class="text-danger">{{ $errors->first('estado')}}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-2">
                                        <label for="">Ano Lectivo <span class="text-danger">*</span></label>
                                        {{Form::select('id_ano_lectivo', $ano_lectivos->pluck('ano', 'id'), $ano_lectivos->get()->first()->id, ['class'=>"form-control", 'placeholder'=>"Ano Lectivo"])}}
                                        @if ($errors->has('id_ano_lectivo'))
                                        <span class="text-danger">{{ $errors->first('id_ano_lectivo')}}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-2">
                                        <label for="">Tipo <span class="text-danger">*</span></label>
                                        {{Form::select('tipo',[
                                            'PDF'=>"PDF",
                                            'Excel'=>"Excel",
                                        ], "PDF", ['class'=>"form-control", 'placeholder'=>"Tipo"])}}
                                        @if ($errors->has('tipo'))
                                        <span class="text-danger">{{ $errors->first('tipo')}}</span>
                                        @endif
                                    </div>

                                    <div class="col-md-1 mt-4">
                                        <button class="btn btn-primary btn-sm" type="submit"><i class="fas fa-search"></i> Pesquisar</button>

                                    </div>


                                </div>



                            </div>
                        </div>
                    </div>
                    <div class="card-action">

                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
