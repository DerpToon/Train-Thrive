@extends('layouts.app')

@section('title', 'Register')

@section('content')
<body class="bg-dark text-white">
    <div class="container mt-4">
        <div class="text-center mb-4">
            <a href="{{ route('home') }}">
                <button class="btn btn-success">Back To Home</button>
            </a>
        </div>

        <div class="row justify-content-center align-items-center" style="min-height: 80vh;">
            <div class="col-md-4">
                <div class="bg-dark p-4 rounded shadow-lg">
                    <h2 class="text-center fw-bold mb-4">Register</h2>

                    <!-- REGISTER FORM -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control bg-dark text-white border-light" id="name" name="name" required placeholder="Enter your full name">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control bg-dark text-white border-light" id="email" name="email" required placeholder="Email">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control bg-dark text-white border-light" id="password" name="password" required placeholder="Password">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control bg-dark text-white border-light" id="password_confirmation" name="password_confirmation" required placeholder="Confirm Password">
                            @error('password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success w-100">Register</button>
                        <p class="text-center mt-3">Already have an account? <a href="{{ route('login') }}" class="text-success">Login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection