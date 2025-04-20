@extends('layouts.admin-layout')

@section('content')
<div class="container">
    <h1 class="mb-4">Products</h1>

    <!-- Products Per Page Form -->
    <form method="GET" action="{{ route('products.index') }}" class="mb-3">
        <label for="per_page">Products per page:</label>
        <select name="per_page" id="per_page" onchange="this.form.submit()">
            <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
            <option value="20" {{ request('per_page') == 20 ? 'selected' : '' }}>20</option>
            <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
            <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
        </select>
    </form>

    <a href="{{ route('products.create') }}" class="btn btn-success mb-3">Add New Product</a>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>${{ $product->price }}</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
    {{ $products->links() }}
</div>
</div>
@endsection