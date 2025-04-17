
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar text-white vh-100">
                <div class="position-sticky pt-3">
                    <h4 class="text-center py-3 border-bottom">Admin Panel</h4>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link text-white {{ request()->routeIs('admin') ? 'active' : '' }}" href="{{ route('admin') }}">
                                <i class="bi bi-house"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
        <a class="nav-link text-white {{ request()->routeIs('users.index') ? 'active' : '' }}" href="{{ route('users.index') }}">
            <i class="bi bi-people"></i> Users
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-white {{ request()->routeIs('reviews.index') ? 'active' : '' }}" href="{{ route('reviews.index') }}">
            <i class="bi bi-chat-dots"></i> Reviews
        </a>
    </li>
                
<ul class="nav flex-column" id="sidebarMenu">
    <li class="nav-item">
        <a class="nav-link text-white {{ request()->routeIs('calculator.index') ? 'active' : '' }}" href="{{ route('calculator.index') }}">
            <i class="bi bi-calculator"></i> Calculator
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-white {{ request()->routeIs('workouts.index') ? 'active' : '' }}" href="{{ route('workouts.index') }}">
            <i class="bi bi-dumbbell"></i> Workouts
        </a>
    </li>
</ul>
                </div>
            </nav>

            <!-- Content Area -->
            <main role="main" class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">@yield('header')</h1>
                </div>
                @yield('content')
            </main>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>