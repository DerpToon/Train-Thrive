@extends('layouts.admin-layout')

@section('title', 'Workouts')

@section('content')
<h4 class="mb-4">Workouts</h4>

<!-- Filter and Add New Workout -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <label for="muscleGroupFilter" class="form-label">Filter by Muscle Group</label>
        <select id="muscleGroupFilter" class="form-select" style="width: 200px;">
            <option value="">All Muscle Groups</option>
            @foreach ($muscleGroups as $muscleGroup)
                <option value="{{ $muscleGroup }}">{{ $muscleGroup }}</option>
            @endforeach
        </select>
    </div>
    <a href="{{ route('workouts.create') }}" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Add New Workout
    </a>
</div>

<!-- Items Per Page Dropdown -->
<div class="mb-3">
    <label for="itemsPerPage" class="form-label">Workouts per page:</label>
    <select id="itemsPerPage" class="form-select" style="width: 100px;">
        <option value="10" {{ $itemsPerPage == 10 ? 'selected' : '' }}>10</option>
        <option value="25" {{ $itemsPerPage == 25 ? 'selected' : '' }}>25</option>
        <option value="50" {{ $itemsPerPage == 50 ? 'selected' : '' }}>50</option>
    </select>
</div>

<!-- Workouts Table -->
<div class="table-responsive">
    <table class="table table-dark table-striped table-bordered text-center" id="workoutsTable">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Muscle Group</th>
                <th>Level</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($workouts as $workout)
                <tr data-muscle-group="{{ $workout->muscle_group }}">
                    <td>{{ $workout->id }}</td>
                    <td>{{ $workout->name }}</td>
                    <td>{{ $workout->muscle_group }}</td>
                    <td>{{ $workout->level }}</td>
                    <td>{!! $workout->description !!}</td> <!-- Rendered as raw HTML -->
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('workouts.edit', $workout->id) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i> Edit
                        </a>

                        <!-- Delete Button -->
                        <form action="{{ route('workouts.destroy', $workout->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Pagination -->
<div class="d-flex justify-content-between align-items-center mt-3">
    {{ $workouts->appends(['itemsPerPage' => $itemsPerPage])->links('pagination::bootstrap-4') }}
</div>

<script>
    // Handle "Workouts per page" change
    document.getElementById('itemsPerPage').addEventListener('change', function () {
        const itemsPerPage = this.value;
        const url = new URL(window.location.href);
        url.searchParams.set('itemsPerPage', itemsPerPage);
        window.location.href = url.toString();
    });

    // Handle filtering by muscle group
    document.getElementById('muscleGroupFilter').addEventListener('change', function () {
        const muscleGroup = this.value;

        // Send an AJAX request to fetch filtered workouts
        fetch(`{{ route('admin.workouts.filter') }}?muscleGroup=${muscleGroup}`, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
            },
        })
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('#workoutsTable tbody');
            tableBody.innerHTML = ''; // Clear the table

            // Append filtered workouts to the table
            data.workouts.forEach(workout => {
                const row = `
                    <tr>
                        <td>${workout.id}</td>
                        <td>${workout.name}</td>
                        <td>${workout.muscle_group}</td>
                        <td>${workout.level}</td>
                        <td>${workout.description}</td> <!-- Rendered as raw HTML -->
                        <td>
                            <a href="/admin/workouts/${workout.id}/edit" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="/admin/workouts/${workout.id}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                `;
                tableBody.insertAdjacentHTML('beforeend', row);
            });
        })
        .catch(error => console.error('Error:', error));
    });
</script>
@endsection