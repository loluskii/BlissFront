@extends('layouts.app')

@section('css')

<style>
    /** Shop: Thumbnails **/
    .shop__thumb {
        border: 1px solid rgba(0, 0, 0, 0.05);
        /* padding: 20px; */
        margin-bottom: 20px;
        background-color: white;
        text-align: center;
        -webkit-transition: border-color 0.1s, -webkit-box-shadow 0.1s;
        -o-transition: border-color 0.1s, box-shadow 0.1s;
        transition: border-color 0.1s, box-shadow 0.1s;
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
        object-fit: cover;
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

<div class="container"  style="min-height: 70vh">
    <div class="row">
        <div class="col-sm-4 col-md-3">

            <!-- Filter -->
            <div class="card border-0 shadow-sm">
                <div class="card-body pb-0">
                    <form class="shop__filter">
                        <!-- Price -->
                        <h4 class="headline">
                            <span>Price</span>
                        </h4>
                        <div class="radio">
                            <input type="radio" name="shop-filter__price" id="shop-filter-price_1" value="" checked="">
                            <label for="shop-filter-price_1">Under $25</label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="shop-filter__price" id="shop-filter-price_2" value="">
                            <label for="shop-filter-price_2">$25 to $50</label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="shop-filter__price" id="shop-filter-price_3" value="">
                            <label for="shop-filter-price_3">$50 to $100</label>
                        </div>
                        {{-- <div class="radio">
                            <input type="radio" name="shop-filter__price" id="shop-filter-price_4" value="specify">
                            <label for="shop-filter-price_4">Other (specify)</label>
                        </div> --}}

                        <!-- Checkboxes -->
                        <h4 class="headline mt-3">
                            <span>Categories</span>
                        </h4>
                        @foreach ($categories as $category)
                            <label class="containers">{{ $category->name }}
                                <input type="checkbox" value="{{ $category->id }}" id="{{ $category->slug }}" name="category[]">
                                <span class="checkmark"></span>
                              </label>
                        @endforeach

                        <!-- Radios -->
                        <h4 class="headline mt-3">
                            <span>Brands</span>
                        </h4>
                        <div class="checkbox">
                            <input type="checkbox" value="" id="shop-filter-checkbox_1" checked="">
                            <label for="shop-filter-checkbox_1">American Food Store</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" value="" id="shop-filter-checkbox_2">
                            <label for="shop-filter-checkbox_2">Earth Natural Foods</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" value="" id="shop-filter-checkbox_3">
                            <label for="shop-filter-checkbox_3">Whole Foods Market</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" value="" id="shop-filter-checkbox_4">
                            <label for="shop-filter-checkbox_4">Marks and Spence</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" value="" id="shop-filter-checkbox_5">
                            <label for="shop-filter-checkbox_5">Tesco</label>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary btn-block">Filter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

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
                @foreach ($products as $product)
                <div class="col-sm-6 col-md-4">
                    <div class="shop__thumb">
                        <a href="#">
                            <div class="shop-thumb__img">
                                <img src="https://via.placeholder.com/400x400/87CEFA/000000" class="img-responsive"
                                    alt="...">
                            </div>
                            <div class="px-3 text-left pb-2">
                                <h5 class="shop-thumb__title">
                                    {{ $product->name }}
                                </h5>
                                <div class="shop-thumb__pric">
                                    ${{ $product->price }}
                                </div>
                            </div>
                            <div class="shop-thumb__price">
                                <a href="{{ route('cart.add', $product->id) }}" class="btn btn-primary btn-block">Add to Cart</a>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div> <!-- / .row -->

            <!-- Pagination -->
            <div class="row">
                <div class="col-sm-12">

                    <ul class="pagination pull-right">
                        <li class="disabled"><a href="#">«</a></li>
                        <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">»</a></li>
                    </ul>

                </div>
            </div> <!-- / .row -->

        </div> <!-- / .col-sm-8 -->
    </div> <!-- / .row -->
</div>
@endsection
