@extends('layouts.app')

@section('title','Calculator')

@section('content')

<body class="bg-black text-white d-flex flex-column min-vh-100" style="background: url('/imgs/Calculator/Background.png') center/cover no-repeat;">
    <main class="container text-center py-5 flex-grow-1">
        
        <form id="macros-form" class="mx-auto col-md-6 bg-dark p-4 rounded shadow-lg animate__animated animate__zoomIn">
            <div class="mb-3">
                <h1 class="text-success fw-bold mb-4 animate__animated animate__fadeInDown">Macros Calculator</h1>
                <label for="food-name" class="form-label fw-semibold">Food Item</label>
                <input type="text" id="food-name" class="form-control bg-secondary text-white border-0" placeholder="Search for food..." autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="grams" class="form-label fw-semibold">Grams Consumed</label>
                <input type="number" id="grams" class="form-control bg-secondary text-white border-0" placeholder="e.g., 100" required>
            </div>
            <div id="error-message" class="text-danger d-none"></div>
            <div class="d-flex justify-content-center gap-3">
                <button type="button" id="add-food" class="btn btn-success px-4 py-2 animate__animated animate__bounceIn">Add Food</button>
                <button type="button" id="reset-table" class="btn btn-warning px-4 py-2 animate__animated animate__shakeX">Reset Table</button>
            </div>
        </form>
        <div class="table-responsive mt-4 animate__animated animate__fadeInUp">
            <table class="table table-dark table-bordered table-hover shadow-lg rounded overflow-hidden">
                <thead>
                    <tr class="bg-success text-black text-uppercase text-center animate__animated animate__fadeIn">
                        <th class="p-3">Food</th>
                        <th class="p-3">Grams</th>
                        <th class="p-3">Proteins</th>
                        <th class="p-3">Carbs</th>
                        <th class="p-3">Fats</th>
                        <th class="p-3">Calories</th>
                    </tr>
                </thead>
                <tbody id="macros-body" class="text-center align-middle"></tbody>
                <tfoot>
                    <tr class="bg-secondary text-white fw-bold text-center animate__animated animate__fadeInUp">
                        <td colspan="2" class="p-3">Total</td>
                        <td id="total-proteins" class="p-3">0g</td>
                        <td id="total-carbs" class="p-3">0g</td>
                        <td id="total-fats" class="p-3">0g</td>
                        <td id="total-calories" class="p-3">0</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </main>
    @include('partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</body>

@endsection
