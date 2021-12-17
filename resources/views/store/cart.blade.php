@extends('layouts.app')
@section('page')
View Cart
@endsection

@section('css')

@endsection

@section('content')
<link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
<div class="container" style="min-height: 70vh">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-8">
                <div class="ibox">
                    <div class="ibox-title">
                        <h2>Your Cart</h2>
                    </div>
                    <div class="ibox-content p-0 border-top-0">
                        <div class="table-responsive">
                            <div class="cart-table">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-30">
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
                                                                {{ $item->name }}
                                                            </td>
                                                            <td>${{ $item->price }}</td>
                                                            <td>
                                                                <div class="row h-100 justify-content-center">
                                                                    <form action="{{route('cart.update', $item->id)}}" method="POST">
                                                                        @csrf
                                                                        <div class="quantity">
                                                                            <input type="number" class="qty-text" id="qty2"step="1" min="1"
                                                                                onchange="this.form.submit()" max="99" name="quantity" style="width: 50px; text-align: center; border-radius: 3px; border: 1px solid rgb(228, 228, 228)"
                                                                                value="{{ $item->quantity }}">
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                {{
                                                                Cart::session(auth()->id())->get($item->id)->getPriceSum()
                                                                }}
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
