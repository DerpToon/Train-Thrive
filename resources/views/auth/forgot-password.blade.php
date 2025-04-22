@extends('layouts.loginapp')

@section('title', 'Forgot Password')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<body class="bg-dark text-white">
    <div class="container mt-4">
    <div class="d-flex justify-content-start mb-4">
            <a href="{{ route('home') }}">
                <button class="btn btn-success">Back To Home</button>
            </a>
        </div>

        <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
            <div class="col-md-4">
                <div class="bg-dark p-4 rounded shadow-lg">
                    <h2 class="text-center fw-bold mb-4">Forgot Password</h2>

                    <div class="mb-4 text-sm text-gray-300">
                        {{ __('Forgot your password? No problem. Just enter your email address below, and we will send you a password reset link.') }}
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" class="form-control bg-dark text-white border-light" name="email" :value="old('email')" required autofocus>
                            <x-input-error :messages="$errors->get('email')" class="text-danger mt-2" />
                        </div>

                        <button type="submit" class="btn btn-success w-100">Send Password Reset Link</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
