<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/aprendices', function () {
    return view('aprendices');
});

Route::get('/consultar', function () {
   $user = new App\Models\User();
   return dd($user->all());
});

Route::get('/insertar', function () {
 $user = new App\Models\User();
 $user->email = 'email@mail.com';
 $user->name = 'ejemplo';
 $user->password = 'mypassword';
 $user->save();
 return dd($user);
});

Route::get('/products', [ProductController::class, 'index'])->name('products.list');

Route::get('/checkout', function () {
    return view('checkout');
});

Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store');