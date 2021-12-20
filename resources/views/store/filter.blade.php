<div class="col-sm-4 col-md-3">
    <div class="border-0">
        <div class="card-body pb-0">
            <form class="shop__filter" action="{{ URL::current() }}" method="GET">
                <div class="mb-4">
                    <h4 class="headline pb-3">
                        <span>Categories</span>
                    </h4>
                    @if ($categories->count() > 0)
                        @foreach ($categories as $category)
                            @php
                                $checked = [];
                                if(isset($_GET['category'])){
                                    $checked = $_GET['category'];
                                }
                            @endphp
                            <label class="checkbox-label w-100 shadow-sm">
                                <input type="checkbox" value="{{ $category->id }}" name="category[]"
                                    @if (in_array($category->id, $checked))
                                        checked
                                    @endif
                                />
                                <span class="icon"></span>
                                <div class="checkbox-content p-3">
                                    <h6 class="font-weight-bold mb-0">{{ $category->name }}</h6>
                                </div>
                            </label>
                        @endforeach
                    @else
                        <p>No Categories available</p>
                    @endif
                </div>
                <!-- Radios -->
                <h4 class="headline">
                    <span>Brands</span>
                </h4>
                @if ($stores->count() > 0)
                @foreach ($stores as $store)
                <label class="containers">{{ $store->name }}
                    <input type="checkbox" value="{{ $store->id }}" id="{{ $store->slug }}" name="store[]">
                    <span class="checkmark"></span>
                </label>
                @endforeach
                @else
                <p>No Stores Available</p>
                @endif
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary btn-block">Filter</button>
                </div>
            </form>
        </div>
    </div>
</div>
