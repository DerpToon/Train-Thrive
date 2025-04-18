@extends('layouts.admin-layout')

@section('title', 'Workouts')

@section('content')
<h4 class="mb-4">All Workouts</h4>

<!-- Filter by Muscle Group -->
<div class="mb-3">
    <label for="muscleGroupFilter" class="form-label">Filter by Muscle Group</label>
    <select id="muscleGroupFilter" class="form-select" onchange="filterWorkouts()">
        <option value="">All Muscle Groups</option>
        @foreach ($muscleGroups as $muscleGroup)
            <option value="{{ $muscleGroup }}">{{ $muscleGroup }}</option>
        @endforeach
    </select>
</div>

<!-- Add New Workout Button -->
<div class="mb-3">
    <a href="{{ route('workouts.create') }}" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Add New Workout
    </a>
</div>

<table class="table table-bordered table-striped" id="workoutsTable">
    <thead>
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
                <td>{{ $workout->description }}</td>
                <td>
                    <!-- Edit Button -->
                    <a href="{{ route('workouts.edit', $workout->id) }}" class="btn btn-primary btn-sm">
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

<script>
    function filterWorkouts() {
        const filterValue = document.getElementById('muscleGroupFilter').value.toLowerCase();
        const rows = document.querySelectorAll('#workoutsTable tbody tr');

        rows.forEach(row => {
            const muscleGroup = row.getAttribute('data-muscle-group').toLowerCase();
            if (filterValue === '' || muscleGroup === filterValue) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
</script>
@endsection