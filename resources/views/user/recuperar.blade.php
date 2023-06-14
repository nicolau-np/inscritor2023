@extends('layouts.app')
@section('content')
<div class="container">

    <div class="login-form">
      <div class="row">
        <div class="col-md-12 text-center">
          <img src="{{asset('assets/neutro/images/logo.png')}}" alt="navbar brand" class="logo mt-2" />
        </div>
        <div class="col-md-12 mt-4">
          <h2>Recuperar Palavra-Passe</h2>
        </div>
        <div class="col-md-12">
            @include('includes.messages')
        </div>
        <div class="col-md-12">
          <form action="/user/recuperar" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-12 mt-2">
                <input type="text" class="form-control" placeholder="Introduza o seu E-mail" name="email"/>
                @if ($errors->has('email'))
                 <span class="text-danger">{{ $errors->first('email')}}</span>
                @endif
              </div>

              <div class="col-md-12 mt-4">
                <button type="submit" class="btn btn-primary btn-block">Recuperar</button>
              </div>
              <div class="col-md-12 mt-2 text-center">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>


  </div>
  @endsection
