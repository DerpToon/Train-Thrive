
@extends('layouts.admin-layout')

@section('title', 'Calculator')

@section('content')
<h4>All Food Items</h4>
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
    <tbody>
        @foreach ($calculators as $calculator)
            <tr>
                <td>{{ $calculator->id }}</td>
                <td>{{ $calculator->name }}</td>
                <td>{{ $calculator->protein }}</td>
                <td>{{ $calculator->carbs }}</td>
                <td>{{ $calculator->fats }}</td>
                <td>{{ $calculator->calories }}</td>
                <td>
                    <form action="{{ route('calculator.destroy', $calculator->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection