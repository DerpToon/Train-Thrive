@extends('layouts.admin-layout')

@section('title', 'Calculator')

@section('content')
<h4>All Food Items</h4>

<!-- Add New Calculator Button -->
<div class="mb-3">
    <a href="{{ route('calculator.create') }}" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle"></i> Add New Food Item
    </a>

    <!-- Search Input -->
    <input type="text" id="searchInput" class="form-control" placeholder="Search by name">
</div>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Protein</th>
            <th>Carbs</th>
            <th>Fats</th>
            <th>Calories</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="calculatorTableBody">
        @foreach ($calculators as $calculator)
            <tr>
                <td>{{ $calculator->id }}</td>
                <td>{{ $calculator->name }}</td>
                <td>{{ $calculator->protein }}</td>
                <td>{{ $calculator->carbs }}</td>
                <td>{{ $calculator->fats }}</td>
                <td>{{ $calculator->calories }}</td>
                <td>
                    <a href="{{ route('calculator.edit', $calculator->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('calculator.destroy', $calculator->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<script>
    document.getElementById('searchInput').addEventListener('input', function () {
        const searchValue = this.value;

        // Perform AJAX request
        fetch(`{{ route('calculator.search') }}?search=${searchValue}`)
            .then(response => response.json())
            .then(data => {
                const tableBody = document.getElementById('calculatorTableBody');
                tableBody.innerHTML = ''; // Clear the table body

                // Populate the table with the filtered results
                data.forEach(calculator => {
                    const row = `
                        <tr>
                            <td>${calculator.id}</td>
                            <td>${calculator.name}</td>
                            <td>${calculator.protein}</td>
                            <td>${calculator.carbs}</td>
                            <td>${calculator.fats}</td>
                            <td>${calculator.calories}</td>
                            <td>
                                <a href="/admin/calculators/${calculator.id}/edit" class="btn btn-primary btn-sm">Edit</a>
                                <form action="/admin/calculators/${calculator.id}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    `;
                    tableBody.innerHTML += row;
                });
            });
    });
</script>
@endsection