
@extends('layouts.app')

@section('title','workouts')

@section('content')
<body class="bg-dark text-white">
    <main class="container text-center py-5">
        <h1 class="fw-bold">TO GIVE IT ALL</h1>
        <h3 class="text-success">ALWAYS LIVE ACTIVE</h3>
    </main>

    <section class="container text-center py-4">
        <h2 class="fw-bold">CATEGORIES</h2>
        <div class="row row-cols-2 row-cols-md-4 g-4">
            <div class="col"><img src="\imgs\Home page\powder.png" class="img-fluid"><button class="btn btn-success w-100 mt-2">POWDERS</button></div>
            <div class="col"><img src="\imgs\Home page\mass-gainer.png" class="img-fluid"><button class="btn btn-success w-100 mt-2">MASS GAINERS</button></div>
            <div class="col"><img src="\imgs\Products\Product Images\21.png" class="img-fluid"><button class="btn btn-success w-100 mt-2">ENERGY FLAVORS</button></div>
            <div class="col"><img src="\imgs\Home page\flakes.png" class="img-fluid"><button class="btn btn-success w-100 mt-2">FLAKES</button></div>
        </div>
    </section>

    <section class="container bg-dark text-white rounded p-4 my-5">
        <h2 class="text-center">Calorie Calculator</h2>
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

    <section class="container text-center py-4">
        <h2 class="fw-bold">EXCLUSIVE SERVICES</h2>
        <div class="row g-4">
            <div class="col-md-4 p-3 bg-dark rounded">Loyalty Program</div>
            <div class="col-md-4 p-3 bg-dark rounded">Workouts Plans</div>
            <div class="col-md-4 p-3 bg-dark rounded">Nutrition Advice</div>
        </div>
    </section>
    
    <section class="container text-center py-4">
        <h2 class="fw-bold">Customer Reviews</h2>
        <button class="btn btn-success mt-3">Add Review</button>
    </section>
 
@include('partials.footer')
   
</body>
@endsection