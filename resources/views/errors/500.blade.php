<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Servidor Parou</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{asset('assets/img/icon.ico')}}" type="image/x-icon"/>
    <link rel="stylesheet" href="{{asset('assets/neutro/css/style.css')}}">
	<!-- Fonts and icons -->
	<script src="{{asset('assets/js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/atlantis.min.css')}}">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{asset('assets/css/demo.css')}}">

    @livewireStyles
    @livewireScripts
</head>
<body>
<div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <img src="{{asset('assets/img/icon.ico')}}" alt="navbar brand" />
      </div>
      <div class="col-md-12 text-center">
        <p class="title">Erro 500</p>
        <h1>Oops! Servidor não Responde.</h1>
        <p>Entra em contacto com o seu Provedor.</p>
        <a href="/" class="btn btn-primary">Página Principal</a>
      </div>
    </div>
  </div>
</body>
</html>
