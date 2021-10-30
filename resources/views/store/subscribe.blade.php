@extends('layouts.app')

@section('css')
<style>
    .radio-content {
        text-align: center;
        border-radius: 3px;
        box-shadow: 0 2px 4px 0 rgba(219, 215, 215, 0);
        border: solid 2px transparent;
        background: #fff;
        padding: 15px;
        transition: .3s ease-in-out all;
        height: 100%;
        /* max-width: 185px;
        min-width: 150px; */
    }

    .radio-content img {
        width: 30%;
        margin: 0 auto;
    }

    .radio-label {
        position: relative;
    }

    .radio-label input {
        display: none;
    }

    .radio-label .icon {
        width: 20px;
        height: 20px;
        border: solid 2px #e3e3e3;
        border-radius: 50%;
        position: absolute;
        top: 10px;
        left: 10px;
        transition: .3s ease-in-out all;
        transform: scale(1);
        z-index: 1;
    }

    .radio-label .icon:before {
        content: "\f00c";
        position: absolute;
        width: 100%;
        height: 100%;
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        font-size: 12px;
        color: #000;
        text-align: center;
        opacity: 0;
        transition: .2s ease-in-out all;
        transform: scale(2);
    }

    .radio-label input:checked+.icon {
        background: #008A69;
        border-color: #008A69;
        transform: scale(1.2);
    }

    .radio-label input:checked+.icon:before {
        color: #fff;
        opacity: 1;
        transform: scale(.8);
    }

    .radio-label input:checked~.radio-content {
        box-shadow: 0 2px 4px 0 rgba(219, 215, 215, 0.5);
        border: solid 1px #008A69;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9">
            <section id="products">
                <div class="container pt-2 mt-3">
                    <h3 style="font-weight: bold">Pick your Interests</h3>
                    <p><small>Follow at least 3 topics to get event recommendations tailored for you.</small></p>
                    <form action="" method="POST" class="pt-4" autocomplete="off">
                        @csrf
                        <div class="container">
                            <div class="row ">
                                {{-- @foreach($interests ?? '' as $key => $interest) --}}
                                <div class="col mb-3 justify-content-center">
                                    <label class="radio-label">
                                        <input type="radio" value="one" name="interests[]">
                                        <span class="icon"></span>
                                        <div class="radio-content">
                                            <div class="card-body">
                                                <h5 class="card-title text-muted text-uppercase text-center">Plus</h5>
                                                <h6 class="card-price text-center">$9<span class="period">/month</span></h6>
                                                <hr>
                                                <ul class="fa-ul">
                                                    <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>5
                                                            Users</strong></li>
                                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>50GB Storage</li>
                                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public
                                                        Projects</li>
                                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access
                                                    </li>
                                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Private
                                                        Projects</li>
                                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Dedicated Phone
                                                        Support</li>
                                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Free Subdomain
                                                    </li>
                                                    <li class="text-muted"><span class="fa-li"><i
                                                                class="fas fa-times"></i></span>Monthly Status
                                                        Reports</li>
                                                </ul>
                                                <div class="d-grid">
                                                    <a href="#" class="btn text-uppercase w-100 text-white"
                                                        style="background-color:#EB8258">Button</a>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="col mb-3 justify-content-center">
                                    <label class="radio-label">
                                        <input type="radio" value="one" name="interests[]">
                                        <span class="icon"></span>
                                        <div class="radio-content">
                                            <div class="card-body">
                                                <h5 class="card-title text-muted text-uppercase text-center">Plus</h5>
                                                <h6 class="card-price text-center">$9<span class="period">/month</span></h6>
                                                <hr>
                                                <ul class="fa-ul">
                                                    <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>5
                                                            Users</strong></li>
                                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>50GB Storage</li>
                                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public
                                                        Projects</li>
                                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access
                                                    </li>
                                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Private
                                                        Projects</li>
                                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Dedicated Phone
                                                        Support</li>
                                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Free Subdomain
                                                    </li>
                                                    <li class="text-muted"><span class="fa-li"><i
                                                                class="fas fa-times"></i></span>Monthly Status
                                                        Reports</li>
                                                </ul>
                                                <div class="d-grid">
                                                    <a href="#" class="btn text-uppercase w-100 text-white"
                                                        style="background-color:#EB8258">Button</a>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>

                                <div class="col mb-3 justify-content-center">
                                    <label class="radio-label">
                                        <input type="radio" value="two" name="interests[]">
                                        <span class="icon"></span>
                                        <div class="radio-content">
                                            <div class="card-body">
                                                <h5 class="card-title text-muted text-uppercase text-center">Plus</h5>
                                                <h6 class="card-price text-center">$9<span class="period">/month</span></h6>
                                                <hr>
                                                <ul class="fa-ul">
                                                    <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>5
                                                            Users</strong></li>
                                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>50GB Storage</li>
                                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Public
                                                        Projects</li>
                                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Community Access
                                                    </li>
                                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Unlimited Private
                                                        Projects</li>
                                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Dedicated Phone
                                                        Support</li>
                                                    <li><span class="fa-li"><i class="fas fa-check"></i></span>Free Subdomain
                                                    </li>
                                                    <li class="text-muted"><span class="fa-li"><i
                                                                class="fas fa-times"></i></span>Monthly Status
                                                        Reports</li>
                                                </ul>
                                                <div class="d-grid">
                                                    <a href="#" class="btn text-uppercase w-100 text-white"
                                                        style="background-color:#EB8258">Button</a>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </section>
        </div>
        @include('store.cart-summary')
    </div>

</div>
@endsection
