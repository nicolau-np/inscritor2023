<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>{{$title}}</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<!-- Favicons -->
    <link href="{{asset('assets/neutro/images/logo.png')}}" rel="icon">
    <link href="{{asset('assets/neutro/images/logo.png')}}" rel="apple-touch-icon">

    <link rel="stylesheet" href="{{asset('assets/neutro/css/style.css')}}">
	<!-- Fonts and icons -->
	<script src="{{asset('assets/js/plugin/webfont/webfont.min.js')}}"></script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/atlantis.min.css')}}">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{asset('assets/css/demo.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    @if($type=="login")
    @yield('content')
    @else
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">

				<a href="/home" class="logo">
                    <h3 style="margin-top:18px; color: #fff; font-weight:bold;">INSCRITOR</h2>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

				<div class="container-fluid">
					<div class="collapse" id="search-nav">
                        {{ Form::open(['method'=>"post", 'url'=>"/estudantes/search", 'class'=>"navbar-left navbar-form nav-search mr-md-3"]) }}
						    <div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
                                {{ Form::text('search_text', null, ['class'=>"form-control", 'placeholder'=>"Pesquisar como Nome ou Nº de Bilhete"]) }}
							</div>
						{{ Form::close() }}
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-envelope"></i>
							</a>
							<ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
								<li>
									<div class="dropdown-title d-flex justify-content-between align-items-center">
										Mensagens
										<a href="#" class="small">Marcar todas como lida</a>
									</div>
								</li>
								<li>
									<div class="message-notif-scroll scrollbar-outer">
										<div class="notif-center">

										</div>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">Ver todas mensagens<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								<span class="notification">0</span>
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="dropdown-title">Você tem 0 notificações</div>
								</li>
								<li>
									<div class="notif-scroll scrollbar-outer">
										<div class="notif-center">

										</div>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);">Ver todas notificações<i class="fa fa-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
								<i class="fas fa-layer-group"></i>
							</a>

						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
									<img src="
                                    @if(Auth::user()->pessoas->foto)
                                    {{asset('users/'.Auth::user()->pessoas->foto)}}
                                    @else
                                    {{asset('assets/neutro/images/no-photo.png')}}
                                    @endif
                                    " alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="
                                                @if(Auth::user()->pessoas->foto)
                                                {{asset('users/'.Auth::user()->pessoas->foto)}}
                                                @else
                                                {{asset('assets/neutro/images/no-photo.png')}}
                                                @endif
                                                " alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4>{{Auth::user()->pessoas->nome}}</h4>
												<p class="text-muted">{{Auth::user()->name}}</p><a href="/user/profile" class="btn btn-xs btn-secondary btn-sm">Ver Perfil</a>
											</div>
										</div>
									</li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="/user/profile">Meu Perfil</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="/user/logout">Terminar
                                          Sessão</a>
                                      </li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="
                                    @if(Auth::user()->pessoas->foto)
                                    {{asset('users/'.Auth::user()->pessoas->foto)}}
                                    @else
                                    {{asset('assets/neutro/images/no-photo.png')}}
                                    @endif
                            " alt="..." class="avatar-img rounded-circle">
						</div>
                        <div class="info">
                            <a data-toggle="collapse" href="#collapseExample"
                              aria-expanded="true">
                              <span>
                                {{Auth::user()->pessoas->nome}}
                                <span class="user-level">{{Auth::user()->nivel_acesso}}</span>
                                <span class="caret"></span>
                              </span>
                            </a>
                            <div class="clearfix"></div>

                            <div class="collapse in" id="collapseExample">
                              <ul class="nav">
                                <li>
                                  <a href="/user/profile">
                                    <span class="link-collapse">Meu Perfil</span>
                                  </a>
                                </li>
                                <li>
                                  <a href="/user/edit">
                                    <span class="link-collapse">Editar Perfil</span>
                                  </a>
                                </li>
                                
                              </ul>
                            </div>
                          </div>
					</div>
					<ul class="nav nav-primary">
                        <li class="nav-item {{$type=='home'?'active':''}}">
                          <a href="/home">
                            <i class="fas fa-home"></i>
                            <p>Principal</p>
                          </a>
                        </li>

                        @if(Auth::user()->nivel_acesso=='user')
                        <li class="nav-item {{$type=='estudantes'?'active':''}}">
                          <a href="/estudantes/create">
                            <i class="fas fa-users"></i>
                            <p>Estudantes</p>
                          </a>
                        </li>
                        @endif

                        @if(Auth::user()->nivel_acesso=='admin')

                        <li class="nav-item {{$type=='users'?'active':null}}">
                            <a href="/usuarios">
                              <i class="fas fa-users"></i>
                              <p>Usuários</p>
                            </a>
                          </li>

                        <li class="nav-item {{$type=='encerramento'?'active':null}}">
                            <a href="/encerramento_actividades">
                              <i class="fas fa-refresh"></i>
                              <p>Encerramento</p>
                            </a>
                          </li>


                           <li class="nav-item {{$type=='listas'?'active':null}}">
                            <a href="/listas">
                              <i class="fas fa-th-list"></i>
                              <p>Listas</p>
                            </a>
                          </li>

                        <li class="nav-item {{$type=='balancos'?'active':null}}">
                            <a href="/balancos">
                              <i class="fas fa-balance-scale"></i>
                              <p>Balanços</p>
                            </a>
                          </li>
                        @endif

                        @if(Auth::user()->nivel_acesso=='manager')
                        <li class="nav-item {{$type=='extras'?'active submenu':null}}">
                          <a data-toggle="collapse" href="#base">
                            <i class="fas fa-cogs"></i>
                            <p>Extras</p>
                            <span class="caret"></span>
                          </a>
                          <div class="collapse {{$type=='extras'?'show':null}}" id="base">
                            <ul class="nav nav-collapse">
                              <li class="{{$menu=='Cursos'?'active':null}}">
                                <a href="/extras/cursos">
                                  <span class="sub-item">Cursos</span>
                                </a>
                              </li>
                              <li class="{{$menu=='Classes'?'active':null}}">
                                <a href="/extras/classes">
                                  <span class="sub-item">Classes</span>
                                </a>
                              </li>
                              <li class="{{$menu=='Turmas'?'active':null}}">
                                <a href="/extras/turmas">
                                  <span class="sub-item">Turmas</span>
                                </a>
                              </li>
                              <li class="{{$menu=='Condições'?'active':null}}">
                                <a href="/extras/condicaos">
                                  <span class="sub-item">Condições</span>
                                </a>
                              </li>
                              <li class="{{$menu=='Emolumentos'?'active':null}}">
                                <a href="/extras/emolumentos">
                                  <span class="sub-item">Emolumentos</span>
                                </a>
                              </li>
                              <li class="{{$menu=='Ano Lectivo'?'active':null}}">
                                <a href="/extras/ano_lectivos">
                                  <span class="sub-item">Ano Lectivo</span>
                                </a>
                              </li>
                            </ul>
                          </div>
                        </li>

                        <li class="nav-item {{$type=='instituicaos'?'active':null}}">
                          <a href="/instituicaos">
                            <i class="fas fa-desktop"></i>
                            <p>Instituições</p>
                          </a>
                        </li>
                        @endif

                        <li class="nav-item">
                          <a data-toggle="collapse" href="#sidebarSobre">
                            <i class="fas fa-file"></i>
                            <p>Sobre</p>
                            <span class="caret"></span>
                          </a>
                          <div class="collapse" id="sidebarSobre">
                            <ul class="nav nav-collapse">
                              <li>
                                <a href="sidebar-style-1.html">
                                  <span class="sub-item">Sistema</span>
                                </a>
                              </li>
                              <li>
                                <a href="overlay-sidebar.html">
                                  <span class="sub-item">FAQ's</span>
                                </a>
                              </li>
                            </ul>
                          </div>
                        </li>

                        <li class="mx-4 mt-2">
                          <a href="http://themekita.com/atlantis-bootstrap-dashboard.html"
                            class="btn btn-primary btn-block"><span class="btn-label mr-2"> <i
                                class="fa fa-heart"></i> </span>Buy Pro</a>
                        </li>
                      </ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			@yield('content')
            <footer class="footer">
                <div class="container-fluid">
                  <nav class="pull-left">
                    <ul class="nav">
                      <li class="nav-item">
                        <a class="nav-link" routerLink="/">
                          INSCRITOR
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">
                          Ajuda
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">
                          Licença
                        </a>
                      </li>
                    </ul>
                  </nav>
                  <div class="copyright ml-auto">
                   &copy; {{date('Y')}}<!--, powered <i class="fa fa-heart heart text-danger"></i> by <a href="#">Nicolau NP</a>-->
                  </div>
                </div>
              </footer>
		</div>


	</div>
    @endif
	<!--   Core JS Files   -->
	<script src="{{asset('assets/js/core/jquery.3.2.1.min.js')}}"></script>
	<script src="{{asset('assets/js/core/popper.min.js')}}"></script>
	<script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>

	<!-- jQuery UI -->
	<script src="{{asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

	<!-- Atlantis JS -->
	<script src="{{asset('assets/js/atlantis.min.js')}}"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="{{asset('assets/js/setting-demo.js')}}"></script>
	<script src="{{asset('assets/js/demo.js')}}"></script>
	<script>
		Circles.create({
			id:'circles-1',
			radius:45,
			value:60,
			maxValue:100,
			width:7,
			text: 5,
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-2',
			radius:45,
			value:70,
			maxValue:100,
			width:7,
			text: 36,
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-3',
			radius:45,
			value:40,
			maxValue:100,
			width:7,
			text: 12,
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

		var mytotalIncomeChart = new Chart(totalIncomeChart, {
			type: 'bar',
			data: {
				labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
				datasets : [{
					label: "Total Income",
					backgroundColor: '#ff9e27',
					borderColor: 'rgb(23, 125, 255)',
					data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false,
				},
				scales: {
					yAxes: [{
						ticks: {
							display: false //this will remove only the label
						},
						gridLines : {
							drawBorder: false,
							display : false
						}
					}],
					xAxes : [ {
						gridLines : {
							drawBorder: false,
							display : false
						}
					}]
				},
			}
		});

		$('#lineChart').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});
	</script>
</body>
</html>
