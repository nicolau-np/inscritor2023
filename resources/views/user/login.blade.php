@extends('layouts.app')
@section('content')
<div class="container">

    <div class="login-form">
      <div class="row">
        <div class="col-md-12 text-center">
          <img src="{{asset('assets/img/logo.svg')}}" alt="navbar brand" class="logo" />
        </div>
        <div class="col-md-12 mt-4">
          <h2>Iniciar Sessão</h2>
        </div>
        <div class="col-md-12">
          <form action="">
            <div class="row">
              <div class="col-md-12 mt-2">
                <input type="text" class="form-control" placeholder="Nome de Usuário"/>
              </div>
              <div class="col-md-12 mt-2">
                <input type="password" class="form-control" placeholder="Palavra-Passe"/>
              </div>
              <div class="col-md-12 mt-2">
                <p>
                  <input type="checkbox" id="remember"/>&nbsp;
                  <label for="remember">Lembrar-me</label>
                </p>
              </div>
              <div class="col-md-12 mt-4">
                <button type="submit" class="btn btn-primary btn-block">Entrar</button>
              </div>
              <div class="col-md-12 mt-2 text-center">
                <p>
                  Esqueceu a Palavra-Passe? <a href="#">Recuperar</a>
                </p>
                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-facebook-f"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-google"></i>
                </button>

                <button type="button" class="btn btn-link btn-floating mx-1">
                  <i class="fab fa-twitter"></i>
                </button>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>


  </div>
  @endsection
