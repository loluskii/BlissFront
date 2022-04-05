@extends('layouts.app')


@section('css')
<style>
    .border-left-primary {
        border-left: 3px solid #2A707D;
    }
    .side-nav .active{
        border-left: 3px solid #2A707D;
    }
</style>
@endsection


@section('content')
<div class="container">
    <div class="row">
        @include('user.side-nav')
        <div class="col-md-9">
            <div class="card border-0">
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h3>Your Orders</h3>
                    <div class="row pt-3 pb-5">
                        <div class="col pl-0">
                            <div class=" mb-3 border-0 ">
                                <div class="card-body">
                                    <h5>Order {{ $order->order_number }}</h5>
                                    <p>These are the details of your order</p>
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->items as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->pivot->quantity }}</td>
                                                <td>{{ $item->pivot->price }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="flex pt-2">
                                    <a class="btn btn-primary btn-sm rounded" href="{{ route('user.my_orders') }}" role="button">Go Back</a>
                                    <a onclick="return confirm('Are you sure you want cancel this subscription ?')" id="" class="btn btn-danger btn-sm rounded" href="{{ route('subscription.delete', $subscription->id ) }}" role="button">Cancel Subscription</a>
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
