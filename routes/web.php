<?php

use App\Models\Plans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\SubscriptionController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $plans = Plans::all();
    return view('welcome')->with('plans',$plans);
})->name('home');

Auth::routes();

Route::get('subscription', [PagesController::class, 'subscription'])->name('subscription');
Route::get('/store', [PagesController::class, 'showStore'])->name('store.show');
Route::get('contact', function () {
    return view('contact-us');
})->name('contact');
Route::post('/stripe-webhook', [PaymentController::class,'webhook']);


Route::middleware(['auth'])->group(function () {
    Route::get('/store/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::get('/cart/destroy/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::post('update-address/{id}', [CartController::class, 'updateAddress'])->name('cart.address.update');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::resource('orders', OrderController::class)->only('store');
    Route::get('/pay/{plan}', [SubscriptionController::class, 'finalCheckout'])->name('pay');
    Route::post('/subscribe/{id}', [SubscriptionController::class, 'createSubscription'])->name('subscription.create');
    Route::any('filter',[PagesController::class,'filter'])->name('filter');
});

Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {
    Route::get('/account', [UserController::class, 'index'])->name('user.home');
    Route::get('/details', [UserController::class, 'userDetails'])->name('user.details');
    Route::post('update', [UserController::class, 'updateUserDetails'] )->name('user.update');
    Route::get('/address-book', [UserController::class, 'getAddresses'])->name('user.address_book');
    Route::get('address/delete/{id}', [UserController::class, 'deleteAddress'])->name('user.address.delete');
    Route::post('address/update/{id}', [UserController::class, 'updateAddress'])->name('user.address.update');
    Route::post('new-address', [UserController::class, 'addNewAddress'])->name('user.new.address');
    Route::get('/change-password', [UserController::class, 'changePassword'])->name('user.change-password');
    Route::post('change-password', [UserController::class, 'updatePassword'])->name('user.update.password');
    Route::get('/subscriptions', [UserController::class, 'getOrders'])->name('user.my_orders');
    Route::get('/subscriptions/{id}', [OrderController::class, 'show'])->name('order.details');
    Route::get('subscription/delete/{id}', [SubscriptionController::class, 'cancelSubscription'])->name('subscription.delete');
});

Route::get('/success', function () {
    return view('order.order-success');
})->name('order.success');

Route::get('/failure', function () {
    return view('order.order-failure');
})->name('order.failure');

// Route::stripeWebhooks('stripe-webhook');

Route::post('/stripe-checkout', function (Request $request) {
    // $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
    // \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    $plan = Plans::findOrFail($request->plan_id);
    $user = $request->user();
    $paymentMethod = $request->paymentMethod;
    $amount = $request->amount;
    $order = $request->session()->get('order');
    $subamount = \Cart::session(auth()->id())->getTotal() * $plan->interval_count;

    $checkout_session = \Stripe\Checkout\Session::create([
        'line_items' => [[
            'price_data' => [
                'currency' => 'gbp',
                'product_data' => [
                    'name' => 'Bliss Explorers Subscription Package',
                ],
                'unit_amount' => $request->amount * 100,
            ],
            'quantity' => 1,
        ]],
        'payment_intent_data' => [
            'metadata' => [
                'plan_id' => $plan->id,
                'order' => $order,
                'subamount' => $subamount,
            ]
        ],
        'mode' => 'payment',
        'success_url' => route('order.success'),
        'cancel_url' => route('order.failure'),
    ]);

    header("HTTP/1.1 303 See Other");
    header("Location: " . $checkout_session->url);


})->name('stripe.checkout');
