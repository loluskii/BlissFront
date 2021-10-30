@extends('layouts.app')

@section('css')
    <style>

    .card{
        border: none;
    }

.faq-section {
    background: #fdfdfd;
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
  background: #FFFFFF;
  box-shadow: 0 2px 48px 0 rgba(0, 0, 0, 0.06);
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

@media (max-width: 991px) {
  .faq {
    margin-bottom: 30px;
  }
  .faq .card .card-header .faq-title {
    line-height: 26px;
    margin-top: 10px;
  }
}
    </style>
@endsection

@section('content')
<div class="container">
    <div class="section d-flex justify-content-center align-items-center" style="min-height: 80vh">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <img src="{{ asset('images/882-700x600.jpeg') }}" class="img-fluid" alt="" srcset="">
            </div>
            <div class="col-md-6">
                <div class="pl-5">
                    <h1 class="mb-2" style="font-weight: bolder">Connect with your loved ones in real time.</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipis corporis. Tenetur, laboriosam laborum. Nihil, incidunt? Ipsa distinctio libero molestiae facere.Illo assumenda dignissimos voluptatum ratione veritatis in atque amet iste! Eum officiis asperiores veritatis quasi dolore rem, niti illum?</p>
                    <a href="{{ route('register') }}" type="submit" class="btn btn-primary btn-lg mr-2" >Get Started</a >
                    <button type="submit" class="btn  btn-lg" >Learn more</button>
                </div>
            </div>
        </div>
    </div>
    <div class="section d-flex justify-content-center align-items-center"  style="min-height: 100vh">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="">
                    <h1 style="font-weight: bolder">Connect with your loved ones.</h1>
                    <p> corporis. Tenetur, laboriosam laborum. Nihil, incidunt? Ipsa distinctio libero molestiae facere.Illo assumenda dignissimos voluptatum ratione veritatis in atque amet iste! Eum officiis asperiores veritatis quasi dolore rem, niti illum?</p>
                </div>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/901-500x550.jpeg') }}" class="img-fluid pl-5" alt="" srcset="">
            </div>
        </div>
    </div>
</div>
    <div class="py-5" >
        <div class="container section d-flex justify-content-center align-items-center"  style="min-height: 70vh">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="text-center">
                    <h1 style="font-weight: bolder">Our Products</h1>
                    <p>Lorem ipsum dolor sit amet conseqt accusamus officia rem.</p>
                    <div class="d-flex mt-5">
                        <div class="col-md-4 col-sm-12 col-lg-4">
                            <a href="{{ route('store.show') }}"><img src="https://images.pexels.com/photos/691155/pexels-photo-691155.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" class="img-fluid" alt="" srcset=""></a>
                        </div>
                        <div class="col-md-4 col-sm-12 col-lg-4">
                            <a href="{{ route('store.show') }}"><img src="https://images.pexels.com/photos/3326215/pexels-photo-3326215.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" class="img-fluid" alt="" srcset=""></a>
                        </div>
                        <div class="col-md-4 col-sm-12 col-lg-4r">
                            <a href="{{ route('store.show') }}"><img src="https://images.pexels.com/photos/4374579/pexels-photo-4374579.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500" class="img-fluid" alt="" srcset=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container">
    <div class="section d-flex justify-content-center align-items-center"  style="min-height: 70vh">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="text-center">
                <h1 style="font-weight: bolder">How it Works</h1>
                <p>Lorem ipsum dolor sit amet consequuntur quod eos, minima sequi tempora in illum error autem ad? Quo possimus et accusamus officia rem.</p>
                <div class="d-flex mt-5">
                    <div class="col-md-4 col-sm-12 col-lg-4">
                        <div class="card shadow">
                            {{-- <img class="card-img-top" src="holder.js/100x180/" alt=""> --}}
                            <div class="card-body">
                                <h2 class="card-title">Title</h2>
                                <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Labore eligendi explicabo corrupti ducimus quod? Quas laborum earum, reprehenderit maiores nulla deserunt cumque corrupti et iure quisquam autem. Error, cupiditate velit?</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-lg-4">
                        <div class="card shadow">
                            {{-- <img class="card-img-top" src="holder.js/100x180/" alt=""> --}}
                            <div class="card-body">
                                <h2 class="card-title">Title</h2>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium deserunt velit accusamus, soluta ipsum, quo, incidunt necessitatibus beatae numquam quibusdam hic. Iste sunt repudiandae aliquid at ipsa enim numquam unde?</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12 col-lg-4r">
                        <div class="card shadow">
                            {{-- <img class="card-img-top" src="holder.js/100x180/" alt=""> --}}
                            <div class="card-body">
                                <h2 class="card-title">Title</h2>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum porro corporis totam, fugit sit officiis debitis ut commodi corrupti fuga velit illum repudiandae ipsum, saepe sint doloribus repellendus voluptatum! Consequatur?</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section d-flex justify-content-center align-items-center" style="min-height: 80vh">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <img src="{{ asset('images/993-700x500.jpeg') }}" class="img-fluid" alt="" srcset="">
            </div>
            <div class="col-md-6">
                <div class="pl-5">
                    <h1 style="font-weight: bolder">Connect with your loved ones <br> in real time.</h1>
                    <p>commodi laborum architecto inventore ex facere.Illo assumenda dignissimos voluptatum ratione veritatis in atque amet iste! Eum officiis asperiores veritatis quasi dolore rem, niti illum?</p>
                    <a href="{{ route('subscription') }}" class="btn btn-primary btn-lg">Get Started</a>
                </div>
            </div>
        </div>
    </div>
    <div class="section">
        <div class="section d-flex justify-content-center align-items-center"  style="min-height: 70vh">
            <div class="row justify-content-center align-items-center">
                <div class="text-center">
                    <h1 style="font-weight: bolder">Frequently Asked Questions</h1>
                    <p>Lorem ipsum dolor sit amet consequuntur quod eos, minima sequi tempora in illum error autem ad? Quo possimus et accusamus officia rem.</p>
                </div>
                <div class="col-md-12">
                    <div class="faq" id="accordion">
                        <div class="card">
                            <div class="card-header" id="faqHeading-1">
                                <div class="mb-0">
                                    <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-1" data-aria-expanded="true" data-aria-controls="faqCollapse-1">
                                        <span class="badge">1</span>What is Lorem Ipsum?
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-1" class="collapse" aria-labelledby="faqHeading-1" data-parent="#accordion">
                                <div class="card-body">
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="faqHeading-2">
                                <div class="mb-0">
                                    <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-2" data-aria-expanded="false" data-aria-controls="faqCollapse-2">
                                        <span class="badge">2</span> Where does it come from?
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-2" class="collapse" aria-labelledby="faqHeading-2" data-parent="#accordion">
                                <div class="card-body">
                                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="faqHeading-3">
                                <div class="mb-0">
                                    <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-3" data-aria-expanded="false" data-aria-controls="faqCollapse-3">
                                        <span class="badge">3</span>Why do we use it?
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-3" class="collapse" aria-labelledby="faqHeading-3" data-parent="#accordion">
                                <div class="card-body">
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="faqHeading-4">
                                <div class="mb-0">
                                    <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-4" data-aria-expanded="false" data-aria-controls="faqCollapse-4">
                                        <span class="badge">4</span> Where can I get some?
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-4" class="collapse" aria-labelledby="faqHeading-4" data-parent="#accordion">
                                <div class="card-body">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="faqHeading-5">
                                <div class="mb-0">
                                    <h5 class="faq-title" data-toggle="collapse" data-target="#faqCollapse-5" data-aria-expanded="false" data-aria-controls="faqCollapse-5">
                                        <span class="badge">5</span> What is Lorem Ipsum?
                                    </h5>
                                </div>
                            </div>
                            <div id="faqCollapse-5" class="collapse" aria-labelledby="faqHeading-5" data-parent="#accordion">
                                <div class="card-body">
                                    <p> It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
{{-- <div class="section">
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">Hello, world!</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
        <p class="lead">
          <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </p>
        </div>
      </div>
</div> --}}
<div class="d-flex flex-column h-100">

    <!-- FOR DEMO PURPOSE -->
    <section class="hero text-white py-5 flex-grow-1">
        <div class="container py-4">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="display-4">Bootstrap footer bottom</h1>
                    <p class="fst-italic text-muted">Using Bootstrap 5 flexbox utilities, create a footer that always sticks to the bottom of your viewport. Snippet by <a class="text-primary" href="https://bootstrapious.com/" target="_blank">Bootstrapious</a></p>
                </div>
            </div>
        </div>
    </section>
</div>


@endsection
