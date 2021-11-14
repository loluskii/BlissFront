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
                <span class="text-muted">Subtotal </span>
            <h2 class="font-bold">£<span id="cart_total">{{ Cart::session(auth()->id())->getTotal()}}</span> </h2>
            <small>Please note delivery fee is £1.99 per month</small>
            </div>
            <hr>
            @if ($cartTotalQuantity > 0)
            <a href="{{ route('store.show')}}" class="btn btn-primary btn-block"> Continue shopping</a>
            @endif
        </div>
    </div>
</div>
