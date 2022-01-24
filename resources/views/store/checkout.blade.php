@extends('layouts.app')
@section('page')
Address Details
@endsection

@section('css')
<link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
<style>
    .checkbox-content {
        text-align: center;
        border-radius: 3px;
        box-shadow: 0 2px 4px 0 rgba(219, 215, 215, 0);
        border: solid 2px transparent;
        background: #fff;
        padding: 10px;
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
        color: #2A707D;
    }
</style>
@endsection


@section('content')
<div class="checkout_area mb-5" style="min-height: 70vh">
    <div class="container">
        <form action="{{route('orders.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h2>Delivery Details</h2>
                        </div>
                        <div class="ibox-content p-0">
                            <div class="px-3 pt-3">
                                <div class="checkout_details_area clearfix">

                                    @if ($address != null)
                                        <div class="d-flex justify-content-between">
                                            <h6 class="font-weight-bold mb-2">Address Details</h6>
                                            <a data-toggle="modal" data-target="#modelId" role="button" class="btn btn-sm d-none d-md-block">Change Address</a>
                                            <a data-toggle="modal" data-target="#modelId"  class="d-md-none d-sm-block btn btn-primary btn-sm"><i class="fa fa-pen"></i></a>
                                        </div>
                                        <div class="card mt-2">
                                            <div class="card-body pb-0">
                                                <input type="hidden" name="address_id" value="{{ $address->id }}">
                                                <h3 class="font-weight-bold">{{ $address->shipping_fname }} {{ $address->shipping_lname }}</h3>
                                                <p class="mb-1">{{ $address->shipping_address }}, {{ $address->shipping_city }}, {{ $address->shipping_state }}</p>
                                                <p>{{ $address->shipping_phone }}</p>
                                            </div>
                                        </div>


                                    @else
                                        <h6 class="font-weight-bold mb-3">Please fill in your address details</h6>
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
                                                <label for="apartment_suite">Landmark</label>
                                                <input type="text" class="form-control" name="shipping_landmark"
                                                    placeholder="Landmark/ Bank Account" value="">
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
                                        </div>
                                    @endif
                                    {{--
                                    <hr> --}}
                                    <div class="pay_with_creadit_card pt-4">
                                        <h3 class="font-weight-bold">Pick a Subscription Plan</h3>
                                        <div class="row pt-3">
                                            @foreach ($plans as $plan)
                                            <div class="col-md-4 mb-2">
                                                <label class="checkbox-label w-100" id="planbox">
                                                    <input type="radio" value="{{ $plan->slug }}" name="plan">
                                                    <input type="hidden" id="count" value="{{ $plan->interval_count }}">
                                                    <span class="icon d-none"></span>
                                                    <div class="checkbox-content text-center">

                                                        <h6 class="font-weight-bold">{{ $plan->name }}</h6>
                                                        <small class="mb-0"> {{ $plan->description }} </small>
                                                    </div>
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col-12 pb-4">
                                <div class="checkout_pagination d-flex justify-content-end ">
                                    <a href="checkout-1.html" class="btn btn-primary mt-2 ml-2">Go
                                        Back</a>
                                    <button type="submit" class="btn btn-primary mt-2 ml-2 px-4">Continue</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('store.cart-summary')
            </div>
        </form>
    </div>
</div>
@if ($address != null)
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Shipping Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('cart.address.update', $address->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="street_address">First Name</label>
                                <input type="text" class="form-control" name="shipping_fname" placeholder="First Name"
                                    value="{{ $address->shipping_fname }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="city">Last Name</label>
                                <input type="text" class="form-control" name="shipping_lname" placeholder="Last Name"
                                    value="{{ $address->shipping_lname }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="street_address">Street address</label>
                                <input type="text" class="form-control" name="shipping_address"
                                    placeholder="Street Address" value="{{ $address->shipping_address }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="city">Town/City</label>
                                <input type="text" class="form-control" name="shipping_city" placeholder="Town/City"
                                    value="{{ $address->shipping_city}}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="apartment_suite">Landmark</label>
                                <input type="text" class="form-control" name="shipping_landmark"
                                    placeholder="Apartment, suite, unit etc" value="{{ $address->shipping_landmark}}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="state">State</label>
                                <input type="text" class="form-control" name="shipping_state" placeholder="State"
                                    value="{{ $address->shipping_state}}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="postcode">Postcode/Zip</label>
                                <input type="text" class="form-control" name="shipping_zipcode"
                                    placeholder="Postcode / Zip" value="{{ $address->shipping_zipcode}}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone_number">Phone Number</label>
                                <input type="number" class="form-control" name="shipping_phone" min="0"
                                    value="{{ $address->shipping_phone}}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endif
@endsection

@push('more_scripts')

@endpush
