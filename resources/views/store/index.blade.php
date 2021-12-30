@extends('layouts.app')

@section('css')

<style>
    /** Shop: Thumbnails **/
    .shop__thumb {
        /* padding: 20px; */
        background-color: white;
        text-align: center;
        -webkit-transition: border-color 0.1s, -webkit-box-shadow 0.1s;
        -o-transition: border-color 0.1s, box-shadow 0.1s;
        transition: border-color 0.1s, box-shadow 0.1s;
        border-radius: 7px;
    }

    .shop__thumb:hover {
        border-color: rgba(0, 0, 0, 0.07);
        -webkit-box-shadow: 0 5px 30px rgba(0, 0, 0, 0.07);
        box-shadow: 0 5px 30px rgba(0, 0, 0, 0.07);
    }

    .shop__thumb>a {
        color: #333333;
    }

    .shop__thumb>a:hover {
        text-decoration: none;
    }

    .shop-thumb__img {
        position: relative;
        margin-bottom: 15px;
        overflow: hidden;
        height: 250px;
    }

    .shop-thumb__img img {
        width: auto;
        height: 250px;
        object-fit: contain;
    }

    .shop-thumb__title {
        font-weight: 600;

    }

    .shop-thumb__price {
        color: #777777;
        padding: 10px;
    }

    .shop-thumb-price_old {
        text-decoration: line-through;
    }

    .shop-thumb-price_new {
        color: red;
    }


    /** Shop: Filter **/
    .shop__filter {
        margin-bottom: 40px;
    }

    /* Shop filter: Pricing */
    .shop-filter__price {
        padding: 15px;
    }

    .shop-filter__price [class*='col-'] {
        padding: 2px;
    }

    /** Shop: Checkout **/
    .checkout__block {
        margin-bottom: 40px;
    }

    .checkout-cart__item {
        margin-bottom: 15px;
    }

    .checkout-cart-item__img {
        max-width: 80px;
        margin-right: 10px;
        float: left;
    }

    .checkout-cart-item__content {
        overflow: hidden;
    }

    .checkout-cart-item__heading {
        margin-top: 0;
    }

    .checkout-cart-item__footer {
        padding: 10px 0;
        margin-top: 10px;
        border-top: 1px solid #eee;
    }

    .checkout-cart-item__price {
        font-weight: 600;
    }

    .checkout-total__block {
        margin-bottom: 40px;
        border-top: 1px solid #e9e9e9;
        border-bottom: 1px solid #e9e9e9;
    }

    .checkout-total__block>.row>[class*="col-"] {
        padding: 40px 40px;
        border-right: 1px solid #e9e9e9;
        color: #aaa;
    }

    .checkout-total__block>.row>[class*="col-"]:last-child {
        border-right: 0;
        color: #333333;
    }

    @media (max-width: 767px) {
        .checkout-total__block {
            border: 0;
        }

        .checkout-total__block>.row>[class*="col-"] {
            padding: 15px 20px;
            border: 0;
            border-top: 1px solid #e9e9e9;
        }

        .checkout-total__block>.row>[class*="col-"]:last-child {
            border-bottom: 1px solid #e9e9e9;
        }
    }

    .checkout-total__heading {
        float: left;
    }

    .checkout-total__price {
        float: right;
        margin: 9px 0;
        font-size: 17px;
    }

    .checkout__submit {
        padding: 15px 40px;
    }

    /** Shop: Order Confirmation */
    .shop-conf__heading {
        margin-bottom: 40px;
    }

    .shop-conf__heading+p {
        margin-bottom: 100px;
    }

    /* Radios */
    .radio input[type="radio"] {
        display: none;
    }

    .radio label {
        padding-left: 0;
    }

    .radio label:before {
        content: "";
        display: inline-block;
        vertical-align: middle;
        margin-right: 15px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        border: 10px solid #eee;
        background-color: #333333;
    }

    .radio input[type="radio"]:checked+label:before {
        border-width: 7px;
    }

    .checkbox-content {
        border-radius: 5px;
        border: solid 2px transparent;
        background: #fff;
        padding: 10px;
        transition: .3s ease-in-out all;
        height: 100%;
    }


    .checkbox-label {
        position: relative;
        border-radius: 5px;
    }

    .checkbox-label input {
        display: none;
    }

    .checkbox-label .icon {
        width: 10px;
        height: 10px;
        border: solid 2px #e3e3e3;
        border-radius: 50%;
        position: absolute;
        top: 19px;
        left: 10px;
        transition: .3s ease-in-out all;
        transform: scale(1);
        z-index: 1;
        visibility: hidden;
    }
    .checkbox-label input:checked+.icon {
        background: #2A707D;
        border-color: #2A707D;
        transform: scale(1.2);
        visibility: visible;
    }


    .checkbox-label input:checked+.icon:before {
        color: #fff;
        opacity: 1;
        /* transform: scale(.8); */
    }

    .checkbox-label input:checked~.checkbox-content {
        box-shadow: 0 2px 4px 0 rgba(219, 215, 215, 0.5);
        /* border: solid 1px #2A707D; */
        /* color: #2A707D; */
    }

    .checkbox-label input:checked~.checkbox-content h6 {
        margin-left: 20px;
        transition: .3s ease-in-out all;
    }

</style>

@endsection
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container" style="min-height: 70vh">
    <div class="row">
        @include('store.filter')
        <div class="col-sm-8 col-md-9">
            {{--
            <!-- Filters -->
            <ul class="shop__sorting">
                <li class="active"><a href="#">Popular</a></li>
                <li><a href="#">Newest</a></li>
                <li><a href="#">Bestselling</a></li>
                <li><a href="#">Price (low)</a></li>
                <li><a href="#">Price (high)</a></li>
            </ul> --}}

            <div class="row">
                @if ($products->count() > 0)
                    @foreach ($products as $product)
                    <div class="col-sm-6 col-md-4 mb-3">
                        <div class="shop__thumb">
                            <div class="shop-thumb__img mb-0">
                                <img src="{{ $product->cover_img }}" class="img-fluid" alt="...">
                            </div>
                            <div class="body p-2">
                                <h5 class="shop-thumb__title text-left">{{ $product->name }}</h5>
                                <div class="d-flex justify-content-between">
                                    <p>£{{ number_format($product->price,2) }}</p>
                                    <a href="{{ route('cart.add', $product->id) }}"><img
                                            src="{{ secure_asset('images/plus.svg') }}"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-12 text-center">
                                <img src="{{ secure_asset('images/empty.svg') }}" class="img-fluid" style="height: 350px;">
                                <div class="mb-4 lead">Oops! No products available!</div>
                                <a href="{{ route('home') }}" class="btn btn-link">Back to Home</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div> <!-- / .row -->
            <div class="d-flex justify-content-end">
                {{ $products->links() }}
            </div>
            <!-- Pagination -->

        </div> <!-- / .col-sm-8 -->
    </div> <!-- / .row -->
</div>
@endsection
