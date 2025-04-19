<header class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg position-sticky top-0 w-100 py-3 z-3">
    <div class="container d-flex justify-content-between align-items-center">
        <a href="{{ route('home') }}" class="d-flex align-items-center text-decoration-none">
            <img src="{{ asset('imgs/Workouts/Logo.jpg') }}" alt="Logo" class="rounded-circle me-2 shadow-sm" width="60" height="60">
            <span class="text-success fw-bold fs-4 d-none d-md-inline">Stride Fitness</span>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav gap-3">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link text-success fw-semibold position-relative">
                        Home
                        <span class="hover-underline"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('workouts') }}" class="nav-link text-success fw-semibold position-relative">
                        Workouts
                        <span class="hover-underline"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('calculator') }}" class="nav-link text-success fw-semibold position-relative">
                        Macros Calculator
                        <span class="hover-underline"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('products') }}" class="nav-link text-success fw-semibold position-relative">
                        Shop
                        <span class="hover-underline"></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('about') }}" class="nav-link text-success fw-semibold position-relative">
                        About Us
                        <span class="hover-underline"></span>
                    </a>
                </li>
            </ul>
        </div>

        @auth
        <div class="dropdown">
            <button class="btn btn-success dropdown-toggle px-4 shadow-sm" type="button" id="userDropdown" data-bs-toggle="dropdown">
                👋 {{ auth()->user()->name }}
            </button>
            <ul class="dropdown-menu dropdown-menu-end animate__animated animate__fadeIn" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="{{ route('dashboard') }}">Profile</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
        @else
        <a href="{{ route('login') }}" class="btn btn-outline-success px-4 shadow-sm">Login</a>
        @endauth
    </div>
</header>

<style>
    .nav-link {
        transition: color 0.3s ease, transform 0.2s ease;
    }

    .nav-link:hover {
        color: #28a745 !important;
        transform: translateY(-2px);
    }

    .hover-underline {
        display: block;
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background-color: #28a745;
        transition: width 0.3s ease;
    }

    .nav-link:hover .hover-underline {
        width: 100%;
    }

    .dropdown-menu {
        min-width: 180px;
    }
</style>
