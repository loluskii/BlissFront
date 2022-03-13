@extends('admin.layouts.app')


@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pocket Money Orders</h1>
        {{-- <a href="#" class=" btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>
            Generate Report</a> --}}
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
                                Orders (Total)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $orders->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
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
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Recent Orders</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="recentOrders">
                            <thead>
                                <tr>
                                    <th>Sender Name</th>
                                    <th>Reciever Name</th>
                                    <th>Receiever Country</th>
                                    <th>Receiver Phone</th>
                                    <th>Frequency</th>
                                    <th>Bank Name</th>
                                    <th>Account Name</th>
                                    {{-- <th>Status</th>
                                    <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                <tr>
                                    <td>{{ $item->user->fname }} {{ $item->user->fname }}</td>
                                    <td>{{ $item->pm_fname }} {{ $item->pm_lname }}</td>
                                    <td>{{ $item->pm_country }}</td>
                                    <td>{{ $item->pm_phone_no }}</td>
                                    <td>{{ $item->plan }}</td>
                                    <td>{{ $item->pm_bank_name }}</td>
                                    <td>{{ $item->pm_acct_no }}</td>
                                    {{-- <td>{{ $item->status }}</td>
                                    <td><a href="{{ route('admin.orders.show', $item->id) }}"
                                            class="btn btn-primary btn-sm">View</a></td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
