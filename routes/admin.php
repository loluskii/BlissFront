<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
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


Route::get('/', function () {
    return view('admin.auth.login');
})->name('login.view');
Route::post('login', [LoginController::class, 'authenticate'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{id}',[OrderController::class, 'show'])->name('orders.show');
    Route::post('products/create', [ProductController::class, 'store'])->name('product.store');
    Route::get('products/category',[ProductController::class, 'makeCategory'])->name('category.view');
    Route::post('category/create',[ProductController::class, 'addCategory'])->name('category.add');
    Route::get('category/delete/{id}',[ProductController::class,'deleteCategory'])->name('category.delete');
});
