@extends('layouts.admin-layout')

@section('title', 'Calculator')

@section('content')
<h4 class="mb-4">Food Items</h4>

<!-- Add New Food Item and Items Per Page -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <a href="{{ route('calculator.create') }}" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Add New Food Item
    </a>
    <div>
        <label for="itemsPerPage" class="form-label">Items per page:</label>
        <select id="itemsPerPage" class="form-select" style="width: 100px;">
            <option value="10" {{ $itemsPerPage == 10 ? 'selected' : '' }}>10</option>
            <option value="25" {{ $itemsPerPage == 25 ? 'selected' : '' }}>25</option>
            <option value="50" {{ $itemsPerPage == 50 ? 'selected' : '' }}>50</option>
        </select>
    </div>
</div>

<!-- Search Input -->
<div class="mb-3">
    <input type="text" id="searchInput" class="form-control" placeholder="Search by name">
</div>

<!-- Food Items Table -->
<div class="table-responsive">
    <table class="table table-dark table-striped table-bordered text-center">
        <thead class="table-dark">
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
                        <a href="{{ route('calculator.edit', $calculator->id) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('calculator.destroy', $calculator->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Pagination -->
<div class="d-flex justify-content-between align-items-center mt-3">
    {{ $calculators->appends(['itemsPerPage' => $itemsPerPage])->links('pagination::bootstrap-4') }}
</div>

<script>
    document.getElementById('itemsPerPage').addEventListener('change', function () {
        const itemsPerPage = this.value;
        const url = new URL(window.location.href);
        url.searchParams.set('itemsPerPage', itemsPerPage);
        window.location.href = url.toString();
    });

    document.getElementById('searchInput').addEventListener('input', function () {
        const searchValue = this.value;

        fetch(`{{ route('calculator.search') }}?search=${searchValue}`)
            .then(response => response.json())
            .then(data => {
                const tableBody = document.getElementById('calculatorTableBody');
                tableBody.innerHTML = '';

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
                                <a href="/admin/calculators/${calculator.id}/edit" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="/admin/calculators/${calculator.id}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    `;
                    tableBody.insertAdjacentHTML('beforeend', row);
                });
            });
    });
</script>
@endsection