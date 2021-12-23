@extends('admin.layouts.app')


@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Stores</h1>
        <a data-toggle="modal" data-target="#newProduct"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add Store</a>
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
                                Total Stores</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stores->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="stores">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>No. of Products</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stores as $store)
                                <tr>
                                    <td>{{ $store->name }}</td>
                                    <td>{{ $store->products->count() }}</td>
                                    <td>{{ $store->city }}</td>
                                    <td>{{ $store->state }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ route('admin.stores.view', $store->id) }}" role="button">View</a>
                                        <a data-toggle="modal" data-target="#newStore{{ $store->id }}" class="btn btn-info btn-sm" href="#" role="button">Edit</a>
                                        <div class="modal fade" id="newStore{{ $store->id }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">New Store</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('admin.store.update', $store->id) }}" method="POST" class="form" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="">Name</label>
                                                                <input type="text" name="name" class="form-control" value="{{ $store->name }}"
                                                                    required aria-describedby="helpId">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">City</label>
                                                                <input type="text" name="city" class="form-control" value="{{ $store->city }}"
                                                                    aria-describedby="helpId">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">State</label>
                                                                <input type="text" name="state" class="form-control" value="{{ $store->state }}" required
                                                                    aria-describedby="helpId">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="newProduct" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Store</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.store.create') }}" method="POST" class="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" placeholder=""
                            required aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="">City</label>
                        <input type="text" name="city" class="form-control" placeholder="" required
                            aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="">State</label>
                        <input type="text" name="state" class="form-control" placeholder="" required
                            aria-describedby="helpId">
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


@endsection

@section('third_party_scripts')
<script>
    $('#stores').DataTable({
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
