@extends('admin.layouts.app')

@push('page_css')
<style>
    .table>tbody>tr>.thick-line {
        border-top: 2px solid;
    }

    .table>tbody>tr>.thick-line2 {
        border-top: 2px solid;
        border-bottom: 2px solid;
    }
</style>
@endpush

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User's Information</h1>
        @if ($user->active == 1)
        <a href="{{ route('admin.users.blockuser', $user->id) }}" class=" btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-ban fa-sm text-white-50"></i> Block User</a>
        @else
        <a href="{{ route('admin.users.unblock', $user->id) }}" class=" btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-ban fa-sm text-white-50"></i> Unblock User</a>
        @endif
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body py-2 pr-1">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Personal Details</div>
                            <div class="font-weight-bold mb-0 text-uppercase text-gray-800">{{ $user->fname }} {{
                                $user->lname }}</div>
                            <div class="text-gray-800" style="font-size: small"><span
                                    class="font-weight-bold">Email:</span> {{ $user->email }}</div>
                            <div class="text-gray-800" style="font-size: small"><span class="font-weight-bold">Phone
                                    No:</span> {{ $user->phone_number }}</div>
                        </div>
                        {{-- <div class="col-auto">
                            <i class="fas fa-bed fa-2x text-gray-300"></i>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Orders (Total)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $user->orders->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Currently Subscribed to</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $no_of_subs }} Plans</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @if (count($users_order) > 0)
    @foreach ($users_order as $order)
    <div class="row mb-3">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Order {{ $order->order_number }}</h6>
                    <h6>Date: {{ $order->created_at }}</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="usersTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Totals</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                    <td class="thick-line text-right">£{{ number_format($order->subtotal,2) }}</td>
                                </tr>
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Shipping</strong>
                                    </td>
                                    <td class="no-line text-right">£{{ number_format($order->delivery_total,2) }}</td>
                                </tr>
                                <tr>
                                    <td class="thick-line2"></td>
                                    <td class="thick-line2"></td>
                                    <td class="thick-line2 text-center"><strong>Total</strong></td>
                                    <td class="thick-line2 text-right">£{{ number_format($order->grand_total,2) }}</td>
                                </tr>
                            </tbody>
                        </table>

                        {{-- @else --}}
                        {{-- <span class="text-center">Nothing To Display.</span> --}}
                        {{-- @endif --}}
                    </div>

                </div>
            </div>
        </div>

    </div>
    @endforeach
    @else
    <div class="row mb-3">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">No Orders</h6>
                    {{-- <h6>Date: {{ $order->created_at }}</h6> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="usersTabl">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Totals</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                        {{-- @else --}}
                        {{-- <span class="text-center">Nothing To Display.</span> --}}
                        {{-- @endif --}}
                    </div>

                </div>
            </div>
        </div>

    </div>

    @endif



</div>
@endsection

@section('third_party_scripts')
<script>
    $('#usersTabl').DataTable({
    "paging": true,

    // "responsive": true,
});
</script>

@endsection
