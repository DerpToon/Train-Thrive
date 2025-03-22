<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/home', function () {
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


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
