@extends('layouts.app')

@section('title', 'Reset Password')

@section('content')
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
                    <h2 class="text-center fw-bold mb-4">Reset Password</h2>

                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <!-- Email Address -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" class="form-control bg-dark text-white border-light" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username">
                            <x-input-error :messages="$errors->get('email')" class="text-danger mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">New Password</label>
                            <input id="password" type="password" class="form-control bg-dark text-white border-light" name="password" required autocomplete="new-password">
                            <x-input-error :messages="$errors->get('password')" class="text-danger mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input id="password_confirmation" type="password" class="form-control bg-dark text-white border-light" name="password_confirmation" required autocomplete="new-password">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="text-danger mt-2" />
                        </div>

                        <button type="submit" class="btn btn-success w-100">Reset Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
