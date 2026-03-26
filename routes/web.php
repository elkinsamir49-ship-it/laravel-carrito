<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.list');


Route::get('/checkout', function () {
    return view('checkouy');
})->name('checkout');

Route::post('/checkout', [App\Http\Controllers\OrderController::class, 'store'])->name('checkout.store');