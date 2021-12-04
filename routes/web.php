<?php

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
    return view('welcome');
})->name('home');

Auth::routes();

Route::get('subscription', [PagesController::class, 'subscription'])->name('subscription');
Route::get('/store', [PagesController::class, 'showStore'])->name('store.show');


Route::middleware(['auth'])->group(function () {
    Route::get('/store/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::get('/cart/destroy/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::resource('orders', OrderController::class)->only('store');
    Route::get('/pay/{plan}', [SubscriptionController::class, 'finalCheckout'])->name('pay');
    Route::post('/subscribe/{id}', [SubscriptionController::class, 'createSubscription'])->name('subscription.create');

});

Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {
    Route::get('/account', [UserController::class, 'index'])->name('user.home');
    Route::get('/details', [UserController::class, 'userDetails'])->name('user.details');
    Route::get('/address-book', [UserController::class, 'getAddresses'])->name('user.address_book');
    Route::get('/payments', [UserController::class, 'getPaymentMethods'])->name('user.payment_methods');
    Route::get('/my-orders', [UserController::class, 'getOrders'])->name('user.my_orders');
    Route::get('/order/{id}', [OrderController::class, 'show'])->name('order.details');
});

// Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
//     Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
// });





