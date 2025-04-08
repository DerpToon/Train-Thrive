@extends('layouts.app')

@section('title', 'Home')

@section('content')
<body class="bg-dark text-white">

    <!-- Hero Section with Full-Width Image -->
    <main class="container-fluid text-center py-5 d-flex flex-column justify-content-center align-items-center"
          style="background: url('{{ asset('imgs/Home page/heroImage.jpg') }}') no-repeat top center; background-size: cover; width: 100%; height: 50vh;">
        <h1 class="fw-bold mt-4 mb-4">TO GIVE IT ALL</h1>
        <h3 class="text-success mb-4">ALWAYS LIVE ACTIVE</h3>
    </main>

    <!-- Categories Section -->
    <section class="container text-center py-4">
        <h2 class="fw-bold mt-4 mb-4">CATEGORIES</h2>
        <div class="row row-cols-2 row-cols-md-4 g-4">
            <div class="col">
                <img src="{{ asset('imgs/Home page/powder.png') }}" class="img-fluid">
                <button class="btn btn-success w-100 mt-2">POWDERS</button>
            </div>
            <div class="col">
                <img src="{{ asset('imgs/Home page/mass-gainer.png') }}" class="img-fluid">
                <button class="btn btn-success w-100 mt-2">MASS GAINERS</button>
            </div>
            <div class="col">
                <img src="{{ asset('imgs/Products/Product Images/21.png') }}" class="img-fluid">
                <button class="btn btn-success w-100 mt-2">ENERGY FLAVORS</button>
            </div>
            <div class="col">
                <img src="{{ asset('imgs/Home page/flakes.png') }}" class="img-fluid">
                <button class="btn btn-success w-100 mt-2">FLAKES</button>
            </div>
        </div>
    </section>

    <!-- Exclusive Services Section -->
    <section class="exclusive-services container bg-dark text-white rounded p-4 my-5">
        <h2 class="text-center mt-4 mb-4">EXCLUSIVE SERVICES</h2>
        <div class="d-flex justify-content-center gap-4 flex-wrap">
            <a href="{{ url('About-Us.html') }}" class="text-decoration-none text-white">
                <div class="service-card text-center p-3 bg-success rounded d-flex flex-column align-items-center">
                    <img src="{{ asset('imgs/Home page/Loyalty.png') }}" alt="Loyalty Program icon" class="img-fluid" style="width: 120px; height: 120px;">
                    <h3 class="mt-2">Loyalty Program</h3>
                </div>
            </a>
            <a href="{{ url('Workouts.html') }}" class="text-decoration-none text-white">
                <div class="service-card text-center p-3 bg-success rounded d-flex flex-column align-items-center">
                    <img src="{{ asset('imgs/Home page/Plans.png') }}" alt="Workouts Plans icon" class="img-fluid" style="width: 120px; height: 120px;">
                    <h3 class="mt-2">Workouts Plans</h3>
                </div>
            </a>
            <a href="#nutrition-advice-section" class="text-decoration-none text-white">
                <div class="service-card text-center p-3 bg-success rounded d-flex flex-column align-items-center">
                    <img src="{{ asset('imgs/Home page/Nutrition.png') }}" alt="Nutrition Advice icon" class="img-fluid" style="width: 120px; height: 120px;">
                    <h3 class="mt-2">Nutrition Advice</h3>
                </div>
            </a>
        </div>
    </section>

    <!-- Calorie Calculator Section -->
    <section class="container bg-dark text-white rounded p-4 my-5">
        <h2 class="text-center mt-4 mb-4">Calorie Calculator</h2>
        <div class="row g-3">
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Age in Years">
            </div>
            <div class="col-md-6">
                <select class="form-control">
                    <option>Select your gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Height in Cms">
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" placeholder="Weight in Kgs">
            </div>
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

        <!-- Reviews will be loaded here dynamically via AJAX -->
        <div id="reviewsContainer"></div>

        <!-- Review form (only visible for logged-in users) -->
        @auth
            <form id="reviewForm" method="POST" action="{{ route('reviews.store') }}">
                @csrf
                <textarea name="review" id="reviewText" class="form-control bg-dark text-white border-light w-75 mx-auto" rows="4" placeholder="Write your review..." required></textarea>
                <button type="submit" class="btn btn-success mt-3">Add Review</button>
            </form>
        @endauth
    </section>

    <!-- jQuery and AJAX Code for Reviews -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    $(document).ready(function () {
        // Function to load reviews from the database via the API endpoint
        function loadReviews() {
            $.ajax({
                url: "{{ url('/reviews') }}",
                method: "GET",
                dataType: "json",
                success: function (response) {
                    displayReviews(response.reviews);
                },
                error: function (xhr) {
                    console.error("Error loading reviews:", xhr);
                    $("#reviewsContainer").html('<p class="text-white text-center">No reviews available.</p>');
                }
            });
        }

        // Function to display reviews in the #reviewsContainer element
        function displayReviews(reviews) {
            var reviewsContainer = $("#reviewsContainer");
            reviewsContainer.empty();

            if (reviews && reviews.length > 0) {
                $.each(reviews, function (index, review) {
                    var reviewHtml =
                        '<div class="card bg-dark text-white shadow-lg border-0 rounded w-75 mx-auto my-3">' +
                            '<div class="card-body">' +
                                '<h5 class="fw-bold">' + review.user.name + '</h5>' +
                                '<p>' + review.review + '</p>' +
                                '<p class="text-muted small">' + new Date(review.created_at).toLocaleString() + '</p>' +
                            '</div>' +
                        '</div>';
                    reviewsContainer.append(reviewHtml);
                });
            } else {
                reviewsContainer.html('<p class="text-white text-center">No reviews available.</p>');
            }
        }

        // Load reviews initially when the page loads
        loadReviews();

        // Handle the review form submission using AJAX
        $("#reviewForm").on("submit", function (e) {
            e.preventDefault();

            var reviewText = $.trim($("#reviewText").val());
            if (!reviewText) {
                return;
            }

            $.ajax({
                url: $(this).attr('action'), // POST route for storing reviews
                method: "POST",
                data: { review: reviewText },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    // Reload the reviews from the database on success
                    loadReviews();
                    $("#reviewForm")[0].reset();
                },
                error: function (xhr) {
                    console.error("Error posting review:", xhr);
                }
            });
        });
    });
    </script>

    @include('partials.footer')

</body>
@endsection
