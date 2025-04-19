@extends('layouts.app')

@section('title', 'Home')

@section('content')
<body class="bg-dark text-white">

    <main class="container-fluid text-center py-5 d-flex flex-column justify-content-center align-items-center"
          style="background: url('{{ asset('imgs/Home page/heroImage.jpg') }}') no-repeat top center; background-size: cover; width: 100%; height: 50vh;">
        <h1 class="fw-bold mt-4 mb-4">TO GIVE IT ALL</h1>
        <h3 class="text-success mb-4">ALWAYS LIVE ACTIVE</h3>
    </main>

    <section class="container text-center py-4">
        <h2 class="fw-bold mt-4 mb-4">CATEGORIES</h2>
        <div class="row row-cols-2 row-cols-md-4 g-4">
            <div class="col">
                <img src="{{ asset('imgs/Home page/powder.png') }}" class="img-fluid">
                <button class="btn btn-success w-100 mt-2">POWDERS</button>
            </div>
            <div class="col">
                <img src="{{ asset('imgs/Home page/mass-gainer.png ') }}" class="img-fluid">
                <button class="btn btn-success w-100 mt-2">MASS GAINERS</button>
            </div>
            <div class="col">
                <img src="{{ asset('imgs/Home page/Energyflavors.png') }}" class="img-fluid">
                <button class="btn btn-success w-100 mt-2">ENERGY FLAVORS</button>
            </div>
            <div class="col">
                <img src="{{ asset('imgs/Home page/flakes.png') }}" class="img-fluid">
                <button class="btn btn-success w-100 mt-2">FLAKES</button>
            </div>
        </div>
    </section>

    <section class="container text-center py-4" id="nutrition-advice-section">
    <h2 class="fw-bold mt-4 mb-4">NUTRITION ADVICE</h2>
    <div class="row justify-content-center">
        <div class="col-md-8 bg-dark text-white rounded p-4 shadow-lg">
            <p class="text-success mb-4">
                The Calorie Calculator can estimate your daily caloric needs. It's also helpful for setting weight gain/loss goals.
            </p>
            <form>
                <div class="mb-3">
                    <input type="text" class="form-control bg-black text-white border-success" id="age" placeholder="Age in Years">
                </div>
                <div class="mb-3">
                    <select id="gender" class="form-select bg-black text-white border-success">
                        <option value="" disabled selected>Select your gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control bg-black text-white border-success" id="height" placeholder="Height in Cms">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control bg-black text-white border-success" id="weight" placeholder="Weight in Kgs">
                </div>
                <div class="mb-3">
                    <select id="activity" class="form-select bg-black text-white border-success">
                        <option value="" disabled selected>Select activity level</option>
                        <option value="sedentary">Sedentary (little or no exercise)</option>
                        <option value="light">Lightly active (1-3 days/week)</option>
                        <option value="moderate">Moderately active (3-5 days/week)</option>
                        <option value="active">Very active (6-7 days/week)</option>
                        <option value="very active">Super active (hard exercise & physical job)</option>
                    </select>
                </div>
                <div class="text-center mt-4">
                    <button type="button" class="btn btn-success w-100" id="calculateButton">CALCULATE</button>
                </div>
                <div class="text-center mt-3">
                    <span id="result" class="text-white fs-5"></span>
                </div>
            </form>
        </div>
    </div>


   <section class="exclusive-services container bg-dark text-white rounded p-5 my-5 shadow">
    <h2 class="text-center mb-5 display-5 fw-bold">Exclusive Services</h2>
    <div class="row g-4 justify-content-center">
        <div class="col-md-4">
            <a href="{{ url('About-Us.html') }}" class="text-decoration-none">
                <div class="service-card bg-success text-white text-center rounded-4 p-4 h-100 transition-hover shadow-sm">
                    <img src="{{ asset('imgs/Home page/Loyalty.png') }}" alt="Loyalty Program icon" class="img-fluid mb-3" style="width: 100px; height: 100px;">
                    <h4 class="fw-semibold">Loyalty Program</h4>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ url('Workouts.html') }}" class="text-decoration-none">
                <div class="service-card bg-success text-white text-center rounded-4 p-4 h-100 transition-hover shadow-sm">
                    <img src="{{ asset('imgs/Home page/Plans.png') }}" alt="Workout Plans icon" class="img-fluid mb-3" style="width: 100px; height: 100px;">
                    <h4 class="fw-semibold">Workout Plans</h4>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="#nutrition-advice-section" class="text-decoration-none">
                <div class="service-card bg-success text-white text-center rounded-4 p-4 h-100 transition-hover shadow-sm">
                    <img src="{{ asset('imgs/Home page/Nutrition.png') }}" alt="Nutrition Advice icon" class="img-fluid mb-3" style="width: 100px; height: 100px;">
                    <h4 class="fw-semibold">Nutrition Advice</h4>
                </div>
            </a>
        </div>
    </div>
</section>



   

    <section class="container text-center py-4">
        <h2 class="fw-bold mt-4 mb-4">Customer Reviews</h2>
        <div id="reviewsContainer"></div>
        @auth
            <form id="reviewForm" method="POST" action="{{ route('reviews.store') }}">
                @csrf
                <textarea name="review" id="reviewText" class="form-control bg-dark text-white border-light w-75 mx-auto" rows="4" placeholder="Write your review..." required></textarea>
                <button type="submit" class="btn btn-success mt-3">Add Review</button>
            </form>
        @endauth
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script >
    $(document).ready(function () {
    function loadReviews() {
        $.ajax({
            url: "{{ url('/reviews') }}",
            method: "GET",
            dataType: "json",
            success: function (response) {
                displayReviews(response.reviews);
            },
            error: function () {
                $("#reviewsContainer").html('<p class="text-white text-center">No reviews available.</p>');
            }
        });
    }

    function displayReviews(reviews) {
        var reviewsContainer = $("#reviewsContainer");
        reviewsContainer.empty();
        if (reviews && reviews.length > 0) {
            $.each(reviews, function (index, review) {
                reviewsContainer.append(`
                    <div class="card bg-dark text-white shadow-lg border-0 rounded w-75 mx-auto my-3">
                        <div class="card-body">
                            <h5 class="fw-bold">${review.user.name}</h5>
                            <p>${review.review}</p>
                            <p class="text-muted small">${new Date(review.created_at).toLocaleString()}</p>
                        </div>
                    </div>
                `);
            });
        } else {
            reviewsContainer.html('<p class="text-white text-center">No reviews available.</p>');
        }
    }

    loadReviews();

    $("#reviewForm").on("submit", function (e) {
        e.preventDefault();
        var reviewText = $.trim($("#reviewText").val());
        if (!reviewText) return;
        $.ajax({
            url: $(this).attr('action'),
            method: "POST",
            data: { review: reviewText },
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function () {
                loadReviews();
                $("#reviewForm")[0].reset();
            },
            error: function () {
                console.error("Error posting review.");
            }
        });
    });

    $("#calculateButton").on("click", function () {
        let age = parseInt($('#age').val());
        let gender = $('#gender').val();
        let height = parseFloat($('#height').val());
        let weight = parseFloat($('#weight').val());
        let activity = $('#activity').val();
        let resultDisplay = $('#result');

        // Validation
        if (!gender) {
            resultDisplay.text("Please select your gender.");
            return;
        }

        if (!activity) {
            resultDisplay.text("Please select your activity level.");
            return;
        }

        if (isNaN(age) || isNaN(height) || isNaN(weight)) {
            resultDisplay.text("Please enter valid numbers for age, height, and weight.");
            return;
        }

        if (age <= 0 || age > 120) {
            resultDisplay.text("Please enter a valid age between 1 and 120.");
            return;
        }

        if (height <= 50 || height > 300) {
            resultDisplay.text("Please enter a valid height between 50cm and 300cm.");
            return;
        }

        if (weight <= 10 || weight > 300) {
            resultDisplay.text("Please enter a valid weight between 10kg and 300kg.");
            return;
        }

        let bmr = gender === "male"
            ? 88.36 + (13.4 * weight) + (4.8 * height) - (5.7 * age)
            : 447.6 + (9.2 * weight) + (3.1 * height) - (4.3 * age);

        
        let activityMultiplier = {
            sedentary: 1.2,
            light: 1.375,
            moderate: 1.55,
            active: 1.725,
            "very active": 1.9
        }[activity];

        let totalCalories = Math.round(bmr * activityMultiplier);

        resultDisplay.text(`Your estimated daily caloric needs are ${totalCalories} calories.`);

        $('#age, #height, #weight').val('');
        $('#gender, #activity').val('');
    });
});
    </script>
<style>
    .transition-hover {
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .transition-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
    }
</style>
    @include('partials.footer')

</body>
@endsection