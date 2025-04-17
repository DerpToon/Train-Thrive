
@extends('layouts.admin-layout')

@section('title', 'Workouts')

@section('content')
<h4>All Workouts</h4>
<table class="table table-bordered table-striped">
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
            <tr>
                <td>{{ $workout->id }}</td>
                <td>{{ $workout->name }}</td>
                <td>{{ $workout->muscle_group }}</td>
                <td>{{ $workout->level }}</td>
                <td>{{ $workout->description }}</td>
                <td>
                    <form action="{{ route('workouts.destroy', $workout->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection