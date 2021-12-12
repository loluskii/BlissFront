<style>
    .dropdown-menu {
        left: auto;
        right: 0;
    }
</style>
@guest
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ secure_asset('images/blissex.png') }}" height="35" alt="">
        </a>
        <div class="btn-group dropdown d-md-none d-sm-block">
            <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown"
                aria-expanded="false">
                <span class=""><i class="fas fa-user"></i></span>
            </button>
            <div class="dropdown-menu dropend">
                <a class="dropdown-item" href="#">Sign In</a>
                <a class="dropdown-item" href="#">Create your Account</a>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                    @if (Route::has('login'))
                    <li class="nav-item mx-2">
                        <a class="nav-link btn btn-dark btn-sm py-1 my-1 px-3 text-white rounded"
                            href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item mx-2">
                        <a class="nav-link btn btn-primary btn-sm py-1 my-1 px-3 text-white rounded"
                            href="{{ route('register') }}">{{ __('Sign Up') }}</a>
                    </li>
                    @endif
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart.index') }}"><i class="fa fa-shopping-cart"
                                style="font-size: large;" aria-hidden="true"></i>
                            <span class="badge badge-primary"
                                style="background-color:#2A707D; border-radius: 50%; position: relative;top: -15px; left: -10px;">{{
                                Cart::session(auth()->id())->getContent()->count()}}</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Hi, {{ Auth::user()->fname }}
                        </a>


                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('home') }}">Dashboard</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li> --}}
            </ul>
        </div>
    </div>
</nav>

@endguest


@auth
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ secure_asset('images/blissex.png') }}" height="35" alt="">
        </a>
        <div class="btn-group dropdown d-md-none d-sm-block">
            <button type="button" class="btn btn-outline-secondary dropdown-toggle rounded" data-toggle="dropdown"
                aria-expanded="false">
                <span class=""><i class="fas fa-user"></i></span>
            </button>
            <div class="dropdown-menu dropend">
                <a class="dropdown-item" href="{{ route('cart.index') }}">Your Cart <span class="badge badge-primary" style="background-color:#2A707D;">{{ Cart::session(auth()->id())->getContent()->count()}}</span></a>
                <a class="dropdown-item" href="{{ route('home') }}">My Account</a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }} </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.index') }}"><i class="fa fa-shopping-cart"
                            style="font-size: large;" aria-hidden="true"></i>
                        <span class="badge badge-primary"
                            style="background-color:#2A707D; border-radius: 50%; position: relative;top: -15px; left: -10px;">{{
                            Cart::session(auth()->id())->getContent()->count()}}</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Hi, {{ Auth::user()->fname }}
                    </a>


                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('home') }}">Dashboard</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

@endauth
