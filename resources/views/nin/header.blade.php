<header id="header" class="bg-white shadow-sm border-bottom fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
            <h1><a style="color: black" href="/">BLISSITECH</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="text-decoration-none nav-link bg-dark scrollto active" href="#hero">NIN Pre-Enrollment</a></li>
                @if (Route::is('nin.apply'))
                <li><a class="text-decoration-none text-dark" href="{{ route('nin.index') }}">Back to Home</a></li>
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
