{{-- filepath: c:\xampp\htdocs\Train-Thrive\resources\views\admin\calculatorInsert.blade.php --}}
@extends('layouts.app')

@section('title', 'Add New Calculator')

@section('content')
<div class="container mt-5">
    <h1 class="text-center">Add New Calculator</h1>
    <div class="card shadow-sm mt-4">
        <div class="card-body">
            <form action="{{ route('calculatorInsert.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" required>
                </div>
                <div class="mb-3">
                    <label for="protein" class="form-label">Protein</label>
                    <input type="number" name="protein" id="protein" class="form-control" placeholder="Enter protein value" required>
                </div>
                <div class="mb-3">
                    <label for="carbs" class="form-label">Carbs</label>
                    <input type="number" name="carbs" id="carbs" class="form-control" placeholder="Enter carbs value" required>
                </div>
                <div class="mb-3">
                    <label for="fats" class="form-label">Fats</label>
                    <input type="number" name="fats" id="fats" class="form-control" placeholder="Enter fats value" required>
                </div>
                <div class="mb-3">
                    <label for="calories" class="form-label">Calories</label>
                    <input type="number" name="calories" id="calories" class="form-control" placeholder="Enter calories value" required>
                </div>
                <button type="submit" class="btn btn-success">Add Calculator</button>
                <a href="{{ route('calculator.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection