<div class="col-md-4">
    <div class="ibox">
        <div class="ibox-title">
            <h5>Cart Summary</h5>
        </div>
        <div class="ibox-content">
            @foreach ($cartItems as $item)
            <div class="px-1 py-2 border-bottom">
                <h6><b>{{ $item->name }}</b> x{{$item->quantity}}</h6>
                <small class="mb-0">${{ $item->price}} </small>
            </div>
            @endforeach
            <div class="mt-2">
                <span class="text-muted"> Total </span>
            <h2 class="font-bold"> ${{ Cart::session(auth()->id())->getTotal()}} </h2>
            </div>
            <hr>
            @if ($cartTotalQuantity > 0)
            <a href="{{ route('store.show')}}" class="btn btn-primary btn-block"> Continue shopping</a>
            @endif
        </div>
    </div>
</div>
