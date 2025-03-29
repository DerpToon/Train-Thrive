@extends('layouts.app')

@section('title','Workouts')

@section('content')
<body class="bg-black text-white d-flex flex-column min-vh-100 "  style="background: url('/imgs/Workouts/background.jpg') center/cover no-repeat;">
<main class="container text-center py-5 animate__animated animate__fadeIn min-vw-80">
    <h1 class="text-success fw-bold mb-4 text-uppercase animate__animated animate__fadeInDown">Select Your Workout</h1>
    <div class="row justify-content-evenly g-4">
        <div class="col-md-5 border border-success rounded p-4 shadow-lg bg-dark animate__animated animate__zoomIn">
            <h2 class="h4 fw-semibold mb-3">Choose Your Level</h2>
            <button class="btn btn-success m-2 animate__animated animate__bounceIn">Beginner</button>
            <button class="btn btn-success m-2 animate__animated animate__bounceIn">Intermediate</button>
            <button class="btn btn-success m-2 animate__animated animate__bounceIn">Advanced</button>
            <button class="btn btn-outline-success m-2 animate__animated animate__shakeX">Reset Level</button>
        </div>
        <div class="col-md-5 border border-success rounded p-4 shadow-lg bg-dark animate__animated animate__zoomIn">
            <h2 class="h4 fw-semibold mb-3">Select Muscle Group</h2>
            <button class="btn btn-success m-2 animate__animated animate__bounceIn">Chest</button>
            <button class="btn btn-success m-2 animate__animated animate__bounceIn">Back</button>
            <button class="btn btn-success m-2 animate__animated animate__bounceIn">Legs</button>
            <button class="btn btn-success m-2 animate__animated animate__bounceIn">Arms</button>
            <button class="btn btn-success m-2 animate__animated animate__bounceIn">Shoulders</button>
            <button class="btn btn-success m-2 animate__animated animate__bounceIn">Core</button>
            <button class="btn btn-outline-success m-2 animate__animated animate__shakeX">Reset Muscle</button>
        </div>
    </div>      
      <div id="workout-results" class="d-flex flex-wrap gap-4 mt-4 p-4 animate__animated animate__fadeInUp justify-content-center">

      </div>
    </main>
@include('partials.footer')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>




<script>$(document).ready(function () {
    let selectedLevel = '';
    let selectedMuscle = '';

    function fetchWorkouts() {
        $.ajax({    
            url: '/workouts', // Laravel route to fetch workouts
            method: 'GET',
            data: {
                level: selectedLevel,
                muscle: selectedMuscle
            },
            success: function (response) {
                console.log(response);
                $('#workout-results').empty(); // Clear previous results
                if (response.workouts.length > 0) {
                    response.workouts.forEach(workout => {
                        $('#workout-results').append(`
                            <div class="bg-dark rounded-3 col-md-4 p-3 border border-success rounded shadow-lg">
                                <h4 class="fw-bold text-success">${workout.name}</h4>
                                <p class="text-white">${workout.description}</p>
                                <span class="badge bg-success">${workout.level}</span>
                                <span class="badge bg-warning">${workout.muscle_group}</span>
                            </div>
                        `);
                    });
                } else {
                    $('#workout-results').append('<p class="text-danger">No workouts found.</p>');
                }
            },
            error: function () {
                $('#workout-results').html('<p class="text-danger">Error fetching workouts.</p>');
            }
        });
    }

    $('.btn-success').click(function () {
        let buttonText = $(this).text();
        if ($(this).parent().find('h2').text().includes('Level')) {
            selectedLevel = buttonText !== 'Reset Level' ? buttonText : '';
        } else {
            selectedMuscle = buttonText !== 'Reset Muscle' ? buttonText : '';
        }
        fetchWorkouts();
    });

    $('.btn-outline-success').click(function () {
        selectedLevel = '';
        selectedMuscle = '';
        fetchWorkouts();
    });

    fetchWorkouts(); // Initial fetch
});
</script>
</body>
@endsection
