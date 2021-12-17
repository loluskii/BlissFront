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
        height: 500px;
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
            border-radius: 50%;
        }
        .hero{
            text-align: center;
        }
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="section d-flex justify-content-center align-items-center" style="min-height: 80vh">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6 mb-4 mt-sm-0 d-md-none d-sm-block">
                <div class="pl-sm-5 hero">
                    <h2 class="mb-2">Personalize your shopping experience</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipis corporis. Tenetur, laboriosam laborum. Nihil,
                        incidunt? Ipsa distinctio libero molestiae facere.Illo assumenda dignissimos voluptatum ratione
                        veritatis in atque amet iste!
                    </p>
                    <a href="{{ route('store.show') }}" class="btn rounded btn-primary mr-2">Visit Store</a>
                    <button type="submit" class="btn d-none d-md-block">Learn more</button>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ secure_asset('images/freddie-collins-eLpnTMOHAkU-unsplash@2x.png') }}"
                    class="img-fluid header-img" alt="" srcset="">
            </div>
            <div class="col-md-6 mt-4 mt-sm-0 d-md-block d-none">
                <div class="pl-sm-5 hero">
                    <h2 class="mb-2">Personalize your shopping experience</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipis corporis. Tenetur, laboriosam laborum. Nihil,
                        incidunt? Ipsa distinctio libero molestiae facere.Illo assumenda dignissimos voluptatum ratione
                        veritatis in atque amet iste!
                    </p>
                    <a href="{{ route('store.show') }}" class="btn rounded btn-primary mr-2">Visit Store</a>
                    <button type="submit" class="btn ">Learn more</button>
                </div>
            </div>
        </div>
    </div>
    <div class="section py-5 my-5">
        <div class="row h-100 justify-content-between">
            <div class="col-md-6 my-auto">
                <div class="">
                    <h1>Our Services</h1>
                    <p>Ease you can always rely on. </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="services__type-item services__type-food shadow p-3 rounded"
                    style="background-color: #48bbcf52">
                    <h3 data-v-4241bfd6="">🥘</h3>
                    <h5 data-v-4241bfd6="">Groceries</h5>
                    <p data-v-4241bfd6="">
                        High-quality groceries from the best and most popular stores around you
                    </p>
                    <div class="services__type-bg" data-v-4241bfd6=""><img
                            src="https://res.cloudinary.com/eden-life-inc/image/upload/v1611318743/eden-website-v2/food-img1_ls530a.png"
                            alt="food" style="" class="img-fluid"></div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="py-5">
    <div class="container section d-flex justify-content-center align-items-center" style="min-height: 70vh">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="text-center">
                <h1>Our Products</h1>
                <p>Lorem ipsum dolor sit amet conseqt accusamus officia rem.</p>
                <div class="d-flex mt-5">
                    <div class="col-md-4 col-sm-12 col-lg-4">
                        <a href="{{ route('store.show') }}"><img
                                src="https://images.pexels.com/photos/3326215/pexels-photo-3326215.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                                class="img-fluid middle-images" alt="" srcset=""></a>
                    </div>
                    <div class="col-md-4 col-sm-12 col-lg-4">
                        <a href="{{ route('store.show') }}"><img
                                src="https://images.pexels.com/photos/3326215/pexels-photo-3326215.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
                                class="img-fluid middle-images" alt="" srcset=""></a>
                    </div>
                    <div class="col-md-4 col-sm-12 col-lg-4r">
                        <a href="{{ route('store.show') }}"><img
                                src="https://images.pexels.com/photos/4374579/pexels-photo-4374579.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500"
                                class="img-fluid middle-images" alt="" srcset=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div style="background-color: #C6F4FD">
    <div class="container py-5">
        <div class="section">
            <div class="text-center">
                <h1 class="">How it Works</h1>
                <p>Follow these simple three steps</p>
                <div class="mt-5">
                </div>
            </div>

            <div class="row text-center">
                <div class="col-md-4 mb-3">
                    <div class="card shadow">
                        {{-- <img class="card-img-top" src="holder.js/100x180/" alt=""> --}}
                        <div class="card-body">
                            <div>
                                <img src="{{ secure_asset('images/select-items.svg') }}" class="img-fluid"
                                    style="height: 200px" alt="" srcset="">
                            </div>
                            <h4 class="text-center pb-2">Select your items</h4>
                            <p class="card-text">Choose from our vast lists of categories or stores, items
                                you'll need on a constant basis </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card shadow">
                        {{-- <img class="card-img-top" src="holder.js/100x180/" alt=""> --}}
                        <div class="card-body">
                            <div>
                                <img src="{{ secure_asset('images/choose-interval.svg') }}"
                                    style="height: 200px" class="img-fluid" alt="">
                            </div>
                            <h4 class="card-title">Choose a Plan</h4>
                            <p class="card-text">Choose from one of our plans, the interval that fits your exact
                                needs and add your delivery details</p>
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
                            <h4 class="card-title">Sit back and relax</h4>
                            <p class="card-text">No need for monthly grocery runs anymore. Your items will be
                                delivered to you according to your plan. We got you!</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

<div class="py-5 my-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="heading text-left pt-2 pb-5">
                    <h1 class="display-4">Our Plans</h1>
                    <p class="my-1">Bliss offers five subscription plans, each carefully crafted to suit your shopping
                        needs, leaving you with one less thing to worry about</p>
                </div>
            </div>
            <div class="col-md-8">
                <div class="container-fluid">
                    <div class="row">
                        <div class="pricing card-deck">
                            @foreach ($plans as $plan)
                            <div class="col-md-4 px-0">
                                <div class="card shadow-sm card-pricing text-center  px-3 mb-4 bg-light"> <span
                                        class="h6 w-60 mx-auto px-4 py-1 rounded-bottom text-white shadow-sm"
                                        style="background-color: #2A707D"> {{ Str::before($plan->name, ' Subscription'); }}</span>
                                    <div class="bg-transparent card-header pt-4 border-0">
                                        <h1 class="h6 font-weight-bold text-center mb-0">Every {{ $plan->interval_count }}
                                            Month(s)</h1>
                                    </div>
                                    <div class="card-body pt-0 px-1">
                                        <p class="mb-0">{{ $plan->description }} </p>
                                        {{-- <button type="button" class="btn btn-outline-secondary mb-3 hvr">Order
                                            now</button> --}}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="container">
    <div class="section mb-5">
        <div class="section">
            <div class="row justify-content-center align-items-center">
                <div class="text-center mb-4">
                    <h1>What Do you Want to Know?</h1>
                </div>
                <div class="col-md-12">
                    <div class="faq" id="accordion">
                        <div class="card">
                            <div class="card-header" id="faqHeading-1">
                                <div class="mb-0">
                                    <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-1"
                                        data-aria-expanded="true" data-aria-controls="faqCollapse-1">
                                        <span class="badge">1</span>What is Lorem Ipsum?
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-1" class="collapse" aria-labelledby="faqHeading-1"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                        unknown printer took a galley of type and scrambled it to make a type specimen
                                        book. </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="faqHeading-2">
                                <div class="mb-0">
                                    <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-2"
                                        data-aria-expanded="false" data-aria-controls="faqCollapse-2">
                                        <span class="badge">2</span> Where does it come from?
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-2" class="collapse" aria-labelledby="faqHeading-2"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots
                                        in a piece of classical Latin literature from 45 BC, making it over 2000 years
                                        old.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="faqHeading-3">
                                <div class="mb-0">
                                    <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-3"
                                        data-aria-expanded="false" data-aria-controls="faqCollapse-3">
                                        <span class="badge">3</span>Why do we use it?
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-3" class="collapse" aria-labelledby="faqHeading-3"
                                data-parent="#accordion">
                                <div class="card-body">
                                    <p>It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout. The point of using Lorem Ipsum is
                                        that it has a more-or-less normal distribution of letters, as opposed to using
                                        'Content here, content here.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div> --}}
<div class="container mt-3">
    <div class="section">
        <div class="jumbotron p-sm-5 p-3 text-white" style="background-color: #F8D5C7; ">
            <div class="container">
                <div class="row h-100">
                    <div class="col-md-8" style="color: #4E2B1D;">
                        <h1>What are you waiting for?</h1>
                        <p>Join now and automate your monthly shopping with Bliss. Click the button to start now</p>

                    </div>
                    <div class="col-md-4 my-auto">
                        <p class="lead float-sm-right">
                            <a class="btn btn-primary rounded" href="#" role="button">SIGN UP</a>
                        </p>
                    </div>
                </div>
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
                <div class="d-flex justify-content-center">
                    <ul class="list-unstyled nav-links" style="display: inline-block;">
                        <li><a href="#">About</a></li>
                        <li><a href="{{ route('store.show') }}">Shop</a></li>
                        <li><a href="{{ route('register') }}">Create Account</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="copyright">
                    <p class="mb-0"><small>©BlissExplorers. All Rights Reserved.</small></p>
                </div>
            </div>
        </div>
    </div>
</footer>



@endsection
