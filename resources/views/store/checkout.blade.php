@extends('layouts.app')
@section('page')
Address Details
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<style>
    .checkbox-content {
        text-align: center;
        border-radius: 3px;
        box-shadow: 0 2px 4px 0 rgba(219, 215, 215, 0);
        border: solid 2px transparent;
        background: #fff;
        padding: 15px;
        transition: .3s ease-in-out all;
        height: 100%;
        min-width: 150px;
    }

    .checkbox-content img {
        width: 30%;
        margin: 0 auto;
    }

    .checkbox-label {
        position: relative;
        border: solid 1px #e3e3e3;
        border-radius: 3px;
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
        top: 10px;
        left: 10px;
        transition: .3s ease-in-out all;
        transform: scale(1);
        z-index: 1;
    }

    .checkbox-label .icon:before {
        content: "\f00c";
        position: absolute;
        width: 100%;
        height: 100%;
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        font-size: 5px;
        color: #000;
        text-align: center;
        opacity: 0;
        transition: .2s ease-in-out all;
        transform: scale(2);
    }

    .checkbox-label input:checked+.icon {
        background: #2A707D;
        border-color: #2A707D;
        transform: scale(1.2);
    }

    .checkbox-label input:checked+.icon:before {
        color: #fff;
        opacity: 1;
        transform: scale(.8);
    }

    .checkbox-label input:checked~.checkbox-content {
        box-shadow: 0 2px 4px 0 rgba(219, 215, 215, 0.5);
        border: solid 1px #2A707D;
    }
</style>
@endsection


@section('content')
<div class="checkout_area mb-5" style="min-height: 70vh">
    <div class="container">
        <form action="{{route('orders.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-9">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h2>Delivery Details</h2>
                        </div>
                        <div class="ibox-content p-0">
                            <div class="p-3">
                                <div class="checkout_details_area clearfix">
                                    <h6 class="mb-4">Please fill in your delivery details</h6>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="first_name">First Name</label>
                                            <input type="text" class="form-control" name="shipping_first_name"
                                                placeholder="First Name" value="" required="">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" class="form-control" name="shipping_last_name"
                                                placeholder="Last Name" value="" required="">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="street_address">Street address</label>
                                            <input type="text" class="form-control" name="shipping_street_address"
                                                placeholder="Street Address" value="">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="city">Town/City</label>
                                            <input type="text" class="form-control" name="shipping_city"
                                                placeholder="Town/City" value="">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="apartment_suite">Apartment/Suite/Unit</label>
                                            <input type="text" class="form-control" name="shipping_apartment_suite"
                                                placeholder="Apartment, suite, unit etc" value="">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="state">State</label>
                                            <input type="text" class="form-control" name="shipping_state"
                                                placeholder="State" value="">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="postcode">Postcode/Zip</label>
                                            <input type="text" class="form-control" name="shipping_postcode"
                                                placeholder="Postcode / Zip" value="">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="phone_number">Phone Number</label>
                                            <input type="number" class="form-control" name="shipping_phone_number"
                                                min="0" value="">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="country">Country</label>
                                            <select class="custom-select d-block w-100 form-control"
                                                name="shipping_country">
                                                <option value="usa">United States</option>
                                                <option value="uk">United Kingdom</option>
                                                <option value="ger">Germany</option>
                                                <option value="fra">France</option>
                                                <option value="ind">India</option>
                                                <option value="aus">Australia</option>
                                                <option value="bra">Brazil</option>
                                                <option value="cana">Canada</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="order-notes">Order Notes</label>
                                            <textarea class="form-control" name="order-notes" cols="30" rows="1"
                                                placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                        </div>
                                    </div>

                                    <!-- Different Shipping Address -->
                                    <div class="different-address mt-50">
                                        <hr class="my-4">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="not-same-address" class="custom-control-input"
                                                id="same-address">
                                            <label class="custom-control-label" for="same-address">Shipping address is
                                                not the same as my billing address</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="save-info" class="custom-control-input"
                                                id="save-info">
                                            <label class="custom-control-label" for="save-info">Save this information
                                                for next time</label>
                                        </div>
                                        {{--
                                        <hr class="my-4"> --}}
                                        <div class="row d-none shipping_input_field">
                                            <div class="col-md-12 mb-3">
                                                <label for="street_address">Street address</label>
                                                <input type="text" class="form-control" name="billing_address"
                                                    id="street-address" placeholder="Street Address" value="">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="apartment_suite">Apartment/Suite/Unit</label>
                                                <input type="text" class="form-control" name="billing_apartment_suite"
                                                    placeholder="Apartment, suite, unit etc" value="">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="city">Town/City</label>
                                                <input type="text" class="form-control" name="billing_city"
                                                    placeholder="Town/City" value="">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="state">State</label>
                                                <input type="text" class="form-control" name="billing_state"
                                                    placeholder="State" value="">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="postcode">Postcode/Zip</label>
                                                <input type="text" class="form-control" name="billing_postcode"
                                                    placeholder="Postcode / Zip" value="">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="phone_number">Phone Number</label>
                                                <input type="number" class="form-control" name="billing_phone_number"
                                                    min="0" value="">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="country">Country</label>
                                                <select class="custom-select d-block w-100 form-control"
                                                    id="ship-country">
                                                    <option value="usa">United States</option>
                                                    <option value="uk">United Kingdom</option>
                                                    <option value="ger">Germany</option>
                                                    <option value="fra">France</option>
                                                    <option value="ind">India</option>
                                                    <option value="aus">Australia</option>
                                                    <option value="bra">Brazil</option>
                                                    <option value="cana">Canada</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                @include('store.cart-summary')




            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="checkout_details_area clearfix">
                        <div class="payment_method">
                            <div class="ibox panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                <!-- Single Payment Method -->
                                <div class="panel panel-default">
                                    <div class=" ibox-title panel-heading" role="tab" id="one">
                                        <h5 class="panel-title">
                                            <a class="" role="button" data-toggle="collapse" data-parent="#accordion"
                                                href="#collapse_one" aria-expanded="true"
                                                aria-controls="collapse_one"><i class="fab fa-cc-mastercard"></i>
                                                Payment</a>
                                        </h5>
                                    </div>
                                    <div aria-expanded="false" id="collapse_one" class="panel-collapse collapse show"
                                        role="tabpanel" aria-labelledby="one" style="">
                                        <div class="ibox-content panel-body">
                                            <div class="pay_with_creadit_card">
                                                <p>Choose a payment method</p>
                                                <div class="row">
                                                    <div class="col-4 mb-3 justify-content-center">
                                                        <label class="checkbox-label w-100">
                                                            <input type="radio" value="stripe" name="payment">
                                                            <span class="icon"></span>
                                                            <div class="checkbox-content p-0">
                                                                {{-- <img class="mt-2 img img-fluid" src=""
                                                                    style="width:45px; height: 45px;"> --}}
                                                                <p class="mb-0" style="font-size: 13px;"><i
                                                                        class="fab fa-stripe fa-4x"></i></p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="col-4 mb-3 justify-content-center">
                                                        <label class="checkbox-label w-100">
                                                            <input type="radio" value="pay_on_delivery" name="payment">
                                                            <span class="icon"></span>
                                                            <div class="checkbox-content">
                                                                {{-- <img class="mt-2 img img-fluid" src=""
                                                                    style="width:45px; height: 45px;"> --}}
                                                                <h5 class="mb-0 font-weight-bold">Cash On Delivery</h5>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <p>Pick a Subscription Plan</p>
                                                <div class="row">
                                                    @foreach ($plans as $plan)
                                                        {{ $plan }}
                                                    @endforeach
                                                    <div class="col-3 mb-3 justify-content-center pr-0">
                                                        <label class="checkbox-label w-100">
                                                            <input type="radio" value="weekly" name="plan">
                                                            <span class="icon"></span>
                                                            <div class="checkbox-content text-center">
                                                                {{-- <img class="mt-2 img img-fluid" src=""
                                                                    style="width:45px; height: 45px;"> --}}
                                                                <h3>Weekly</h3>
                                                                <p class="mb-0"> Your cart contents will be delivered to
                                                                    you every week </p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="col-3 mb-3 justify-content-center pr-0">
                                                        <label class="checkbox-label w-100">
                                                            <input type="radio" value="monthly" name="plan">
                                                            <span class="icon"></span>
                                                            <div class="checkbox-content">
                                                                {{-- <img class="mt-2 img img-fluid" src=""
                                                                    style="width:45px; height: 45px;"> --}}
                                                                <h3>Monthly</h3>
                                                                <p>Your cart contents will be delivered to you every
                                                                    month</p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="col-3 mb-3 justify-content-center pr-0">
                                                        <label class="checkbox-label w-100">
                                                            <input type="radio" value="3_monthly" name="plan">
                                                            <span class="icon"></span>
                                                            <div class="checkbox-content">
                                                                {{-- <img class="mt-2 img img-fluid" src=""
                                                                    style="width:45px; height: 45px;"> --}}
                                                                <h3>Every 3 Months</h3>
                                                                <p>Your cart contents will be delivered to you every 3
                                                                    months</p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div class="col-3 mb-3 justify-content-center">
                                                        <label class="checkbox-label w-100">
                                                            <input type="radio" value="6_monthly" name="plan">
                                                            <span class="icon"></span>
                                                            <div class="checkbox-content">
                                                                {{-- <img class="mt-2 img img-fluid" src=""
                                                                    style="width:45px; height: 45px;"> --}}
                                                                <h3>Every 6 Months</h3>
                                                                <p>Your cart contents will be delivered to you every 6
                                                                    months</p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                    {{-- <div class="col-12 mb-3">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="customCheck1">
                                                            <label class="custom-control-label"
                                                                for="customCheck1">Credit or Debit Card</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 mb-3">
                                                        <label for="cardNumber">Card Number</label>
                                                        <input type="text" class="form-control" id="cardNumber"
                                                            placeholder="" value="" required="">
                                                        <small id="card_info_store" class="form-text text-muted"><i
                                                                class="fa fa-lock" aria-hidden="true"></i> Your payment
                                                            info is stored securely. <a href="#">Learn More</a></small>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-3">
                                                        <label for="expiration">Expiration</label>
                                                        <input type="text" class="form-control" id="expiration"
                                                            placeholder="MM / YY" value="" required="">
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-3">
                                                        <label for="security_code">Security Code <a href="#"
                                                                class="security_code_popover" data-container="body"
                                                                data-toggle="popover" data-placement="top"
                                                                data-content="" data-img="img/bg-img/cvc.jpg"
                                                                data-original-title="" title=""> <i
                                                                    class="fa fa-question-circle"
                                                                    aria-hidden="true"></i></a></label>
                                                        <input type="text" class="form-control" id="security_code"
                                                            placeholder="" value="" required="">
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div> --}}
                                                </div>
                                            </div>
                                            <hr class="my-4">
                                            <div class="col-12">
                                                <div class="checkout_pagination d-flex justify-content-end mt-50">
                                                    <a href="checkout-1.html" class="btn btn-primary mt-2 ml-2">Go
                                                        Back</a>
                                                    <button type="submit"
                                                        class="btn btn-primary mt-2 ml-2">Continue</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('more_scripts')
<script>
    $(document).ready(function(){
    $('input[name=not-same-address]').click(function(){
        window.alert();
        if($(this).prop("checked") == true){
            $('.shipping_input_field').removeClass('d-none');
        }
        else if($(this).prop("checked") == false){
            $('.shipping_input_field').addClass('d-none');
        }
    });
});
</script>
@endpush
