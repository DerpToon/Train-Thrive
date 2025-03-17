<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/workouts', function () {
    return view('workout');
})->name('workouts');

Route::get('/calculator', function () {
    return view('calculator');
})->name('calculator');

Route::get('/shop', function () {
    return view('products');
})->name('shop');

Route::get('/about-us', function () {
    return view('about-us');
})->name('about');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/products', function () {
    return view('products');
})->name('products');


