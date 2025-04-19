@extends('layouts.admin-layout')

@section('title', 'Add User')

@section('content')
<h4>Add New User</h4>
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" name="phone" id="phone" class="form-control">
    </div>
    <div class="mb-3">
        <label for="privilege" class="form-label">Privilege</label>
        <select name="privilege" id="privilege" class="form-select" required>
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Add User</button>
</form>
@endsection