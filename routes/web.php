<?php

use Illuminate\Support\Facades\Route;

use Inertia\Inertia;

use App\Http\Controllers\ShopController;
use App\Http\Controllers\CustomerController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('shop', [ShopController::class, 'shop']);

Route::post('addToCart', [CustomerController::class, 'addToCart']);

Route::get('cart', [CustomerController::class, 'cart']);

Route::get('payment', [CustomerController::class, 'payment']);

