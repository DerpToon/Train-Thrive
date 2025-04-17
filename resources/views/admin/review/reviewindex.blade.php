
@extends('layouts.admin-layout')

@section('title', 'Reviews')

@section('content')
<h4>All Reviews</h4>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Review</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reviews as $review)
            <tr>
                <td>{{ $review->id }}</td>
                <td>{{ $review->user->name }}</td>
                <td>{{ $review->review }}</td>
                <td>
                    <form action="{{ route('reviews.destroy', $review->id) }}" method="POST">
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