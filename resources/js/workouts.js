$(document).ready(function () {
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
                            <div class="col-md-4 p-3 border border-success rounded shadow-lg bg-dark">
                             <div class="card p-3">
                             <h4 class="fw-bold text-success mb-2">${workout.name}</h4>
                            <p class="text-white mb-3">${workout.description}</p>
                            <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-success text-dark fw-bold">${workout.level}</span>
                            <span class="badge bg-warning text-dark fw-bold">${workout.muscle_group}</span>
                            </div>
                            <button class="btn btn-success w-100 mt-3">Start Workout</button>
                            </div>
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
