<div class="container mt-5">
    <div class="card bg-dark text-white shadow-lg border-0 rounded w-100">
        <div class="card-body p-5">
            <h2 class="fw-bold text-success text-center mb-4">Update Password</h2>
            <p class="text-white text-center">
                Ensure your account is using a strong, secure password to stay protected.
            </p>

            <form method="post" action="{{ route('password.update') }}" class="w-50 mx-auto">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="current_password" class="form-label">Current Password</label>
                    <input type="password" class="form-control bg-dark text-white border-light" id="current_password" name="current_password" required placeholder="Enter current password">
                    @error('current_password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" class="form-control bg-dark text-white border-light" id="password" name="password" required placeholder="Enter new password">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm New Password</label>
                    <input type="password" class="form-control bg-dark text-white border-light" id="password_confirmation" name="password_confirmation" required placeholder="Confirm new password">
                    @error('password_confirmation')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex flex-column align-items-center gap-3">
                    <button type="submit" class="btn btn-success w-50">Update Password</button>
                    <button type="button" class="btn btn-outline-light w-50" onclick="window.history.back();">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
