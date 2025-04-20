<form method="POST" action="{{ route('password.update') }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="current_password" class="form-label text-success">Current Password</label>
        <input type="password" name="current_password" id="current_password" class="form-control bg-dark text-white border-success"
               placeholder="Enter current password">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label text-success">New Password</label>
        <input type="password" name="password" id="new_password" class="form-control bg-dark text-white border-success" placeholder="Enter new password">
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="form-label text-success">Confirm New Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control bg-dark text-white border-success"
               placeholder="Confirm new password">
    </div>

    <button type="submit" class="btn btn-success mt-3">Update Password</button>
</form>
