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
        @if($estudante!="no")
            <div class="col-md-12">
                {{ $estudante }}
            </div>
        @endif
      </div>

    </div>
  </section><!-- End About Section -->

@endsection
