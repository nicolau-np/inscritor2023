@php
use App\Http\Controllers\StaticController;
@endphp
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
                <div class="table-responsive">
                    <table class="table table-head-bg-primary table-bordered">
                        <thead>
                            <tr>
                                <th rowspan="2">CURSO</th>
                                @for($i=13; $i<=16; $i++)
                                <th colspan="2">{{$i}} ANOS</th>
                                @endfor
                                <th colspan="2">+17 ANOS</th>
                                <th colspan="2">TOTAL</th>
                            </tr>
                            <tr>
                                @for($i=13; $i<=16; $i++)
                                <th>F</th>
                                <th>MF</th>
                                @endfor
                                <th>F</th>
                                <th>MF</th>
                                <th>F</th>
                                <th>MF</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $data=[
                                'estudante_f'=>null,
                                'estudante_mf'=>null,
                                'estudante_idade_f'=>null,
                                'estudante_idade_mf'=>null,
                            ];
                            @endphp

                            @foreach($cursos->get() as $curso)
                            @php
                            $data['estudante_f'] = StaticController::countEstudantes($curso->id, $curso->id_instituicao, $ano_lectivo->id, null, null);
                            $data['estudante_mf'] = StaticController::countEstudantes($curso->id, $curso->id_instituicao, $ano_lectivo->id, null, 'F');


                            @endphp

                            <tr>
                                <td>{{$curso->curso}}</td>
                                @for($i=13; $i<=16; $i++)
                                <td></td>
                                <td></td>
                                @endfor
                                <td></td>
                                <td></td>
                                <td>{{$data['estudante_mf']->count()}}</td>
                                <td>{{$data['estudante_f']->count()}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
