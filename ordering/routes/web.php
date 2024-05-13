<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
Route::get('/', function () {
    return view('welcome');
});
Route::resource('products',ProductsController::class);
Route::resource('orders',OrdersController::class);
Route::get('orders/{product}/create',[OrdersController::class, 'create'])->name('orders.create');