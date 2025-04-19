
@extends('layouts.admin-layout')

@section('title', 'Users')

@section('content')
<h4>All Users</h4>

<!-- Add User Button -->
<div class="mb-3">
    <a href="{{ route('users.create') }}" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Add User
    </a>
</div>

<!-- Search Bar -->
<div class="mb-3">
    <input type="text" id="userSearchInput" class="form-control" placeholder="Search users...">
</div>

<!-- User Table -->
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Privilege</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="userTableBody">
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone ?? 'N/A' }}</td>
                <td>{{ ucfirst($user->privilege) }}</td>
                <td>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- jQuery Script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#userSearchInput').on('input', function () {
            const query = $(this).val();

            $.ajax({
                url: '{{ route('users.search') }}',
                method: 'GET',
                data: { query: query },
                success: function (response) {
                    const userTableBody = $('#userTableBody');
                    userTableBody.empty();

                    response.forEach(user => {
                        userTableBody.append(`
                            <tr>
                                <td>${user.id}</td>
                                <td>${user.name}</td>
                                <td>${user.email}</td>
                                <td>${user.phone ?? 'N/A'}</td>
                                <td>${user.privilege.charAt(0).toUpperCase() + user.privilege.slice(1)}</td>
                                <td>
                                    <form action="/admin/users/${user.id}" method="POST">
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