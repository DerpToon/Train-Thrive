@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="d-flex flex-column min-vh-100 bg-dark text-white">
    <div class="w-100 text-center py-5 border-bottom border-success">
        <div class="position-relative">
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <label for="profile_photo" class="cursor-pointer">
                    <img src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : asset('default-avatar.png') }}" 
                         alt="Profile Picture" 
                         class="rounded-circle border border-success mb-3 shadow" 
                         width="120" height="120">
                    <input type="file" name="profile_photo" id="profile_photo" class="d-none" onchange="this.form.submit();">
                </label>
            </form>

            <h3 class="fw-bold text-success">{{ Auth::user()->name }}</h3>
            <p class="text-white-50">{{ Auth::user()->email }}</p>
            <p class="text-white-50">Joined on {{ Auth::user()->created_at->format('F d, Y') }}</p>
            @if(Auth::user()->privilege == 'admin')
                <a href="{{ route('admin') }}" class="btn btn-outline-success mt-2">Go to Admin Panel</a>
            @endif
        </div>
    </div>

    <div class="w-100 py-5 border-bottom border-success bg-black">
        <div class="container">
            <div class="card bg-dark text-white border border-success shadow-lg">
                <div class="card-header bg-success text-dark fw-bold">Update Profile Information</div>
                <div class="card-body p-5">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>
    </div>

    <div class="w-100 py-5 border-bottom border-success bg-black">
        <div class="container">
            <div class="card bg-dark text-white border border-success shadow-lg">
                <div class="card-header bg-success text-dark fw-bold">Update Password</div>
                <div class="card-body p-5">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>

    <div class="w-100 py-5 border-bottom border-success bg-black">
        <div class="container">
            <div class="card bg-dark text-white border border-danger shadow-lg">
                <div class="card-header bg-danger text-white fw-bold">Delete Account</div>
                <div class="card-body p-5">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')
</div>
@endsection
