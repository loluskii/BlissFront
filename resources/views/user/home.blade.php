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

                    <h3>Your Dashboard</h3>
                    <div class="row mt-5">
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div
                                class="card border-left-primary shadow h-100 border-top-0 border-right-0 border-bottom-0">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold mb-1 lead">
                                                Total Orders</div>
                                            <div class="h5 mb-0 font-weight-bold text-muted">{{ $order_count }}</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div
                                class="card border-left-primary shadow h-100 border-top-0 border-right-0 border-bottom-0">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold mb-1 lead">
                                                Total Subscriptions</div>
                                            <div class="h5 mb-0 font-weight-bold text-muted">{{ $subscriptions->count() }}</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <h5>Personal Details</h5>
                            <div class="card">
                                <div class="card-body">
                                    <p class="lead mb-2">{{ Auth::user()->fname }} {{ Auth::user()->lname }}</p>
                                    <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row py-5">
                        <div class="col">
                            <h5>Active Subscriptions</h5>
                            @foreach ($subscriptions as $item)
                            <div class="card mb-3 border-0 shadow">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-10">
                                            <p class="lead mb-2">{{ $item->plan->name}}</p>
                                            <p class="text-muted mb-0">Expires {{ \Carbon\Carbon::parse($item->end_date)->format('M d, Y') }}</p>
                                        </div>
                                        <div class="col-auto mt-3">
                                            <a name="edit" class="btn btn-primary btn-sm rounded" href="#" role="button">View</a>
                                            <a name="edit" class="btn btn-danger btn-sm rounded" href="#" role="button">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
