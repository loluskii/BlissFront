@extends('layouts.app')
@section('page')
View Cart
@endsection

@section('css')
<style>
    h3 {
        font-size: 16px;
    }

    .text-navy {
        color: #1ab394;
    }

    .cart-product-imitation {
        text-align: center;
        padding-top: 30px;
        height: 80px;
        width: 80px;
        background-color: #f8f8f9;
    }

    .product-imitation.xl {
        padding: 120px 0;
    }


    table.shoping-cart-table {
        margin-bottom: 0;
    }

    table.shoping-cart-table tr td {
        border: none;
        text-align: right;
    }

    table.shoping-cart-table tr td.desc,
    table.shoping-cart-table tr td:first-child {
        text-align: left;
    }

    table.shoping-cart-table tr td:last-child {
        width: 80px;
    }

    .ibox {
        clear: both;
        margin-bottom: 25px;
        margin-top: 0;
        padding: 0;
    }

    .ibox.collapsed .ibox-content {
        display: none;
    }

    .ibox:after,
    .ibox:before {
        display: table;
    }

    .ibox-title {
        -moz-border-bottom-colors: none;
        -moz-border-left-colors: none;
        -moz-border-right-colors: none;
        -moz-border-top-colors: none;
        background-color: #ffffff;
        border-color: #2A707D;
        border-image: none;
        border-style: solid solid none;
        border-width: 3px 0 0;
        color: inherit;
        margin-bottom: 0;
        padding: 14px 15px 7px;
        min-height: 48px;
    }

    .ibox-content {
        background-color: #ffffff;
        color: inherit;
        padding: 15px 20px 20px 20px;
        border-color: #e7eaec #e7eaec #e7eaec;
        border-image: none;
        border-style: solid solid none;
        border-width: 1px 0;
    }

    .ibox-footer {
        color: inherit;
        border-top: 1px solid #e7eaec;
        font-size: 90%;
        background: #ffffff;
        padding: 10px 15px;
    }
</style>
@endsection

@section('content')
<div class="container" style="min-height: 70vh">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-9">
                <div class="ibox">
                    <div class="ibox-title">
                        <h2>Your Cart</h2>
                    </div>
                    <div class="ibox-content p-0">
                        <div class="table-responsive">
                            <div class="cart-table">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered mb-30">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Product</th>
                                                        <th scope="col">Unit Price</th>
                                                        <th class="text-center" scope="col">Quantity</th>
                                                        <th scope="col">Total</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($cartTotalQuantity == 0)
                                                    <tr class="text-center">
                                                        <td colspan="5">You have no items in your cart</td>
                                                    </tr>
                                                    @endif
                                                @foreach ($cartItems as $item)
                                                    <tr>
                                                        <td>
                                                            <a href="#">{{ $item->name }}</a>
                                                        </td>
                                                        <td>${{ $item->price }}</td>
                                                        <td>
                                                            <div class="row h-100 justify-content-center">
                                                                <form action="{{route('cart.update', $item->id)}}" method="POST">
                                                                @csrf
                                                                <div class="quantity">
                                                                    <input type="number" class="qty-text" id="qty2" step="1" min="1" onchange="this.form.submit()" max="99" name="quantity" style="width: 50px;" value="{{ $item->quantity }}">
                                                                </div>                                                    </form>
                                                            </div>
                                                            {{-- <div class="quantity">
                                                                <input type="number" class="qty-text" id="qty2" step="1" min="1" onchange="this.form.submit()" max="99" name="quantity" style="width: 50px;" value="{{ $item->quantity }}">
                                                            </div> --}}
                                                        </td>
                                                        <td>
                                                            {{ Cart::session(auth()->id())->get($item->id)->getPriceSum() }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('cart.destroy', $item->id) }}">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end ibox-content">
                        @if ($cartTotalQuantity == 0)
                        <a href="{{ route('store.show') }}" class="btn btn-primary">Continue Shopping</a>
                        @else
                        <a href="{{ route('cart.checkout') }}" class="btn btn-primary">Proceed to Checkout</a>
                        @endif

                    </div>
                </div>
            </div>
            @include('store.cart-summary')
        </div>
    </div>
</div>
@endsection
