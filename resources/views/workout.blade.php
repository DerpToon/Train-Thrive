@extends('layouts.app')

@section('title','workouts')

@section('content')
<body class="bg-black text-white d-flex flex-column min-vh-100">
<main class="container text-center py-5">
    <h1 class="text-success fw-bold mb-4 text-uppercase">Select Your Workout</h1>
    <div class="row justify-content-evenly g-4">
        <div class="col-md-5 border border-success rounded p-4 shadow-lg">
            <h2 class="h4 fw-semibold mb-3">Choose Your Level</h2>
            <button class="btn btn-success m-2">Beginner</button>
            <button class="btn btn-success m-2">Intermediate</button>
            <button class="btn btn-success m-2">Advanced</button>
            <button class="btn btn-outline-success m-2">Reset Level</button>
        </div>
        <div class="col-md-5 border border-success rounded p-4 shadow-lg">
            <h2 class="h4 fw-semibold mb-3">Select Muscle Group</h2>
            <button class="btn btn-success m-2">Chest</button>
            <button class="btn btn-success m-2">Back</button>
            <button class="btn btn-success m-2">Legs</button>
            <button class="btn btn-success m-2">Arms</button>
            <button class="btn btn-success m-2">Shoulders</button>
            <button class="btn btn-success m-2">Core</button>
            <button class="btn btn-outline-success m-2">Reset Muscle</button>
        </div>
    </div>
    <div id="workout-results" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mt-4 p-4"></div>
</main>
@include('partials.footer')
</body>
@endsection