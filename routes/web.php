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

// Home Route
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Dashboard Route (requires authentication and email verification)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Static Pages
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/admin', function () {
    return view('admin');
})->name('admin');

Route::get('/shop', function () {
    return view('products');
})->name('shop');

Route::get('/about-us', function () {
    return view('about-us');
})->name('about');

// Authentication Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect()->route('home');
})->name('logout');

// Profile Routes (requires authentication)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Workout Routes (requires authentication)
Route::middleware('auth')->group(function () {
    Route::resource('workout', WorkoutController::class);
    Route::get('/workouts', [WorkoutController::class, 'filterWorkouts'])->name('workouts');
});

// Calculator Routes (requires authentication)
Route::middleware('auth')->group(function () {
    Route::get('/calculator', function () {
        return view('calculator');
    })->name('calculator');

    Route::get('/food-items', [CalculatorController::class, 'getFoodItems']);
});



// Review Routes
Route::post('/reviews', [ReviewController::class, 'store'])
    ->middleware('auth')
    ->name('reviews.store');

Route::get('/reviews', [ReviewApiController::class, 'index']);

// Google Authentication Routes
Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback'])->name('google.callback');

// Include Auth Routes
require __DIR__.'/auth.php';


Route::post('/cart/add', [CartController::class, 'add'])->middleware('auth');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index')->middleware('auth');


Route::get('/products', [CategoryController::class, 'index'])->name('products');

Route::get('/workoutInsert', function(){
    return view('admin.workoutInsert');
})->name('workoutInsert');

Route::get('/calculatorInsert', function() {
    return view('admin.calculatorInsert');
})->name('calculatorInsert');
Route::get('/workoutUpdate', function() {
    return view('admin.workoutUpdate');
})->name('workoutUpdate');
Route::get('/calculatorUpdate', function() {
    return view('admin.calculatorUpdate');
})->name('calculatorUpdate');

Route::post('/calculatorInsert', [CalculatorController::class, 'store'])->name('calculatorInsert.store');
Route::post('/workoutsInsert', [WorkoutController::class, 'store'])->name('workoutInsert.store');
Route::post('/calculatorUpdate', [CalculatorController::class, 'update'])->name('calculatorUpdate.store');
Route::post('/workoutUpdate', [WorkoutController::class, 'update'])->name('workoutUpdate.store');

