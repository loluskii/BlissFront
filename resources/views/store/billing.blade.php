@extends('layouts.store.main')
@section('page')
Address Details
@endsection

@section('css')
{{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
@endsection


@section('content')
<div class="checkout_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="checkout_details_area clearfix">
                    <h5 class="mb-4">Billing Details</h5>
                    <form action="#" method="post">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" placeholder="First Name" value="" required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" placeholder="Last Name" value="" required="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email_address">Email Address</label>
                                <input type="email" class="form-control" id="email_address" placeholder="Email Address" value="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone_number">Phone Number</label>
                                <input type="number" class="form-control" id="phone_number" min="0" value="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="country">Country</label>
                                <select class="custom-select d-block w-100 form-control" id="country">
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
                            <div class="col-md-6 mb-3">
                                <label for="street_address">Street address</label>
                                <input type="text" class="form-control" id="street_address" placeholder="Street Address" value="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="apartment_suite">Apartment/Suite/Unit</label>
                                <input type="text" class="form-control" id="apartment_suite" placeholder="Apartment, suite, unit etc" value="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="city">Town/City</label>
                                <input type="text" class="form-control" id="city" placeholder="Town/City" value="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="state">State</label>
                                <input type="text" class="form-control" id="state" placeholder="State" value="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="postcode">Postcode/Zip</label>
                                <input type="text" class="form-control" id="postcode" placeholder="Postcode / Zip" value="">
                            </div>
                            <div class="col-md-12">
                                <label for="order-notes">Order Notes</label>
                                <textarea class="form-control" id="order-notes" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                            </div>
                        </div>

                        <!-- Different Shipping Address -->
                        <div class="different-address mt-50">
                            <div class="ship-different-title mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Ship to a different address?</label>
                                </div>
                            </div>
                            <div class="row d-none shipping_input_field">
                                <div class="col-md-6 mb-3">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first-name" placeholder="First Name" value="" required="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="last-name" placeholder="Last Name" value="" required="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="company">Company Name</label>
                                    <input type="text" class="form-control" id="ship-company" placeholder="Company Name" value="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email_address">Email Address</label>
                                    <input type="email" class="form-control" id="email-address" placeholder="Email Address" value="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="number" class="form-control" id="phone-number" min="0" value="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="country">Country</label>
                                    <select class="custom-select d-block w-100 form-control" id="ship-country">
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
                                <div class="col-md-12 mb-3">
                                    <label for="street_address">Street address</label>
                                    <input type="text" class="form-control" id="street-address" placeholder="Street Address" value="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="apartment_suite">Apartment/Suite/Unit</label>
                                    <input type="text" class="form-control" id="apartment-suite" placeholder="Apartment, suite, unit etc" value="">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="city">Town/City</label>
                                    <input type="text" class="form-control" id="ship-city" placeholder="Town/City" value="">
                                </div>
                                <div class="col-md-6">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control" id="ship-state" placeholder="State" value="">
                                </div>
                                <div class="col-md-6">
                                    <label for="postcode">Postcode/Zip</label>
                                    <input type="text" class="form-control" id="ship-postcode" placeholder="Postcode / Zip" value="">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-12">
                <div class="checkout_pagination d-flex justify-content-end mt-50">
                    <a href="checkout-1.html" class="btn btn-primary mt-2 ml-2">Go Back</a>
                    <a href="checkout-3.html" class="btn btn-primary mt-2 ml-2">Continue</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="checkout_details_area clearfix">
                    <div class="payment_method">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <!-- Single Payment Method -->
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="one">
                                    <h6 class="panel-title">
                                        <a class="" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_one" aria-expanded="true" aria-controls="collapse_one"><i class="icofont-mastercard-alt"></i> Pay with Credit Card</a>
                                    </h6>
                                </div>
                                <div aria-expanded="false" id="collapse_one" class="panel-collapse collapse show" role="tabpanel" aria-labelledby="one" style="">
                                    <div class="panel-body">
                                        <div class="pay_with_creadit_card">
                                            <form action="#" method="post">
                                                <div class="row">
                                                    <div class="col-12 mb-3">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                            <label class="custom-control-label" for="customCheck1">Credit or Debit Card</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 mb-3">
                                                        <label for="cardNumber">Card Number</label>
                                                        <input type="text" class="form-control" id="cardNumber" placeholder="" value="" required="">
                                                        <small id="card_info_store" class="form-text text-muted"><i class="fa fa-lock" aria-hidden="true"></i> Your payment info is stored securely. <a href="#">Learn More</a></small>
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-3">
                                                        <label for="expiration">Expiration</label>
                                                        <input type="text" class="form-control" id="expiration" placeholder="MM / YY" value="" required="">
                                                    </div>
                                                    <div class="col-12 col-md-3 mb-3">
                                                        <label for="security_code">Security Code <a href="#" class="security_code_popover" data-container="body" data-toggle="popover" data-placement="top" data-content="" data-img="img/bg-img/cvc.jpg" data-original-title="" title=""> <i class="fa fa-question-circle" aria-hidden="true"></i></a></label>
                                                        <input type="text" class="form-control" id="security_code" placeholder="" value="" required="">
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
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
</div>
@endsection
