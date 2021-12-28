@extends('admin.layouts.app')

@section('third_party_stylesheets')
<style>
    .invoice-title h2,
    .invoice-title h3 {
        display: inline-block;
    }

    .table>tbody>tr>.no-line {
        border-top: none;
    }

    .table>thead>tr>.no-line {
        border-bottom: none;
    }

    .table>tbody>tr>.thick-line {
        border-top: 2px solid;
    }
</style>
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Order {{ $order->order_number }}</h1>
        @if ($order->status == "pending")
        <a href="{{ route('admin.orders.update', $order->id) }}" class=" btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-check fa-sm text-white-50"></i> Mark as Completed</a>
        @else
        <button disabled class=" btn btn-sm btn-primary shadow-sm"><i class="fas fa-check fa-sm text-white-50"></i> Mark
            as Comleted</button>
        @endif
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Item Count</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $order->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Order Total</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">£{{ number_format($order->grand_total,2)
                                }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content Row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                {{-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Recent Orders</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                            aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div> --}}
                <div class="card-body text-dark">
                    <div class="">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between text-dark">
                                    <h3>Invoice</h2>
                                        <h5 class="pull-right">Order {{ $order->order_number }}
                                    </h3>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <address>
                                            <strong>Billed To:</strong><br>
                                            {{ $order->shipping_fname }} {{ $order->shipping_lname }}<br>
                                            {{ $order->shipping_address }}<br>
                                            {{ $order->shipping_state }}
                                        </address>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <address>
                                            <strong>Shipped To:</strong><br>
                                            {{ $order->shipping_fname }} {{ $order->shipping_lname }}<br>
                                            {{ $order->shipping_address }}<br>
                                            {{ $order->shipping_state }}
                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <address>
                                            <strong>Payment Method:</strong><br>
                                            {{ $order->user->pm_type }} **** {{ $order->user->pm_last_four }}<br>
                                            {{ $order->user->email }}
                                        </address>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <address>
                                            <strong>Order Date:</strong><br>
                                            {{ $order->created_at }}<br><br>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row pt-4">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><strong>Order summary</strong></h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-condensed text-dark">
                                                <thead>
                                                    <tr>
                                                        <td><strong>Item name</strong></td>
                                                        <td class="text-center"><strong>Quantity</strong></td>
                                                        <td class="text-center"><strong>Price</strong></td>
                                                        <td class="text-center"><strong>Totals</strong></td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- foreach ($order->lineItems as $line) or some such thing here -->

                                                    @foreach ($order->items as $item)
                                                    @php
                                                    $total = $item->pivot->quantity * $item->pivot->price;
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->pivot->quantity }}</td>
                                                        <td>{{ $item->pivot->price }}</td>
                                                        <td> {{ $total }}</td>
                                                    </tr>
                                                    @endforeach

                                                    <tr>
                                                        <td class="thick-line"></td>
                                                        <td class="thick-line"></td>
                                                        <td class="thick-line text-center"><strong>Subtotal</strong>
                                                        </td>
                                                        <td class="thick-line text-right">£{{
                                                            number_format($order->subtotal) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line text-center"><strong>Shipping</strong>
                                                        </td>
                                                        <td class="no-line text-right">£{{
                                                            number_format($order->delivery_total,2) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="no-line"></td>
                                                        <td class="no-line"></td>
                                                        <td class="no-line text-center"><strong>Total</strong></td>
                                                        <td class="no-line text-right">£{{
                                                            number_format($order->grand_total) }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
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

@section('third_party_scripts')
<script>
    $('#recentOrders').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": false,
    "info": true,
    "autoWidth": false,
    "responsive": true,
});
</script>


@endsection
