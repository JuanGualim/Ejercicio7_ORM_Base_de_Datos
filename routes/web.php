<?php

use Illuminate\Support\Facades\Route;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;

// 1
Route::get('/orders', function () {
    return Order::with(['user', 'items.product'])->get();
});

// 2
Route::get('/products-categories', function () {
    return Product::with('categories')->get();
});

// 3
Route::get('/products-reviews', function () {
    return Product::whereHas('reviews', function ($q) {
        $q->where('rating', '>', 4);
    })->with('reviews')->get();
});

// 4
Route::get('/users-orders', function () {
    return User::whereHas('orders', function ($q) {
        $q->where('total', '>', 100);
    })->with('orders')->get();
});

// 5
Route::get('/products-price', function () {
    return Product::orderBy('price', 'desc')->get();
});

Route::get('/', function () {
    return view('welcome');
});
