<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PATCH')

    <div class="mb-3">
        <label for="name" class="form-label text-success">Name</label>
        <input type="text" name="name" id="name" class="form-control bg-dark text-white border-success"
               placeholder="Enter your name" value="{{ old('name', Auth::user()->name) }}">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label text-success">Email</label>
        <input type="email" name="email" id="email" class="form-control bg-dark text-white border-success"
               placeholder="Enter your email" value="{{ old('email', Auth::user()->email) }}">
    </div>

    <button type="submit" class="btn btn-success mt-3">Save Changes</button>
</form>
