@extends('layouts.app')

@section('title','caculator')

@section('content')

<body class="bg-black text-white d-flex flex-column min-vh-100">
    <main class="container text-center py-5 flex-grow-1">
        <h1 class="text-success fw-bold mb-4">Macros Calculator</h1>
        <form id="macros-form" class="mx-auto col-md-6">
            <div class="mb-3">
                <label for="food-name" class="form-label">Food Item</label>
                <input type="text" id="food-name" class="form-control bg-dark text-white" placeholder="Search for food..." autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="grams" class="form-label">Grams Consumed</label>
                <input type="number" id="grams" class="form-control bg-dark text-white" placeholder="e.g., 100" required>
            </div>
            <div id="error-message" class="text-danger d-none"></div>
            <div class="d-flex justify-content-center gap-3">
                <button type="button" id="add-food" class="btn btn-success">Add Food</button>
                <button type="button" id="reset-table" class="btn btn-warning">Reset Table</button>
            </div>
        </form>
        <div class="table-responsive mt-4">
            <table class="table table-dark table-bordered">
                <thead>
                    <tr class="bg-success text-black">
                        <th>Food</th>
                        <th>Grams</th>
                        <th>Proteins</th>
                        <th>Carbs</th>
                        <th>Fats</th>
                        <th>Calories</th>
                    </tr>
                </thead>
                <tbody id="macros-body"></tbody>
                <tfoot>
                    <tr class="bg-dark">
                        <td colspan="2" class="fw-bold">Total</td>
                        <td id="total-proteins">0g</td>
                        <td id="total-carbs">0g</td>
                        <td id="total-fats">0g</td>
                        <td id="total-calories">0</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </main>
    @include('partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

@endsection


