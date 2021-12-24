@extends('admin.layouts.app')

@section('third_party_stylesheets')
<style>
    #preview {
        height: 250px;
        width: 250px;
        object-fit: cover;
    }

    #imgInp {
        display: none;
    }

    .upload {
        display: flex;
        border: 2px solid #ECEEEE;
        background-color: transparent;
        height: 150px;
        width: 174px;
        border-radius: 8px;
        align-items: center;
        font-size: 13px;
        cursor: pointer;
    }

</style>
@endsection

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Products</h1>
        <a data-toggle="modal" data-target="#newProduct"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add Product</a>
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

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Orders (Total)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ 0 }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="products">
                        <thead>
                            <tr>
                                <th> Image</th>
                                <th>Product ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Store Owner</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            @php
                            $newImage = 'images/products/'.$product->cover_img;
                            @endphp
                            <tr>
                                <td><img src="{{ secure_asset($newImage) }}" alt="" srcset="" style="height: 30px; width: 30px"></td>
                                <td>{{ $product->product_ref }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name ?? 'No Category' }}</td>
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

<div class="modal fade" id="newProduct" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.product.store') }}" method="POST" class="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Product Image</label>
                        <input type="file" class="form-control-file" name="product_image" id="" placeholder=""
                            aria-describedby="fileHelpId">
                    </div>
                    <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="text" name="product_name" class="form-control" placeholder=""
                            required aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" name="price" class="form-control" placeholder="" required
                            aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                      <label for="">Select Category</label>
                      <select class="form-control" name="category">
                        <option value="">Select one</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea class="form-control" name="desc" required id="exampleFormControlTextarea1"
                            rows="2"></textarea>
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
