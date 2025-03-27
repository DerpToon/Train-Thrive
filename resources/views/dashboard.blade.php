@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="d-flex align-items-center justify-content-center bg-dark text-white min-vh-100">
    <div class="card bg-dark text-white shadow-lg border-0 rounded-lg" style="width: 450px;">
        <div class="card-body text-center p-5">
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
            <hr class="border-success">
            <div class="d-flex flex-column align-items-center gap-3">
                <a href="#" class="btn btn-success w-75">Edit Profile</a>
                <a href="#" class="btn btn-outline-success w-75">Change Password</a>
                <a href="#" class="btn btn-danger w-75">Delete Account</a>
            </div>
        </div>
    </div>
</div>
@endsection
