@extends('layouts.app')

@section('title','Home')

@section('content')
<body class="bg-dark text-white">

<!-- Hero Section with Full-Width Image -->
<main class="container-fluid text-center py-5 d-flex flex-column justify-content-center align-items-center"
      style="background: url('imgs/Home page/heroImage.jpg') no-repeat top center; background-size: cover; width: 100%; height: 50vh;">
    <h1 class="fw-bold mt-4 mb-4">TO GIVE IT ALL</h1>
    <h3 class="text-success mb-4">ALWAYS LIVE ACTIVE</h3>
</main>

<!-- Categories Section -->
<section class="container text-center py-4">
    <h2 class="fw-bold mt-4 mb-4">CATEGORIES</h2>
    <div class="row row-cols-2 row-cols-md-4 g-4">
        <div class="col"><img src="\imgs\Home page\powder.png" class="img-fluid"><button class="btn btn-success w-100 mt-2">POWDERS</button></div>
        <div class="col"><img src="\imgs\Home page\mass-gainer.png" class="img-fluid"><button class="btn btn-success w-100 mt-2">MASS GAINERS</button></div>
        <div class="col"><img src="\imgs\Products\Product Images\21.png" class="img-fluid"><button class="btn btn-success w-100 mt-2">ENERGY FLAVORS</button></div>
        <div class="col"><img src="\imgs\Home page\flakes.png" class="img-fluid"><button class="btn btn-success w-100 mt-2">FLAKES</button></div>
    </div>
</section>

<!-- Exclusive Services Section -->
<section class="exclusive-services container bg-dark text-white rounded p-4 my-5">
    <h2 class="text-center mt-4 mb-4">EXCLUSIVE SERVICES</h2>
    <div class="d-flex justify-content-center gap-4 flex-wrap">
        <a href="About-Us.html" class="text-decoration-none text-white">
            <div class="service-card text-center p-3 bg-success rounded d-flex flex-column align-items-center">
                <img src="\imgs\Home page\Loyalty.png" alt="Loyalty Program icon" class="img-fluid" style="width: 120px; height: 120px;">
                <h3 class="mt-2">Loyalty Program</h3>
            </div>
        </a>
        <a href="Workouts.html" class="text-decoration-none text-white">
            <div class="service-card text-center p-3 bg-success rounded d-flex flex-column align-items-center">
                <img src="\imgs\Home page\Plans.png" alt="Workouts Plans icon" class="img-fluid" style="width: 120px; height: 120px;">
                <h3 class="mt-2">Workouts Plans</h3>
            </div>
        </a>
        <a href="#nutrition-advice-section" class="text-decoration-none text-white">
            <div class="service-card text-center p-3 bg-success rounded d-flex flex-column align-items-center">
                <img src="\imgs\Home page\Nutrition.png" alt="Nutrition Advice icon" class="img-fluid" style="width: 120px; height: 120px;">
                <h3 class="mt-2">Nutrition Advice</h3>
            </div>
        </a>
    </div>
</section>

<!-- Calorie Calculator Section -->
<section class="container bg-dark text-white rounded p-4 my-5">
    <h2 class="text-center mt-4 mb-4">Calorie Calculator</h2>
    <div class="row g-3">
        <div class="col-md-6"><input type="text" class="form-control" placeholder="Age in Years"></div>
        <div class="col-md-6">
            <select class="form-control">
                <option>Select your gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        <div class="col-md-6"><input type="text" class="form-control" placeholder="Height in Cms"></div>
        <div class="col-md-6"><input type="text" class="form-control" placeholder="Weight in Kgs"></div>
        <div class="col-12">
            <select class="form-control">
                <option>Select activity level</option>
                <option value="sedentary">Sedentary</option>
                <option value="light">Lightly active</option>
                <option value="moderate">Moderately active</option>
                <option value="active">Very active</option>
                <option value="very active">Super active</option>
            </select>
        </div>
    </div>
    <button class="btn btn-success w-100 mt-3">Calculate</button>
</section>

<!-- Customer Reviews Section -->
<section class="container text-center py-4">
    <h2 class="fw-bold mt-4 mb-4">Customer Reviews</h2>
    <button class="btn btn-success mt-3">Add Review</button>
</section>

@include('partials.footer')

</body>
@endsection
