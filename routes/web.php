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
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;


// Public Routes
Route::get('/', fn() => view('home'))->name('home');
Route::get('/about-us', fn() => view('about-us'))->name('about');
Route::get('/shop', fn() => view('products'))->name('shop');
Route::get('/products-list', [ProductController::class, 'index'])->name('products.index');
Route::get('/products', [CategoryController::class, 'index'])->name('products');

// Route to display the Thank You page
Route::get('/thank-you', function () {
    return view('thank-you');
})->name('thank-you');

// Authentication Routes
Route::get('/login', fn() => view('auth.login'))->name('login');
Route::post('/logout', fn() => \Illuminate\Support\Facades\Auth::logout() && redirect()->route('home'))->name('logout');

// Google Authentication Routes
Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback'])->name('google.callback');

Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', fn() => view('dashboard'))->middleware('verified')->name('dashboard');

    // Profile
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // Workouts
    Route::resource('workout', WorkoutController::class);
    Route::get('/workouts', [WorkoutController::class, 'filterWorkouts'])->name('workouts');

    // Calculator
    Route::get('/calculator', fn() => view('calculator'))->name('calculator');
    Route::get('/food-items', [CalculatorController::class, 'getFoodItems']);
    Route::post('/calculatorInsert', [CalculatorController::class, 'store'])->name('calculatorInsert.store');
    Route::post('/calculatorUpdate', [CalculatorController::class, 'update'])->name('calculatorUpdate.store');

    // Reviews
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

    // Cart
    Route::prefix('cart')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('cart.index');
        Route::post('/add', [CartController::class, 'add'])->name('cart.add');
        Route::post('/update', [CartController::class, 'update'])->name('cart.update');
        Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
    });

    // Shop Page (Restricted to Logged-In Users)
    Route::get('/shop', fn() => view('products'))->name('shop');
});

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/', fn() => view('admin'))->name('admin');

    // Admin Workouts
    Route::prefix('workouts')->group(function () {
        Route::get('/', [WorkoutController::class, 'index'])->name('workouts.index');
        Route::get('/create', [WorkoutController::class, 'create'])->name('workouts.create');
        Route::post('/', [WorkoutController::class, 'store'])->name('workouts.store');
        Route::get('/{id}/edit', [WorkoutController::class, 'edit'])->name('workouts.edit');
        Route::put('/{id}', [WorkoutController::class, 'update'])->name('workouts.update');
        Route::delete('/{id}', [WorkoutController::class, 'destroy'])->name('workouts.destroy');
        Route::get('/filter', [WorkoutController::class, 'getFilteredWorkouts'])->name('admin.workouts.filter');
    });

    // Admin Calculators
    Route::prefix('calculators')->group(function () {
        Route::get('/', [CalculatorController::class, 'index'])->name('calculator.index');
        Route::get('/create', [CalculatorController::class, 'create'])->name('calculator.create');
        Route::post('/', [CalculatorController::class, 'store'])->name('calculator.store');
        Route::get('/{id}/edit', [CalculatorController::class, 'edit'])->name('calculator.edit');
        Route::put('/{id}', [CalculatorController::class, 'update'])->name('calculator.update');
        Route::delete('/{id}', [CalculatorController::class, 'destroy'])->name('calculator.destroy');
        Route::get('/search', [CalculatorController::class, 'search'])->name('calculator.search');
    });

    // Admin Users
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/', [UserController::class, 'store'])->name('users.store');
        Route::get('/search', [UserController::class, 'search'])->name('users.search');
    });

    // Admin Reviews
    Route::get('/admin/reviews', [ReviewController::class, 'adminIndex'])->name('reviews.index');
    Route::delete('/admin/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
    Route::get('/admin/reviews/search', [ReviewController::class, 'search'])->name('reviews.search');

    // Admin Orders
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index')->middleware('auth');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show')->middleware('auth');
    Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy')->middleware('auth');
    Route::get('/orders/search', [OrderController::class, 'search'])->name('orders.search')->middleware('auth');
    Route::get('/admin/orders/search', [OrderController::class, 'search'])->name('orders.search')->middleware('auth');
    
    Route::post('/admin/workouts', [WorkoutController::class, 'store'])->name('workoutInsert.store');
});
    
// Product Routes
Route::get('/admin/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/admin/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/admin/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/admin/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/products/move', [ProductController::class, 'move'])->name('products.move');

// Checkout Routes
Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout');
Route::post('/checkout/submit', [CheckoutController::class, 'submit'])->name('checkout.submit');

Route::put('/reset-password', [PasswordController::class, 'update'])->name('password.update');
Route::get('/reset-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');    



require __DIR__.'/auth.php';
