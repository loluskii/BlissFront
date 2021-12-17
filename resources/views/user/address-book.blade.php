@extends('layouts.app')


@section('css')
<style>
    .border-left-primary {
        border-left: 3px solid #2A707D;
    }

    .side-nav .active {
        border-left: 3px solid #2A707D;
    }
    .right{
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
                    <div class="col-8 pl-0 my-5">
                        {{-- <p>You have no saved addresses.</p> --}}
                        {{-- <a class="btn btn-primary mb-4" href="#" role="button">Add New Address</a> --}}
                        @if ($address->count() > 0)
                            @foreach ($address as $item)
                                <div class="card">
                                    <div class="card-body">
                                        <h6>{{ $item->shipping_fname }} {{ $item->shipping_lname }}</h6>
                                        <p class="mb-1">{{ $item->shipping_address }}</p>
                                        <p class="mb-0">{{ $item->shipping_phone }}</p>
                                    </div>

                                    <div class="card-footer"><small>{{ $item->is_default ? 'This is your default address' : '' }}</small></div>
                                </div>
                            @endforeach
                        @else
                            <p>You have no saved addresses.</p>
                            <a class="btn btn-primary" href="#" role="button">Add New Address</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
