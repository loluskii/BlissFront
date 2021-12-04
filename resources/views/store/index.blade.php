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
        padding:10px;
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


    /**
 * Forms
 */
    .form-control,
    .form-control:focus {
        -webkit-box-shadow: none;
        box-shadow: none;
        outline: none;
    }

    /* Has error */
    .has-error .form-control {
        border-color: #d9534f;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
    }

    .has-error .form-control:focus {
        border-color: #b52b27;
    }

    .has-error .help-block {
        color: #d9534f;
    }

    /* Checkboxes */
    /* input[type="checkbox"] {
        content: "";
        display: inline-block;
        vertical-align: middle;
        margin-right: 15px;
        width: 20px;
        height: 20px;
        line-height: 20px;
        background-color: #eee;
        text-align: center;
        font-family: "FontAwesome";
        border: none;
    } */

    /* .checkbox label {
        padding-left: 0;
    } */

    /* .checkbox label:before {
        content: "";
        display: inline-block;
        vertical-align: middle;
        margin-right: 15px;
        width: 20px;
        height: 20px;
        line-height: 20px;
        background-color: #eee;
        text-align: center;
        font-family: "FontAwesome";
    } */

.containers {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.containers input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 20px;
  width: 20px;
  background-color: #eee;
  border-radius: 3px;
}

/* On mouse-over, add a grey background color */
.containers:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.containers input:checked ~ .checkmark {
  background-color: #2A707D;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.containers input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.containers .checkmark:after {
  left: 7px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
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

</style>

@endsection
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
{{-- @include('layouts.store.mini-jumbo') --}}

<div class="container-fluid"  style="min-height: 70vh">
    <div class="row">
        <div class="col-sm-3 col-md-2">

            <!-- Filter -->
            <div class="border-0">
                <div class="card-body pb-0">
                    <form class="shop__filter">
                        <!-- Price -->
                        <h4 class="headline">
                            <span>Price</span>
                        </h4>
                        <div class="radio">
                            <input type="radio" name="shop-filter__price" id="shop-filter-price_1" value="less_than_10">
                            <label for="shop-filter-price_1">Under £10</label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="shop-filter__price" id="shop-filter-price_2" value="">
                            <label for="shop-filter-price_2">£10 to £50</label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="shop-filter__price" id="shop-filter-price_3" value="">
                            <label for="shop-filter-price_3">£50 to £100</label>
                        </div>
                        {{-- <div class="radio">
                            <input type="radio" name="shop-filter__price" id="shop-filter-price_4" value="specify">
                            <label for="shop-filter-price_4">Other (specify)</label>
                        </div> --}}

                        <!-- Checkboxes -->
                        <h4 class="headline mt-3">
                            <span>Categories</span>
                        </h4>
                        @if ($categories->count() > 0)
                        <label class="containers">All Categories
                            <input type="checkbox" value="all" id="" name="category[]">
                            <span class="checkmark"></span>
                        </label>
                        @foreach ($categories as $category)
                            <label class="containers">{{ $category->name }}
                                <input type="checkbox" value="{{ $category->id }}" id="{{ $category->slug }}" name="category[]">
                                <span class="checkmark"></span>
                            </label>
                        @endforeach
                        @else
                            <p>No Categories available</p>
                        @endif

                        <!-- Radios -->
                        <h4 class="headline mt-3">
                            <span>Brands</span>
                        </h4>
                        @if ($stores->count() > 0)
                            @foreach ($stores as $store)
                            <label class="containers">{{ $store->name }}
                                <input type="checkbox" value="{{ $store->id }}" id="{{ $store->slug }}" name="store[]">
                                <span class="checkmark"></span>
                              </label>
                            @endforeach
                        @else
                            <p>No Stores Available</p>
                        @endif
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary btn-block">Filter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-9 col-md-10">
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
                    <div class="col-sm-6 col-md-3">
                        <div class="shop__thumb">
                            @php
                            $newImage = 'images/products/'.$product->cover_img;
                            @endphp
                            <div class="shop-thumb__img mb-0">
                                <img src="{{ asset($newImage) }}" class="img-responsive" alt="...">
                            </div>
                            <div class="body p-2">
                                <h5 class="shop-thumb__title text-left">{{ $product->name }}</h5>
                                <div class="d-flex justify-content-between">
                                    <p>${{ number_format($product->price,2) }}</p>
                                    <a href="{{ route('cart.add', $product->id) }}"><img src="{{ asset('images/plus.svg') }}" ></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12 text-center">
                            <img src="{{ asset('images/empty.svg') }}" class="img-fluid" style="height: 350px;">
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
