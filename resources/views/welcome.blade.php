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
    <header id="header" class="fixed-top d-flex align-items-center  header-transparent ">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                {{-- <h1><a href="index.html">BLISSITECH HUB</a></h1> --}}
                <!-- Uncomment below if you prefer to use an image logo -->
                <a href="{{ route('home') }}"><img src="{{ secure_asset('logo.png') }}" style="height: 100px" alt=""
                        class="my-2 img-fluid"></a>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <!-- <li><a class="nav-link scrollto" href="#pricing">Pricing</a></li> -->
                    <!-- <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
                    <li><a class="nav-link scrollto" href="{{ route('nin.apply') }}">Book an Appointment</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-end align-items-center">
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

            <!-- Slide 2 -->


            <!-- <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
      </a> -->

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

    </section><!-- End Hero -->

    <main id="main">
        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">
                    <h2>Services</h2>
                    <p>What we do offer</p>
                </div>

                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="icon-box" data-aos="zoom-in-left">
                            <h4 class="title"><a href="">Bliss Subscription</a></h4>
                            <small>Subscription 📦 errand services built for Africans in Diaspora. Personalize your
                                shopping experience from Buying groceries and setting up pocket money plan for love once
                                anywhere in Nigeria 🇳🇬 & Ghana 🇬🇭</small>
                            <div class="d-flex justify-content-between">
                                <img src="{{ asset('app-store-icon-png-14.png') }}" style="height: 40px"
                                    class="img-fluid mt-3" alt="" srcset="">
                                <img src="{{ asset('images.png') }}" style="height: 40px" class="img-fluid mt-3" alt=""
                                    srcset="">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
                        <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="100">
                            <h4 class="title"><a>Bliss Directory</a></h4>
                            <small>Experience Finger licking dishes, top-notch restaurants, one stop grocery stores,
                                fabric stores & lots more from African & Caribbean vendors</small>
                            <div class="d-flex justify-content-between pt-3">
                                <img src="{{ asset('app-store-icon-png-14.png') }}" style="height: 40px"
                                    class="img-fluid mt-4" alt="" srcset="">
                                <a href="#"><img src="{{ asset('images.png') }}" style="height: 40px"
                                        class="img-fluid mt-4" alt="" srcset=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-5 mt-lg-0 ">
                        <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="200">
                            <h4 class="title"><a href="">Nigeria Application Forms</a></h4>
                            <ul class="description">
                                <li>Quick NIN Registration & Upload</li>
                                <li>Passport Review, Appointment Booking and help with payment</li>
                                <li>Help with Visa Application and Appointment</li>
                            </ul>
                            <a href="{{ route('nin.apply') }}"
                                class="btn btn-dark mt-3 w-100 animate__animated animate__fadeInUp scrollto">Book
                                Now</a>
                        </div>
                    </div>


                </div>

                {{-- <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <a href="{{ route('nin.apply') }}"
                            class="btn btn-outline-dark w-100 animate__animated animate__fadeInUp scrollto">Book Now</a>
                    </div>
                </div> --}}

            </div>
        </section><!-- End Services Section -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title" data-aos="zoom-out">
                    <h2>Contact</h2>
                    <p>Contact Us</p>
                </div>

                <div class="row mt-5">

                    <div class="col-lg-4" data-aos="fade-right">
                        <div class="info">
                            {{-- <div class="address mb-4">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p class="mb-2"><b>London:</b> Golden Cross House, 8 Duncannon Street London, Greater
                                    London, WC2N 4JF United Kingdom. Phone: <a href="tel:+07306399602">07306399602</a>
                                </p>
                                <p class="mb-2"><b>Birmingham City:</b> Jennies Cash n Carry, 195 Newton Row Moorsom
                                    Street, B6
                                    4NT, London. <br> Phone: <a href="tel:+07493133871">07493133871</a></p>
                                <p><b>Glasgow City: </b>100 West George Street G2 1PP <br> Phone: <a
                                        href="tel:+07470334864">07470334864</a></p>
                            </div> --}}

                            <div class="address">
                                <i class="bi bi-envelope-fill text-dark"></i>
                                <h4>Email:</h4>
                                <p class="mb-2">blissitechhub@gmail.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-instagram text-dark"></i>
                                <h4>Instagram:</h4>
                                <p><a href="http://www.instagram.com/blissitech">BlissITech</a></p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-twitter text-dark"></i>
                                <h4>Twitter:</h4>
                                <p><a href="https://mobile.twitter.com/blissitech/">BlissITech</a></p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-facebook text-dark"></i>
                                <h4>Facebook:</h4>
                                <p><a href="https://www.facebook.com/profile.php?id=100073728863717">BlissITech</a></p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">
                        <form action="{{ route('contact.form') }}" method="post" id="contact-form" class="php-email-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message"
                                    required></textarea>
                            </div>
                            <div class="text-center"><button class="btn btn-dark mt-3" id="submit" type="submit">Send
                                    Message</button></div>
                        </form>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <h3>BLISSITECH HUB</h3>
        </div>
    </footer><!-- End Footer -->

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
