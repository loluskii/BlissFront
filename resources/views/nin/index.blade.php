
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>BLISSITECH HUB</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ secure_asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ secure_asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center ">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="logo">
                <a href="{{ route('home') }}"><img src="{{ secure_asset('logo.png') }}" style="height: 100px" alt=""
                        class="my-2 img-fluid"></a>
            </div>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto " href="{{ route('home') }}">Home</a></li>
                    <li><a class="nav-link scrollto active" href="{{ route('nin.apply') }}">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>

        </div>
    </header>

    {{-- <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
        <div id="heroCarousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">Welcome to <span>BLISSITECH HUB</span></h2>
                    <p class="animate__animated fanimate__adeInUp">We are an innovative agency tasked with creating
                        simple solutions fo complex needs for Africans in Diaspora
                    </p>
                    <a href="#services" class="btn-get-started animate__animated animate__fadeInUp scrollto">Services
                    </a>
                </div>
            </div>
        </div>
        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
            viewBox="0 24 150 28 " preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
            </g>
            <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
            </g>
        </svg>
    </section> --}}

    <main id="main" style="margin-top: 100px">
        <div class="container">
            <div class="address mb-4">
                {{-- <i class="bi bi-geo-alt"></i> --}}
                <h4>Location:</h4>
                <p class="mb-2"><b>London:</b> Golden Cross House, 8 Duncannon Street London, Greater
                    London, WC2N 4JF United Kingdom. Phone: <a href="tel:+07306399602">07306399602</a></p>
                <p class="mb-2"><b>Birmingham City:</b> Jennies Cash n Carry, 195 Newton Row Moorsom Street, B6
                    4NT, London. <br> Phone: <a href="tel:+07493133871">07493133871</a></p>
                <p><b>Glasgow City: </b>100 West George Street G2 1PP <br> Phone: <a href="tel:+07470334864">07470334864</a></p>
                <br>
                <p>You can call us or send a message on Whatsapp and we'll get back to you soon</p>
            </div>
        </div>

    </main>

    <a href="#" class="back-to-top d-flex bg-secondary align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    @include('layouts.partials.footer_scripts')
    <script src="{{ secure_asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ secure_asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ secure_asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ secure_asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ secure_asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script>
        $('.alert').hide();
    </script>


</body>
