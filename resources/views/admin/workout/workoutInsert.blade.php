@extends('layouts.admin-layout')


@section('title', 'Add New Workout')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Add New Workout</h1>
    <div class="card shadow-sm mt-4">
        <div class="card-body">
            <form action="{{ route('workoutInsert.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="workoutName" class="form-label">Workout Name</label>
                    <input type="text" class="form-control" name="name" id="workoutName" placeholder="Enter workout name" required>
                </div>
                <div class="mb-3">
                    <label for="muscleGroup" class="form-label">Muscle Group</label>
                    <input type="text" class="form-control" name="muscle_group" id="muscleGroup" placeholder="Enter muscle group" required>
                </div>
                <div class="mb-3">
                    <label for="workoutLevel" class="form-label">Level</label>
                    <input type="text" class="form-control" name="level" id="workoutLevel" placeholder="Enter difficulty level" required>
                </div>
                <div class="mb-3">
                    <label for="workoutDescription" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="workoutDescription" rows="3" placeholder="Enter workout description" required></textarea>
                </div>
                <button type="submit" class="btn btn-success">Add Workout</button>
                <a href="{{ route('workout.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
