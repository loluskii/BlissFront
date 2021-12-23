
@extends('admin.layouts.app')


@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Product Name</h1>
        <a href="{{ route('admin.category.delete', $category->id) }}" onclick="return confirm('Are you sure you want to delete this record?')" class="btn btn-sm btn-danger">Delete</a>

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
                                Total Products</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $products->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5>Products</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="products">
                            <thead>
                                <tr>
                                    <th> Image</th>
                                    <th>Product ID</th>
                                    <th>Name</th>
                                    {{-- <th>Category</th> --}}
                                    <th>Price</th>
                                    <th>Store Owner</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td><img src="{{ $product->cover_img }}" alt="" srcset="" style="height: 50px; width: 50px"></td>
                                    <td>{{ $product->product_ref }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>£{{ number_format($product->price, 2) }}</td>
                                    <td>{{ $product->store->name ?? 'Admin' }}</td>
                                    <td>
                                        @include('admin.products.product-action')
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

</div>
<!-- Button trigger modal -->


@endsection

@section('third_party_scripts')
<script>
$('#products').DataTable({
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


