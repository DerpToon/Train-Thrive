<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReviewApiController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;


// Public Routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about-us', function () {
    return view('about-us');
})->name('about');

Route::get('/shop', function () {
    return view('products');
})->name('shop');

Route::get('/products-list', [ProductController::class, 'index'])->name('products.index'); // Product listing
Route::get('/products', [CategoryController::class, 'index'])->name('products'); // Categories

// Authentication Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect()->route('home');
})->name('logout');

// Google Authentication Routes
Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback'])->name('google.callback');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware('verified')->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Workouts
    Route::resource('workout', WorkoutController::class);
    Route::get('/workouts', [WorkoutController::class, 'filterWorkouts'])->name('workouts');

    // Calculator
    Route::get('/calculator', function () {
        return view('calculator');
    })->name('calculator');
    Route::get('/food-items', [CalculatorController::class, 'getFoodItems']);
    Route::post('/calculatorInsert', [CalculatorController::class, 'store'])->name('calculatorInsert.store');
    Route::post('/calculatorUpdate', [CalculatorController::class, 'update'])->name('calculatorUpdate.store');

    // Reviews
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/reviews', [ReviewApiController::class, 'index']);

    // Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
});


    // Admin Dashboard
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin');

    // Admin Workouts
    Route::get('/admin/workouts', [WorkoutController::class, 'index'])->name('workouts.index');
    Route::get('/admin/workouts/create', [WorkoutController::class, 'create'])->name('workouts.create');
    Route::post('/admin/workouts', [WorkoutController::class, 'store'])->name('workouts.store');
    Route::get('/admin/workouts/{id}/edit', [WorkoutController::class, 'edit'])->name('workouts.edit');
    Route::put('/admin/workouts/{id}', [WorkoutController::class, 'update'])->name('workouts.update');
    Route::delete('/admin/workouts/{id}', [WorkoutController::class, 'destroy'])->name('workouts.destroy');
    Route::get('admin/workouts/filter', [WorkoutController::class, 'getFilteredWorkouts'])->name('admin.workouts.filter');

    // Admin Calculators
    Route::get('/admin/calculators', [CalculatorController::class, 'index'])->name('calculator.index');
    Route::get('/admin/calculators/create', [CalculatorController::class, 'create'])->name('calculator.create');
    Route::post('/admin/calculators', [CalculatorController::class, 'store'])->name('calculator.store');
    Route::get('/admin/calculators/{id}/edit', [CalculatorController::class, 'edit'])->name('calculator.edit');
    Route::put('/admin/calculators/{id}', [CalculatorController::class, 'update'])->name('calculator.update');
    Route::delete('/admin/calculators/{id}', [CalculatorController::class, 'destroy'])->name('calculator.destroy');
    Route::get('/admin/calculators/search', [CalculatorController::class, 'search'])->name('calculator.search');

    // Admin Users
    Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/admin/users/search', [UserController::class, 'search'])->name('users.search');

    // Admin Reviews
    Route::get('/admin/reviews', [ReviewController::class, 'adminIndex'])->name('reviews.index');
    Route::delete('/admin/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
    Route::get('/admin/reviews/search', [ReviewController::class, 'search'])->name('reviews.search');
    
// Product Routes
Route::get('/admin/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/admin/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/admin/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/admin/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/products/move', [ProductController::class, 'move'])->name('products.move');
   

require __DIR__.'/auth.php';
