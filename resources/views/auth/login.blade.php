@extends('layouts.loginapp')

@section('title', 'Login')

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
                    <h2 class="text-center fw-bold mb-4">Login</h2>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="login" class="form-label">Email or Name</label>
                            <input type="text" class="form-control bg-dark text-white border-light" id="login" name="login" required placeholder="Email or Name">
                            @error('login')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="login-password" class="form-label">Password</label>
                            <input type="password" class="form-control bg-dark text-white border-light" id="login-password" name="password" required placeholder="Password">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <div>
                                <input type="checkbox" id="remember" name="remember" class="form-check-input">
                                <label for="remember" class="form-check-label text-white">Remember me</label>
                            </div>
                            <a href="{{ route('password.request') }}" class="text-success">Forgot your password?</a>
                        </div>
                        <button type="submit" class="btn btn-success w-100">Login</button>

                        <!-- Google Login Button -->
                        <a href="{{ url('/auth/google') }}" class="btn btn-danger w-100 mt-3">
                            <i class="fab fa-google"></i> Login with Google
                        </a>

                        <p class="text-center mt-3">Don't have an account? <a href="{{ route('register') }}" class="text-success">Register</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
