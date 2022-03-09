@extends('layouts.app')

@section('css')
<style>
    .card {
        border: none;
    }

    body {
        background-color: white;
    }


    .services__type-bg img {
        height: 200px;
        width: 100%;
        border-top-left-radius: 15px;
        border-top-right-radius: 5px;
        border-bottom-right-radius: 15px;
        border-bottom-left-radius: 5px;
    }




    .card-pricing.popular {
        z-index: 1;
        border: 1px solid #2A707D;

    }

    .card-pricing .list-unstyled li {
        padding: .5rem 0;
        color: #6c757d;
        font-weight: 300;
        color: #4E2B1D;
    }

    .btn {
        border-radius: 1px;
        font-weight: 300
    }

    .hvr:hover {
        color: #fff;
        background-color: #2A707D;
        border: 1px solid #2A707D !important
    }

    .faq-section {
        /* background: #fdfdfd; */
        min-height: 100vh;
        padding: 10vh 0 0;
    }

    .faq-title h2 {
        position: relative;
        margin-bottom: 45px;
        display: inline-block;
        font-weight: 600;
        line-height: 1;
    }

    .faq-title h2::before {
        content: "";
        position: absolute;
        left: 50%;
        width: 60px;
        height: 2px;
        background: #E91E63;
        bottom: -25px;
        margin-left: -30px;
    }

    .faq-title p {
        padding: 0 190px;
        margin-bottom: 10px;
    }

    .faq {
        /* background: #FFFFFF; */
        /* box-shadow: 0 2px 48px 0 rgba(0, 0, 0, 0.06); */
        border-radius: 4px;
    }

    .faq .card {
        border: none;
        background: none;
        border-bottom: 1px dashed #CEE1F8;
    }

    .faq .card .card-header {
        padding: 0px;
        border: none;
        background: none;
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
    }

    /* .faq .card .card-header:hover {
    background: rgba(233, 30, 99, 0.1);
    padding-left: 10px;
} */
    .faq .card .card-header .faq-title {
        width: 100%;
        text-align: left;
        padding: 0px;
        padding-left: 30px;
        padding-right: 30px;
        font-weight: 400;
        font-size: 15px;
        letter-spacing: 1px;
        color: #3B566E;
        text-decoration: none !important;
        -webkit-transition: all 0.3s ease 0s;
        -moz-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
        cursor: pointer;
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .faq .card .card-header .faq-title .badge {
        display: inline-block;
        width: 20px;
        height: 20px;
        line-height: 14px;
        float: left;
        -webkit-border-radius: 100px;
        -moz-border-radius: 100px;
        border-radius: 100px;
        text-align: center;
        background: #EB8258;
        color: #fff;
        font-size: 12px;
        margin-right: 20px;
    }

    footer ul li {
        display: inline-block;
        padding: 10px;
        font-weight: bold;
    }


    .faq .card .card-body {
        padding: 30px;
        padding-left: 35px;
        padding-bottom: 16px;
        font-weight: 400;
        font-size: 16px;
        color: #6F8BA4;
        line-height: 28px;
        letter-spacing: 1px;
        border-top: 1px solid #F3F8FF;
    }

    .faq .card .card-body p {
        margin-bottom: 14px;
    }

    .header-img{
        height: 300px;
    }
    .header-text{
        font-size: 40px;
        text-align: left;
    }

    @media (max-width: 991px) {
        .faq {
            margin-bottom: 30px;
        }

        .faq .card .card-header .faq-title {
            line-height: 26px;
            margin-top: 10px;
        }
    }

    @media (max-width:600px){
        .header-img{
            height: auto;
            /* border-radius: 50%; */
        }
        .hero{
            text-align: center;
        }
        .header-text{
            font-size: 30px;
            text-align: center;
        }
    }
</style>
@endsection

@section('content')
<div id="how-it-works" style="background-color: #C6F4FD">
    <div class="container py-5">
        <div class="section">
            <div class="text-center">
                <h1 class="">Our Categories</h1>
                <p></p>
                <div class="mt-5">
                </div>
            </div>

            <div class="row text-center">
                <div class="col-md-2"></div>
                <div class="col-md-4 mx-auto mb-3">
                    <div class="card shadow">
                        {{-- <img class="card-img-top" src="holder.js/100x180/" alt=""> --}}
                        <div class="card-body">
                            <div>
                                <img src="{{ secure_asset('images/choose-interval.svg') }}"
                                    style="height: 200px" class="img-fluid" alt="">
                            </div>
                            <h4 class="card-title">Groceries</h4>
                            <p class="card-text">Choose from one of our plans, the interval that fits your exact
                                needs and add your delivery details</p>
                                <a name="" id="" class="btn btn-primary rounded" href="#" role="button">Visit</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card shadow">
                        {{-- <img class="card-img-top" src="holder.js/100x180/" alt=""> --}}
                        <div class="card-body">
                            <div>
                                <img src="{{ secure_asset('images/relax.svg') }}" class="img-fluid"
                                    style="height: 200px" alt="">
                            </div>
                            <h4 class="card-title">Pocket Money</h4>
                            <p class="card-text">No need for monthly grocery runs anymore. Your items will be
                                delivered to you according to your plan. We got you!</p>
                                <a name="" id="" class="btn btn-primary rounded" href="#" role="button">Visit</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>

            </div>
        </div>
    </div>

</div>


<footer class="footer-16371 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 text-center py-5">
                <div class="footer-site-logo mb-4">
                    <a href="#"><img src="{{ secure_asset('images/blissex.png') }}" height="30" alt=""></a>
                </div>
                <ul class="list-unstyled nav-links" style="display: inline-block;">
                    <li><a href="https://blissexplorers.com">Explore</a></li>
                    <li><a href="{{ route('store.show') }}">Shop</a></li>
                    <li><a href="{{ route('register') }}">Create Account</a></li>
                    <li><a href="https://blissexplorers.com/about-us">About</a></li>
                </ul>
                <div class="copyright">
                    <p class="mb-0"><small>©BlissExplorers. All Rights Reserved.</small></p>
                </div>
            </div>
        </div>
    </div>
</footer>



@endsection


@push('more_scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>
@endpush
