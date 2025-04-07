<div class="container mt-5">
    <div class="card bg-dark text-white shadow-lg border-0 rounded-lg w-100">
        <div class="card-body text-center p-5">
            <h2 class="fw-bold text-danger mb-4">Delete Account</h2>
            <p class="text-white">
                Once your account is deleted, all of its resources and data will be permanently removed. Before proceeding, download any data you wish to retain.
            </p>

            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <div class="mb-3 w-50 mx-auto">
                    <label for="password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control bg-dark text-white border-light" id="password" name="password" required placeholder="Enter your password">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex flex-column align-items-center gap-3">
                    <button type="submit" class="btn btn-danger w-50">Delete Account</button>
                    <button type="button" class="btn btn-outline-light w-50" onclick="window.history.back();">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
