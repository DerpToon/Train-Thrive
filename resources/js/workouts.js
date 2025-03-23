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
                $('#workout-results').empty(); // Clear previous results
                if (response.workouts.length > 0) {
                    response.workouts.forEach(workout => {
                        $('#workout-results').append(`
                            <div class="col-md-4 p-3 border border-success rounded shadow-lg">
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
