<header class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg position-sticky top-0 w-100 py-3 z-3">
    <div class="container d-flex justify-content-between align-items-center">
        <a href="{{ route('home') }}">
            <img src="./imgs/Workouts/Logo.jpg" alt="Logo" class="rounded-circle" width="64" height="64" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav gap-3">
                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link text-success fw-semibold">Home</a></li>
                <li class="nav-item"><a href="{{ route('workouts') }}" class="nav-link text-success fw-semibold">Workouts</a></li>
                <li class="nav-item"><a href="{{ route('calculator') }}" class="nav-link text-success fw-semibold">Macros Calculator</a></li>
                <li class="nav-item"><a href="{{ route('cart') }}" class="nav-link text-success fw-semibold">Shop</a></li>
                <li class="nav-item"><a href="{{ route('about') }}" class="nav-link text-success fw-semibold">About Us</a></li>
            </ul>
        </div>
        <a href="{{ route('login') }}" class="btn btn-outline-success px-4">Login</a>
    </div>
</header>
