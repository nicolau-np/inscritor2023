@extends('layouts.app')
@section('content')
<div class="content">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">{{Auth::user()->nivel_acesso!='manager' ? Auth::user()->instituicaos->instituicao : 'Principal'}}</h2>
                    <h5 class="text-white op-7 mb-2">INSCRITOR - Sistema de Selecção Automática</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <a href="#" class="btn btn-white btn-border btn-round mr-2">Administração</a>
                    <a href="#" class="btn btn-secondary btn-round">Estudantes</a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img class="d-block w-100 img-slide" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSIbmvzKqtHGyk7pRaPPVrwiemIoadENe3dyru4gfLHOqFoW9TYKiR_KGakskxZJlgib6I&usqp=CAU" alt="First slide">
                              </div>
                              <div class="carousel-item">
                                <img class="d-block w-100 img-slide" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQiwAtJC4JnMg6umirPdgu8Pt8OwSf89BEkIhXloEoE-vuMB_LvjLWlSYKaOVTQvCXY0Jo&usqp=CAU" alt="Second slide">
                              </div>
                              <div class="carousel-item">
                                <img class="d-block w-100 img-slide" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQt_mvNg_r-XMq72cqq4AgZRU5mNqFCk3HKA-v5O2qVXl_go6G9U7HgcneYyZK9YfQ6qlg&usqp=CAU" alt="Third slide">
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

