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
                                @for($i=13; $i<=17; $i++)
                                <th colspan="2">{{$i}} ANOS</th>
                                @endfor
                                <th colspan="2">TOTAL</th>
                            </tr>
                            <tr>
                                @for($i=13; $i<=17; $i++)
                                <th>F</th>
                                <th>MF</th>
                                @endfor
                                <th>F</th>
                                <th>MF</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cursos->get() as $curso)
                            <tr>
                                <td>{{$curso->curso}}</td>
                                @for($i=13; $i<=17; $i++)
                                <td></td>
                                <td></td>
                                @endfor
                                <td></td>
                                <td>{{$estudantes->where('id_curso', $curso->id)->count()}}</td>
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
