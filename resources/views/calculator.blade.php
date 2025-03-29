@extends('layouts.app')

@section('title','Calculator')

@section('content')

<body class="bg-black text-white d-flex flex-column min-vh-100" style="background: url('/imgs/Calculator/Background.png') center/cover no-repeat;">
    <main class="container text-center py-5 flex-grow-1">
        
        <form id="macros-form" class="mx-auto col-md-6 bg-dark p-4 rounded shadow-lg animate__animated animate__zoomIn">
            <div class="mb-3 position-relative">
                <label for="food-name" class="form-label fw-semibold">Food Item</label>
                <input type="text" id="food-name" class="form-control bg-secondary text-white border-0" placeholder="Search for food..." autocomplete="off">
                <ul id="food-suggestions" class="list-group position-absolute w-100 d-none" style="z-index: 1000;">
                    <!-- Suggestions will be dynamically added here -->
                </ul>
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
        <div class="table-responsive mt-5 animate__animated animate__fadeInUp" style="margin-top: 100px; border-radius: 0.5rem; overflow: hidden;">
            <table class="table table-dark table-bordered table-hover shadow-lg rounded">
                <thead>
                    <tr class="bg-success text-black text-uppercase text-center animate__animated animate__fadeIn">
                        <th class="p-3">Food</th>
                        <th class="p-3">Grams</th>
                        <th class="p-3">Proteins</th>
                        <th class="p-3">Carbs</th>
                        <th class="p-3">Fats</th>
                        <th class="p-3">Calories</th>
                        <th class="p-3">Remove</th>

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
                        <td class="p-3"></td>

                    </tr>
                </tfoot>
            </table>
        </div>
    </main>
    @include('partials.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        #food-suggestions {
            max-height: 200px; /* Limit the height of the dropdown */
            overflow-y: auto; /* Add scroll if the suggestions exceed the height */
            background-color: #343a40; /* Match the dark theme */
            color: white; /* Text color */
            border: 1px solid #6c757d; /* Border to separate suggestions */
            border-radius: 0.25rem; /* Rounded corners */
            z-index: 1000; /* Ensure it appears above other elements */
        }

        #food-suggestions .list-group-item {
            cursor: pointer;
        }

        #food-suggestions .list-group-item:hover {
            background-color: #495057; /* Highlight on hover */
        }
    </style>
    <script>
        $(document).ready(function () {
            let foodData = {};

            // Load food data from the database via AJAX
            function loadFoodData(query) {
                return $.ajax({
                    url: '/food-items',
                    method: 'GET',
                    data: { query: query },
                    success: function (response) {
                        foodData = response;
                    },
                    error: function () {
                        displayErrorMessage("Error loading food data. Please try again.");
                    }
                });
            }

            // Display error message
            function displayErrorMessage(message) {
                const errorMessage = $("#error-message");
                errorMessage.text(message).removeClass("d-none");
                setTimeout(() => {
                    errorMessage.addClass("d-none");
                }, 3000);
            }

            // Handle input in the food-name field
            $("#food-name").on("input", function () {
                const query = $(this).val().trim();

                if (query.length > 0) {
                    loadFoodData(query).done(function (response) {
                        const suggestionsList = $("#food-suggestions");
                        suggestionsList.empty();

                        if (response.length > 0) {
                            response.forEach(item => {
                                suggestionsList.append(`
                                    <li class="list-group-item list-group-item-action" 
                                        data-protein="${item.protein}" 
                                        data-carbs="${item.carbs}" 
                                        data-fats="${item.fats}" 
                                        data-calories="${item.calories}">
                                        ${item.name}
                                    </li>
                                `);
                            });
                            suggestionsList.removeClass("d-none");
                        } else {
                            suggestionsList.addClass("d-none");
                        }
                    });
                } else {
                    $("#food-suggestions").addClass("d-none");
                }
            });

            // Handle click on a suggestion
            $(document).on("click", "#food-suggestions li", function () {
                const selectedFood = $(this).text().trim(); // Trim any extra spaces or line breaks
                const protein = $(this).data("protein");
                const carbs = $(this).data("carbs");
                const fats = $(this).data("fats");
                const calories = $(this).data("calories");

                $("#food-name").val(selectedFood); // Set the trimmed text in the input field
                $("#grams").data("protein", protein);
                $("#grams").data("carbs", carbs);
                $("#grams").data("fats", fats);
                $("#grams").data("calories", calories);

                $("#food-suggestions").addClass("d-none"); // Hide the suggestions list
            });

            // Hide suggestions when clicking outside
            $(document).on("click", function (e) {
                if (!$(e.target).closest("#food-name, #food-suggestions").length) {
                    $("#food-suggestions").addClass("d-none");
                }
            });

            // Add food to the table
            $("#add-food").on("click", function () {
                const foodName = $("#food-name").val().trim();
                const grams = parseFloat($("#grams").val());

                if (!foodName || isNaN(grams)) {
                    displayErrorMessage("Please enter a valid food item and grams");
                    return;
                }

                if (grams <= 0) {
                    displayErrorMessage("Please enter valid grams!");
                    return;
                }

                const food = foodData.find(item => item.name === foodName);
                if (food) {
                    const proteins = ((food.protein / 100) * grams).toFixed(2);
                    const carbs = ((food.carbs / 100) * grams).toFixed(2);
                    const fats = ((food.fats / 100) * grams).toFixed(2);
                    const calories = ((food.calories / 100) * grams).toFixed();

                    addFoodToTable(foodName, grams, proteins, carbs, fats, calories);
                    updateTotals(proteins, carbs, fats, calories);

                    $("#food-name").val("");
                    $("#grams").val("");
                } else {
                    displayErrorMessage("Food item not found in the database!");
                }
            });

            // Reset the table
            $("#reset-table").on("click", function () {
                $("#macros-body").empty();
                $("#total-proteins").text("0g");
                $("#total-carbs").text("0g");
                $("#total-fats").text("0g");
                $("#total-calories").text("0");
                $("#food-name").val("");
                $("#grams").val("");
            });

            // Add food to the table
            function addFoodToTable(name, grams, proteins, carbs, fats, calories) {
                const row = $(`
                    <tr>
                        <td>${name}</td>
                        <td>${grams}g</td>
                        <td>${proteins}g</td>
                        <td>${carbs}g</td>
                        <td>${fats}g</td>
                        <td>${calories}</td>
                        <td><button class="remove-row btn btn-danger btn-sm">Remove</button></td>
                    </tr>
                `);

                row.find(".remove-row").on("click", function () {
                    removeFoodFromTable(row, proteins, carbs, fats, calories);
                });

                $("#macros-body").append(row);
            }

            // Remove food from the table
            function removeFoodFromTable(row, proteins, carbs, fats, calories) {
                row.remove();
                updateTotals(-proteins, -carbs, -fats, -calories);
            }

            // Update totals
            function updateTotals(proteins, carbs, fats, calories) {
                const totalProteins = $("#total-proteins");
                const totalCarbs = $("#total-carbs");
                const totalFats = $("#total-fats");
                const totalCalories = $("#total-calories");

                totalProteins.text(`${(parseFloat(totalProteins.text()) + parseFloat(proteins)).toFixed(2)}g`);
                totalCarbs.text(`${(parseFloat(totalCarbs.text()) + parseFloat(carbs)).toFixed(2)}g`);
                totalFats.text(`${(parseFloat(totalFats.text()) + parseFloat(fats)).toFixed(2)}g`);
                totalCalories.text(`${parseFloat(totalCalories.text()) + parseFloat(calories)}`);
            }
        });
    </script>
</body>

@endsection
