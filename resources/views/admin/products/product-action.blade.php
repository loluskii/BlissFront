

<a data-toggle="modal" data-target="#editProduct-{{ $product->product_ref }}" class="btn btn-sm btn-info">Edit</a>
<a href="{{ route('admin.product.delete', $product->id) }}" onclick="return confirm('Are you sure you want to delete this record?')" class="btn btn-sm btn-danger">Delete</a>


<div class="modal fade" id="editProduct-{{ $product->product_ref }}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.product.update', $product->id) }}" method="POST" class="form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Product Image</label>
                        <input type="file" name="featured_image" accept="image/*" id="imgInp" class="form-control-file featured_image">
                        {{-- <div class="upload">
                            <div class="col my-auto text-center">
                                <img src="{{secure_asset($newImage)}}"
                                    class="img-fluid" srcset="">
                                <p class="text-center">Edit</p>
                            </div>
                        </div>
                        <div class="py-2">
                            <img src="" alt="preview" class="img-fluid" id="preview">
                        </div> --}}
                    </div>
                    <div class="form-group">
                        <label for="">Product Name</label>
                        <input type="text" name="product_name" class="form-control" value="{{ $product->name }}" required aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" name="price" class="form-control" value="{{ $product->price }}" required
                            aria-describedby="helpId">
                    </div>
                    @if (request()->is('admin/products'))
                    <div class="form-group">
                        <label for="">Select Category</label>
                        <select class="form-control" name="category">
                          {{-- <option value="{{ $product->category_id }}">{{ $product->category->name }}</option> --}}
                          @foreach ($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Select Store</label>
                        <select class="form-control" name="category">
                          {{-- <option value="{{ $product->category_id }}">{{ $product->category->name }}</option> --}}
                          @foreach ($stores as $store)
                              <option value="{{ $store->id }}">{{ $store->name }}</option>
                          @endforeach
                        </select>
                    </div>
                    @else

                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $('#preview').hide();
    $('.upload').click(function(){ $('.featured_image').trigger('click'); });
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            preview.src = URL.createObjectURL(file);
            $('#preview').show();
            $('.upload').css('display','none');
            // console.log()
        }
    }
</script>
