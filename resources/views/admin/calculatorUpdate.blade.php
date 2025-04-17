{{-- filepath: c:\xampp\htdocs\Train-Thrive\resources\views\admin\calculatorUpdate.blade.php --}}
@extends('layouts.app')

@section('title', 'Update Calculator')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Update Calculator</h1>
    <div class="card shadow-sm mt-4">
        <div class="card-body">
            <form action="{{ route('calculatorUpdate.store', $calculator->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $calculator->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="protein" class="form-label">Protein</label>
                    <input type="number" name="protein" id="protein" class="form-control" value="{{ $calculator->protein }}" required>
                </div>
                <div class="mb-3">
                    <label for="carbs" class="form-label">Carbs</label>
                    <input type="number" name="carbs" id="carbs" class="form-control" value="{{ $calculator->carbs }}" required>
                </div>
                <div class="mb-3">
                    <label for="fats" class="form-label">Fats</label>
                    <input type="number" name="fats" id="fats" class="form-control" value="{{ $calculator->fats }}" required>
                </div>
                <div class="mb-3">
                    <label for="calories" class="form-label">Calories</label>
                    <input type="number" name="calories" id="calories" class="form-control" value="{{ $calculator->calories }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Calculator</button>
                <a href="{{ route('admin) }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection