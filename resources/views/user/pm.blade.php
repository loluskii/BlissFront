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

    .row-1 {
        border: 1px solid rgba(0, 0, 0, 0.137);
        padding: 0.5rem;
        outline: none;
        width: 100%;
        min-width: unset;
        border-radius: 5px;
        background-color: rgba(221, 228, 236, 0.301);
        border-color: rgba(221, 228, 236, 0.459);
        margin: 2vh 0;
        overflow: hidden
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
                    <h3>Your Payment Methods</h3>
                    <p>Feel free to edit any of your details below so your account is totally up to date.</p>
                    <div class="row">
                        <div class="col-8">
                            <div class="row row-1 justify-content-between align-items-center justify-content-center">
                                @if ($defaultPaymentMethod->card->brand == 'mastercard')
                                <img class="img-fluid" src="{{ secure_asset('images/mc_vrt_pos.svg') }}"
                                    style="height: 60px" />
                                @else
                                <i class="fab fa-cc-visa fa-3x" aria-hidden="true"></i>
                                @endif
                                <div class="col">
                                    <p class="mb-0 font-weight-bold">{{ $defaultPaymentMethod->billing_details->name }}
                                    </p>
                                    <small class="mb-0">**** {{ $defaultPaymentMethod->card->last4 }} | {{
                                        $defaultPaymentMethod->card->exp_month }}/{{
                                        $defaultPaymentMethod->card->exp_year }}</small>
                                </div>
                                <span class="badge badge-primary p-2">Default</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 pl-0 pt-3 pb-5">
                        <h5>Other Payment Methods</h5>

                        @foreach ($paymentMethods as $item)
                        <div class="row row-1 justify-content-between align-items-center justify-content-center">
                            @if ($item->card->brand == 'mastercard')
                            <img class="img-fluid" src="{{ secure_asset('images/mc_vrt_pos.svg') }}"
                                style="height: 60px" />
                            @else
                            <i class="fab fa-cc-visa fa-3x" aria-hidden="true"></i>
                            @endif
                            <div class="col">
                                <p class="mb-0 font-weight-bold">{{ $item->billing_details->name }}</p>
                                <small class="mb-0">**** {{ $item->card->last4 }} | {{ $item->card->exp_month }}/{{
                                    $item->card->exp_year }}</small>
                            </div>
                            <small><b>Remove Card</b></small>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
