<form method="POST" action="{{ route('profile.destroy') }}">
    @csrf
    @method('DELETE')

    <div class="mb-3">
        <label for="password" class="form-label text-danger">Confirm Password to Delete</label>
        <input type="password" name="password" id="confirm_password" class="form-control bg-dark text-white border-danger" placeholder="Enter your password to confirm">
    </div>

    <button type="submit" class="btn btn-danger mt-3">Delete Account</button>
</form>
