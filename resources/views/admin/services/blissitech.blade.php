@extends('admin.layouts.app')


@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Blissitech Hub Enquiries</h1>

    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Enquiries (Total)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $bookings->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">All Enquiries</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-striped" id="usersTable">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php

                            @endphp
                                @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->name }}
                                        <td>{{ $booking->email }}</td>
                                        <td>{{ $booking->message }}</td>
                                        <td>{{ $booking->created_at }}</td>
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
    $('#usersTable').DataTable({
    "paging": true,

    // "responsive": true,
});
</script>

@endsection
