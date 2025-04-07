<div class="container mt-5">
    <div class="card bg-dark text-white shadow-lg border-0 rounded w-100">
        <div class="card-body p-5">
            <h2 class="fw-bold text-success text-center mb-4">Profile Information</h2>
            <p class="text-white text-center">
                Update your account's profile information and email address.
            </p>

            <form method="post" action="{{ route('profile.update') }}" class="w-50 mx-auto">
                @csrf
                @method('patch')

                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control bg-dark text-white border-light" id="name" name="name" value="{{ old('name', Auth::user()->name) }}" required>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control bg-dark text-white border-light" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror

                    @if (!Auth::user()->hasVerifiedEmail())
                        <div class="mt-2 text-center">
                            <p class="text-sm text-warning">
                                Your email address is unverified.
                            </p>
                            <button type="submit" form="send-verification" class="btn btn-outline-light btn-sm">Resend Verification Email</button>

                            @if (session('status') === 'verification-link-sent')
                                <p class="text-sm text-success mt-2">A new verification link has been sent to your email.</p>
                            @endif
                        </div>
                    @endif
                </div>

                <div class="d-flex flex-column align-items-center gap-3">
                    <button type="submit" class="btn btn-success w-50">Save Changes</button>
                    <button type="button" class="btn btn-outline-light w-50" onclick="window.history.back();">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
