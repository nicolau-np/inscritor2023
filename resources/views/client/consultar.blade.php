@extends('layouts.app-cliente')
@section('content')
<!-- ======= About Section ======= -->
<section id="consultar" class="consultar">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Consultar</h2>
        <p>Consultar</p>
      </div>

      <div class="row">
        <div class="col-md-12">
            {{ Form::open(['url'=>"/consultar", 'method'=>"post"]) }}
            @csrf
            <div class="row">
                <div class="col-md-5">
                    {{ Form::number('numero_inscricao', null, ['placeholder'=>"Nº de Inscrição", 'class'=>"form-control"]) }}
                </div>
                <div class="col-md-4">
                    {{ Form::submit('Pesquisar', ['class'=>"btn btn-primary"]) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>

      </div>

      <div class="row">
        <div class="col-md-12">
            @include('includes.messages')
        </div>
        @if($estudante!="no")
            <div class="col-md-5">
                <div class="card mt-4">
                    <div class="card-body">
                        <div class="perfil" style="padding:8px;">
                            <span style="font-weight:bold;">Nº de Inscrição: {{ $inscricao }}</span><br/>
                            <span style="font-weight:bold;">Instituição:</span> {{ $estudante->instituicaos->instituicao }}<br/>
                            <span style="font-weight:bold;">Nome Completo:</span> {{ $estudante->pessoas->nome ?? null }}<br/>
                            <span style="font-weight:bold;">Nº de Bilhete:</span> {{ $estudante->pessoas->bilhete ?? null }}<br/>
                            <span style="font-weight:bold;">Curso:</span> {{ $estudante->cursos->curso }}<br/>

                        </div>
                    </div>
                    @if($classificador!="no")
                    <div class="card-footer">
                        @if($estudante->pessoas->data_nascimento < $classificador->data_inicio)
                        <div class="alert alert-danger">Não Admitido</div>
                        @elseif($estudante->pessoas->data_nascimento >= $classificador->data_inicio && $estudante->pessoas->data_nascimento <= $classificador->data_fim)
                        <div class="alert alert-success">Admitido</div>
                        @endif
                    </div>
                    @else
                    <div class="alert alert-info">Consulta Indisponível de momento. Code: 0102</div>
                    @endif
                </div>

            </div>
        @endif
      </div>

    </div>
  </section><!-- End About Section -->

@endsection
