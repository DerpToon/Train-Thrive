@extends('layouts.app')

@section('title', 'Login / Sign Up')

@section('content')
<body class="bg-dark text-white">
    <div class="container mt-4">
        <!-- Back to Home Button -->
        <div class="text-center mb-4">
            <a href="{{ url('/') }}">
                <button class="btn btn-success">Back To Home</button>
            </a>
        </div>

        <div class="row justify-content-center align-items-center vh-100">
            <!-- Glass Effect Login/Sign Up Box -->
            <div class="col-md-4">
                <div class="bg-dark p-4 rounded shadow-lg" style="background: rgba(255, 255, 255, 0.15); backdrop-filter: blur(10px);">
                    <h2 id="form-title" class="text-center fw-bold mb-4">Login</h2>

                    <!-- Login Form -->
                    <div id="login-form">
                        <form id="login-form-action" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control bg-dark text-white border-light" id="login-username" name="username" required placeholder="Username">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control bg-dark text-white border-light" id="login-password" name="password" required placeholder="Password">
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <input type="checkbox" id="remember" name="remember">
                                    <label for="remember" class="text-white">Remember me</label>
                                </div>
                                <a href="#" class="text-success">Forgot your password?</a>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Login</button>
                            <p class="text-center mt-3">Don't have an account? <a href="#" id="switch-to-register" class="text-success">Sign up</a></p>
                        </form>
                    </div>

                    <!-- Sign-Up Form -->
                    <div id="signup-form" style="display: none;">
                        <form id="signup-form-action" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control bg-dark text-white border-light" id="new-name" name="name" required placeholder="Enter your full name" />
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control bg-dark text-white border-light" id="new-username" name="username" required placeholder="Username">
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control bg-dark text-white border-light" id="email" name="email" required placeholder="Email">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control bg-dark text-white border-light" id="new-password" name="password" required placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-success w-100">Sign Up</button>
                            <p class="text-center mt-3">Already have an account? <a href="#" id="switch-to-login" class="text-success">Login</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection
