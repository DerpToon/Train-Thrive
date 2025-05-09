@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="d-flex flex-column min-vh-100 bg-dark text-white">
    <!-- Profile Section -->
    <div class="w-100 text-center py-5 border-bottom border-success">
        <div class="position-relative">
            <img src="{{ Auth::user()->profile_photo_url ?? asset('default-avatar.png') }}" 
                 alt="Profile Picture" 
                 class="rounded-circle border border-success mb-3" 
                 width="120" height="120">
            <a href="#" class="btn btn-sm btn-success position-absolute" style="top: 80px; right: 130px;">
                <i class="fas fa-camera"></i>
            </a>
        </div>
        <h3 class="fw-bold text-success">{{ Auth::user()->name }}</h3>
        <p class="text-white">{{ Auth::user()->email }}</p>
        <p class="text-white">Joined on {{ Auth::user()->created_at->format('F d, Y') }}</p>
    </div>

    <!-- Update Profile Information Section -->
    <div class="w-100 py-5 border-bottom border-success">
        <div class="container">
            <div class="card bg-dark text-white shadow-lg border-0 rounded w-100">
                <div class="card-body p-5">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>
    </div>

    <!-- Update Password Section -->
    <div class="w-100 py-5 border-bottom border-success">
        <div class="container">
            <div class="card bg-dark text-white shadow-lg border-0 rounded w-100">
                <div class="card-body p-5">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Account Section -->
    <div class="w-100 py-5">
        <div class="container">
            <div class="card bg-dark text-white shadow-lg border-0 rounded w-100">
                <div class="card-body p-5">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
