<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{$title}}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('assets/client/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/client/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/client/vendor/animate.css')}}/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/client/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('assets/client/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/client/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/client/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/client/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/client/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/client/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/client/css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Multi - v4.3.0
  * Template URL: https://bootstrapmade.com/multi-responsive-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="/">Inscritor</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="{{asset('assets/client/img/logo.png')}}" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Principal</a></li>
                    <li><a class="nav-link scrollto" href="#about">Sobre</a></li>
                    <li><a class="nav-link scrollto" href="#faq">F.A.Q</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contactos</a></li>
                    <li><a class="getstarted scrollto" href="#">Consultar</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                <!-- Slide 1 -->
                <div class="carousel-item active"
                    style="background-image: url({{asset('assets/client/img/slide/slide02.png')}})">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">Bem-vindo ao <span>Inscritor</span></h2>
                            <p class="animate__animated animate__fadeInUp">Sistema de Seleção Automática de candidatos
                                inscritos.</p>
                            <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Ler
                                Mais</a>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item"
                    style="background-image: url({{asset('assets/client/img/slide/slide01.jpg')}})">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">Balanços e Estatísticas Diárias</h2>
                            <p class="animate__animated animate__fadeInUp">O sistema gera balanços e estatísticas
                                diárias de inscritos por período de tempo.</p>
                            <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Ler
                                Mais</a>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item"
                    style="background-image: url({{asset('assets/client/img/slide/slide03.webp')}})">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">Listas Nominais de Candidatos</h2>
                            <p class="animate__animated animate__fadeInUp">O sistema gera listas nominais de candidatos
                                admitidos e não admitidos.</p>
                            <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Ler
                                Mais</a>
                        </div>
                    </div>
                </div>

            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>
    </section><!-- End Hero -->

    <main id="main">

        @yield('content')

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">
                            <h3>INSCRITOR</h3>
                            <p class="pb-3"><em>Sistema de Selecção automática, estatísticas e balanços</em></p>
                            <p>
                                Moçamedes <br>
                                Namibe, Angola<br><br>
                                <strong>Telefone:</strong> +244 946 216 795<br>
                                <strong>Email:</strong> nic340k@gmail.com<br>
                            </p>
                            <div class="social-links mt-3">
                                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Links de Acesso</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Principal</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Sobre</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="/home">Iniciar Sessão</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Serviços</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Desenvolvimento Web</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Design Gráfico</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Subscrição</h4>
                        <p>Faça a sua subscrição e receba novidades dos nossos produtos e serviços.</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscrever">
                        </form>

                    </div>

                </div>
            </div>
        </div>


        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Inscritor</span></strong>. Todos os direitos Reservados
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/multi-responsive-bootstrap-template/ -->
                Powered by <a href="https://bootstrapmade.com/">html</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('assets/client/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('assets/client/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/client/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets/client/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/client/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('assets/client/vendor/purecounter/purecounter.js')}}"></script>
    <script src="{{asset('assets/client/vendor/swiper/swiper-bundle.min.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('assets/client/js/main.js')}}"></script>

</body>

</html>
