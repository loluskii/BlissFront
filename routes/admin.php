<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/overview/router', function () {
    return view('admin.auth.login');
})->name('login.view');
Route::post('login', [LoginController::class, 'authenticate'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('products', [ProductController::class, 'index'])->name('products.index');

    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/block/{id}',[UserController::class,'blockAUser'])->name('users.blockuser');
    Route::get('users/blocked',[UserController::class,'blockedUsers'])->name('users.blocked');
    Route::get('users/unblock/{id}',[UserController::class,'unblockAUser'])->name('users.unblock');
    Route::get('users/{id}',[UserController::class,'show'])->name('users.show');

    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{id}',[OrderController::class, 'show'])->name('orders.show');
    Route::get('pocketmoney',[OrderController::class,'pmOrders'])->name('orders.pm');
    Route::get('orders/update/{id}',[OrderController::class,'update'])->name('orders.update');

    Route::post('products/create', [ProductController::class, 'store'])->name('product.store');
    Route::post('products/update/{id}', [ProductController::class, 'updateProduct'])->name('product.update');
    Route::get('product/delete/{id}',[ProductController::class,'deleteProduct'])->name('product.delete');
    Route::get('products/category',[ProductController::class, 'makeCategory'])->name('category.view');
    Route::post('category/create',[ProductController::class, 'addCategory'])->name('category.add');
    Route::get('category/view/{id}',[ProductController::class, 'viewCategory'])->name('category.show');
    Route::post('products/category/update/{id}', [ProductController::class, 'updateCategory'])->name('category.update');
    Route::get('category/delete/{id}',[ProductController::class,'deleteCategory'])->name('category.delete');

    Route::get('stores',[StoreController::class,'index'])->name('store.index');
    Route::post('stores/create',[StoreController::class, 'store'])->name('store.create');
    Route::get('stores/view/{id}',[StoreController::class, 'view'])->name('stores.view');
    Route::post('stores/update/{id}',[StoreController::class, 'update'])->name('store.update');
    Route::get('stores/delete/{id}',[StoreController::class, 'delete'])->name('store.delete');

    Route::prefix('plans')->group(function () {
        Route::get('/',[PlanController::class,'index'])->name('plans.index');
        Route::post('store',[PlanController::class,'store'])->name('plans.store');
        Route::get('{id}',[PlanController::class,'show'])->name('plans.show');
        Route::post('update/{id}',[PlanController::class,'update'])->name('plans.update');
        Route::get('terminate/{plan}/{user}',[PlanController::class,'endSubscription'])->name('plans.terminate');
        Route::get('delete/{id}',[PlanController::class,'destroy'])->name('plan.delete');
    });

    Route::prefix('services')->group(function () {
        Route::get('/blissitech', [ServiceController::class,'blissitechHub'])->name('services.blissitech');
    });
});
