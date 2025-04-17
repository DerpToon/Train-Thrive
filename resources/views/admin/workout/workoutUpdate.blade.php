@extends('layouts.app')

@section('title', 'Update Workout')

@include('partials.navbar')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Update Workout</h1>
    <div class="card shadow-sm mt-4">
        <div class="card-body">
            <form action="{{ route('workoutUpdate.store', $workout->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Workout Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $workout->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="muscle_group" class="form-label">Muscle Group</label>
                    <input type="text" name="muscle_group" id="muscle_group" class="form-control" value="{{ $workout->muscle_group }}" required>
                </div>
                <div class="mb-3">
                    <label for="level" class="form-label">Level</label>
                    <input type="text" name="level" id="level" class="form-control" value="{{ $workout->level }}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="3" required>{{ $workout->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update Workout</button>
                <a href="{{ route('admin) }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
