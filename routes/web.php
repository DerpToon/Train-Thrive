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



Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');



Route::get('/products', [CategoryController::class, 'index'])->name('products');


Route::post('/calculatorInsert', [CalculatorController::class, 'store'])->name('calculatorInsert.store');
Route::post('/workoutsInsert', [WorkoutController::class, 'store'])->name('workoutInsert.store');
Route::post('/calculatorUpdate', [CalculatorController::class, 'update'])->name('calculatorUpdate.store');
Route::post('/workoutUpdate', [WorkoutController::class, 'update'])->name('workoutUpdate.store');


Route::get('/admin/calculator', [CalculatorController::class, 'index'])->name('calculator.index');
Route::get('/admin/workouts', [WorkoutController::class, 'index'])->name('workouts.index');
Route::delete('/admin/workouts/{id}', [WorkoutController::class, 'destroy'])->name('workouts.destroy');

Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/admin/users', [UserController::class, 'store'])->name('users.store');
Route::get('/admin/users/search', [UserController::class, 'search'])->name('users.search');

Route::get('/admin/reviews', [ReviewController::class, 'adminIndex'])->name('reviews.index');
Route::delete('/admin/reviews/{id}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
Route::get('/admin/reviews/search', [ReviewController::class, 'search'])->name('reviews.search');
// Workout Routes
Route::get('/admin/workouts', [WorkoutController::class, 'index'])->name('workouts.index'); // List all workouts
Route::get('/admin/workouts/create', [WorkoutController::class, 'create'])->name('workouts.create'); // Show insert form
Route::post('/admin/workouts', [WorkoutController::class, 'store'])->name('workouts.store'); // Insert workout
Route::get('/admin/workouts/{id}/edit', [WorkoutController::class, 'edit'])->name('workouts.edit'); // Show update form
Route::put('/admin/workouts/{id}', [WorkoutController::class, 'update'])->name('workouts.update'); // Update workout
Route::delete('/admin/workouts/{id}', [WorkoutController::class, 'destroy'])->name('workouts.destroy'); // Delete workout

// Calculator Routes
Route::get('/admin/calculators', [CalculatorController::class, 'index'])->name('calculator.index'); // List all calculators
Route::get('/admin/calculators/create', [CalculatorController::class, 'create'])->name('calculator.create'); // Show insert form
Route::post('/admin/calculators', [CalculatorController::class, 'store'])->name('calculator.store'); // Insert calculator
Route::get('/admin/calculators/{id}/edit', [CalculatorController::class, 'edit'])->name('calculator.edit'); // Show update form
Route::put('/admin/calculators/{id}', [CalculatorController::class, 'update'])->name('calculator.update'); // Update calculator
Route::delete('/admin/calculators/{id}', [CalculatorController::class, 'destroy'])->name('calculator.destroy'); // Delete calculator
Route::get('/admin/calculators/search', [CalculatorController::class, 'search'])->name('calculator.search');