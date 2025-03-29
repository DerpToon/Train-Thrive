<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CalculatorController;

Route::get('/home', function () {
    return view('home');
})->name('home');

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

route::get('/cart', [CartController::class, 'index'])->name('cart');

Route::get('/products', function () {
    return view('products');
})->name('products');


Route::get('/login', function () {
    return view('auth.login');
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

Route::resource('workout', WorkoutController::class);

Route::get('/workouts', [WorkoutController::class,'filterWorkouts'])->name('workouts');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
});


Route::post('/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect()->route('home');
})->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
});

Route::get('/food-items', [CalculatorController::class, 'getFoodItems']);