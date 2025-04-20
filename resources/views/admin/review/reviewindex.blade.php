
@extends('layouts.admin-layout')

@section('title', 'Reviews')

@section('content')
<h4>All Reviews</h4>

<div class="mb-3">
    <input type="text" id="reviewSearchInput" class="form-control" placeholder="Search reviews...">
</div>

<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>Review</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="reviewTableBody">
        @foreach ($reviews as $review)
            <tr>
                <td>{{ $review->id }}</td>
                <td>{{ $review->user->name ?? 'Unknown User' }}</td>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#reviewSearchInput').on('input', function () {
            const query = $(this).val();

            $.ajax({
                url: '{{ route('reviews.search') }}',
                method: 'GET',
                data: { query: query },
                success: function (response) {
                    const reviewTableBody = $('#reviewTableBody');
                    reviewTableBody.empty();

                    response.forEach(review => {
                        reviewTableBody.append(`
                            <tr>
                                <td>${review.id}</td>
                                <td>${review.user ? review.user.name : 'Unknown User'}</td>
                                <td>${review.review}</td>
                                <td>
                                    <form action="/admin/reviews/${review.id}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        `);
                    });
                }
            });
        });
    });
</script>
@endsection