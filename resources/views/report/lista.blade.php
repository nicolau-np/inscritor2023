@php
use App\Http\Controllers\StaticController;

$mes_estensao = StaticController::getMesExtensao(date('m'));
@endphp
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>LISTA DE {{strtoupper($estado)}}</title>

        <style>
        @page{
            font-family: NeutraText-Book !important;
            font-size: 13px;
            line-height: 17.5pt;
        }
        .cabecalho p{
            text-align: center;
        }

        .title{
            text-align: center;
            font-weight: bold;
            font-size: 15px;
        }

        .footer{
            text-align: center;
        }

    </style>
    </head>
    <body>
        <div class="cabecalho">
            <p>
                República de Angola<br/>
                    Direcção Provincial da Educação, Ciência e Tecnologia<br/>
                        {{$ano_lectivo->instituicaos->instituicao}}<br/>
                        </p>
                    </div>

                    <div class="title">
                        <br/><br/>
                        LISTA DE {{strtoupper($estado)}}
                    </div>

                    <div class="subtitle">
                        <b>Curso:</b> {{$curso->curso}}<br/>
                        <b>Classe:</b> {{$classe->classe}}<br/>
                        <b>Ano Lectivo:</b> {{$ano_lectivo->ano}}<br/>
                    </div>

                    <div class="content">
                        <br/>
                        <div class="table">
                            <table width="100%" border="1" cellspacing=0 cellpadding=2 bordercolor="#000">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nome completo</th>
                                        <th>Gênero</th>
                                        <th>Data de Nascimento</th>
                                        <th>Idade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($estudantes as $estudante)
                                    @php
                                        $getPessoaData = StaticController::getPessoaData($estudante->id_pessoa);
                                    @endphp
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$getPessoaData->nome}}</td>
                                        <td>{{$getPessoaData->genero}}</td>
                                        <td>{{date('d-m-Y', strtotime($getPessoaData->data_nascimento))}}</td>
                                        <td>{{$getPessoaData->getIdade($getPessoaData->data_nascimento)}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="footer">
                        <br/><br/>
                        {{$ano_lectivo->instituicaos->municipios->municipio}} aos {{date('d')}} de {{$mes_estensao}} de {{date('Y')}}
                    </div>
                </body>
            </html>
