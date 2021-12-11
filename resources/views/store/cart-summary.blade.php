<div class="col-md-4">
    <div class="ibox">
        <div class="ibox-title">
            <h4>Cart Summary</h4>
        </div>
        <div class="ibox-content border-top-0">
            @if ($cartItems->count() > 0)
            @foreach ($cartItems as $item)
            <div class="px-1 py-3 border-bottom">
                <div class="row">
                    <div class="col-3">
                        <span>{{$item->quantity}}x</span>
                    </div>
                    <div class="col-5">
                        <span>{{ $item->name }}</span>
                    </div>
                    <div class="col-4">
                        <span>£{{ $item->price }}</span>
                    </div>
                </div>
                {{-- <p>x{{$item->quantity}}</p>
                <h6>{{ $item->name }}</h6>
                <small class="mb-0">${{ $item->price}} </small> --}}
            </div>
            @endforeach
            <div class="mt-2">
                <span class="text-muted">Subtotal </span>
                <h2 class="font-bold">£<span id="cart_total">{{ Cart::session(auth()->id())->getTotal()}}</span> </h2>
                <small>Note delivery fee is £1.99 per month</small>
            </div>
            @else
            <div class="text-center">
                <img src="{{ secure_asset('images/empty-cart.svg') }}" class="img-fluid mb-4" srcset="">
                <small>You have not added any items to your cart! When you do, you'll see them here!</small>
            </div>
            @endif
        </div>
    </div>
</div>
