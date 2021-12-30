@extends('layouts.app')


@section('css')
<style>
    .border-left-primary {
        border-left: 3px solid #2A707D;
    }

    .side-nav .active {
        border-left: 3px solid #2A707D;
    }

    .right {
        height: 80%;
    }
</style>
@endsection


@section('content')
<div class="container">
    <div class="row vh-100">
        @include('user.side-nav')
        <div class="col-md-9">
            <div class="card border-0 right">
                <div class="card-body">
                    <h3>Your Address Book</h3>
                    <p>Feel free to edit as you wish so your account is up to date.</p>
                    <div class=" pl-3 my-5">
                        {{-- <p>You have no saved addresses.</p> --}}
                        {{-- <a class="btn btn-primary mb-4" href="#" role="button">Add New Address</a> --}}
                        <div class="row">
                            @if ($address->count() > 0)
                            @foreach ($address as $item)
                            <div class="col-md-6 mb-3">
                                <div class="card shadow-sm bord">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-1">
                                            <h6 class="font-weight-bold">{{ $item->shipping_fname }} {{
                                                $item->shipping_lname }}</h6>
                                            <div class="">
                                                <a href="" data-toggle="modal" data-target="#edit{{ $item->id }}"
                                                    class="btn btn-info btn-sm text-white">Edit</a>
                                                <a href="{{ route('user.address.delete', $item->id) }}"
                                                    class="btn btn-danger btn-sm">Delete</a>
                                            </div>

                                        </div>
                                        <small class="mb-1">{{ $item->shipping_address }}, {{ $item->shipping_city }},
                                            {{ $item->shipping_state }}</small>
                                        <p class="mb-0">{{ $item->shipping_phone }}</p>
                                    </div>
                                </div>
                            </div>
                            @include('user.address-action')
                            @endforeach


                            @else
                            <p>You have no saved address. <button class="btn btn-primary" data-toggle="modal"
                                    data-target="#modelId" role="button">Add </button></p>

                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->


<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add a new address</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.new.address') }}" method="post">
                    @csrf
                    <div class="checkout_details_area clearfix">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="street_address">First Name</label>
                                <input type="text" class="form-control" name="shipping_fname" placeholder="First Name"
                                    value="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="city">Last Name</label>
                                <input type="text" class="form-control" name="shipping_lname" placeholder="Last Name"
                                    value="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="street_address">Street address</label>
                                <input type="text" class="form-control" name="shipping_street_address"
                                    placeholder="Street Address" value="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="city">Town/City</label>
                                <input type="text" class="form-control" name="shipping_city" placeholder="Town/City"
                                    value="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="apartment_suite">Landmark</label>
                                <input type="text" class="form-control" name="shipping_landmark"
                                    placeholder="Apartment, suite, unit etc" value="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="state">State</label>
                                <input type="text" class="form-control" name="shipping_state" placeholder="State"
                                    value="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="postcode">Postcode/Zip</label>
                                <input type="text" class="form-control" name="shipping_postcode"
                                    placeholder="Postcode / Zip" value="">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone_number">Phone Number</label>
                                <input type="number" class="form-control" name="shipping_phone_number" min="0" value="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer pb-0">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>


            </div>

        </div>
    </div>
</div>
@endsection
