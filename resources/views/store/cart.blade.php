@extends('layouts.store.main')
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
<div class="container">
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
                                <div class="table-responsive">
                                    <table class="table table-striped mb-30">
                                        <thead>
                                            <tr>
                                                <th scope="col">Product</th>
                                                <th scope="col">Unit Price</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a href="#">Bluetooth Speaker</a>
                                                </td>
                                                <td>$9</td>
                                                <td>
                                                    <div class="quantity">
                                                        <input type="number" class="qty-text" id="qty2" step="1" min="1"
                                                            max="99" name="quantity" value="1">
                                                    </div>
                                                </td>
                                                <td>$9</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="#">Roof Lamp</a>
                                                </td>
                                                <td>$11</td>
                                                <td>
                                                    <div class="quantity">
                                                        <input type="number" class="qty-text" id="qty3" step="1" min="1"
                                                            max="99" name="quantity" value="1">
                                                    </div>
                                                </td>
                                                <td>$11</td>
                                            </tr>
                                            <tr>


                                                <td>
                                                    <a href="#">Cotton T-shirt</a>
                                                </td>
                                                <td>$6</td>
                                                <td>
                                                    <div class="quantity">
                                                        <input type="number" class="qty-text" id="qty4" step="1" min="1"
                                                            max="99" name="quantity" value="1">
                                                    </div>
                                                </td>
                                                <td>$6</td>
                                            </tr>
                                            <tr>


                                                <td>
                                                    <a href="#">Water Bottle</a>
                                                </td>
                                                <td>$17</td>
                                                <td>
                                                    <div class="quantity">
                                                        <input type="number" class="qty-text" id="qty5" step="1" min="1"
                                                            max="99" name="quantity" value="1">
                                                    </div>
                                                </td>
                                                <td>$17</td>
                                            </tr>
                                            <tr>


                                                <td>
                                                    <a href="#">Alka Sliper</a>
                                                </td>
                                                <td>$13</td>
                                                <td>
                                                    <div class="quantity">
                                                        <input type="number" class="qty-text" id="qty6" step="1" min="1"
                                                            max="99" name="quantity" value="1">
                                                    </div>
                                                </td>
                                                <td>$13</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end ibox-content">
                        <button class="btn btn-white"><i class="fa fa-arrow-left"></i> Continue shopping</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Cart Summary</h5>
                    </div>
                    <div class="ibox-content">
                        <span> Total </span>
                        <h2 class="font-bold"> $390,00 </h2>
                        <hr>
                        <a href="{{ route('billing') }}" class="btn btn-primary btn-block">Proceed to Checkout</a> <br>
                        <small class="text-muted small">
                            *For United States, France and Germany applicable sales tax will be applied
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
