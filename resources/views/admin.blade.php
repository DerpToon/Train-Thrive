@extends('layouts.admin-layout')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container">
    <h1 class="text-center mb-5">Welcome to the Admin Dashboard</h1>
    <div class="row g-4">
        <!-- Users Section -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bi bi-people display-4 text-primary"></i>
                    <h4 class="mt-3">Users</h4>
                    <p class="text-muted">Manage all registered users and their roles.</p>
                    <a href="{{ route('users.index') }}" class="btn btn-primary">Manage Users</a>
                </div>
            </div>
        </div>

        <!-- Products Section -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bi bi-box display-4 text-success"></i>
                    <h4 class="mt-3">Products</h4>
                    <p class="text-muted">Add, edit, or delete products in the store.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-success">Manage Products</a>
                </div>
            </div>
        </div>

        <!-- Workouts Section -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bi bi-activity display-4 text-warning"></i>
                    <h4 class="mt-3">Workouts</h4>
                    <p class="text-muted">Create and manage workout plans for users.</p>
                    <a href="{{ route('workouts.index') }}" class="btn btn-warning">Manage Workouts</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-4">
        <!-- Reviews Section -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bi bi-chat-dots display-4 text-info"></i>
                    <h4 class="mt-3">Reviews</h4>
                    <p class="text-muted">View and moderate user reviews.</p>
                    <a href="{{ route('reviews.index') }}" class="btn btn-info">Manage Reviews</a>
                </div>
            </div>
        </div>

        <!-- Calculator Section -->
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="bi bi-calculator display-4 text-danger"></i>
                    <h4 class="mt-3">Calculator</h4>
                    <p class="text-muted">Manage and customize calculators.</p>
                    <a href="{{ route('calculator.index') }}" class="btn btn-danger">Manage Calculators</a>
                </div>
            </div>
        </div>

        
    </div>
</div>
@endsection