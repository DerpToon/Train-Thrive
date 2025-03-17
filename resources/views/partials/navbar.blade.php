<header class="bg-dark py-5 text-center">
    <nav class="container d-flex justify-content-between align-items-center flex-wrap">
        <img src="./imgs/Workouts/Logo.jpg" alt="Logo" class="rounded-circle" width="64" height="64" />
        <ul class="nav flex-wrap">
            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link text-success">Home</a></li>
            <li class="nav-item"><a href="{{ route('workouts') }}" class="nav-link text-success">Workouts</a></li>
            <li class="nav-item"><a href="{{ route('calculator') }}" class="nav-link text-success">Macros Calculator</a></li>
            <li class="nav-item"><a href="{{ route('shop') }}" class="nav-link text-success" >Shop</a></li>
            <li class="nav-item"><a href="{{ route('about') }}" class="nav-link text-success">About Us</a></li>
        </ul>
        <a href="login.html" class="btn btn-success">Login</a>
    </nav>
</header>