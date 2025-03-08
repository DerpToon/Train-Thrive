<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="Scripts/Calculator.js" defer></script>
        <script src="Scripts/Common.js" defer></script>
        <title>Macros Calculator</title>
    </head>
    <body class="bg-black text-white ">
        <div>
            <header class="bg-gray-900 shadow-md p-4">
                <nav class="flex items-center justify-between">
                    <img src="./imgs/Workouts/Logo.jpg" alt="Logo" class="w-16 h-16 rounded-full" />
                    <ul class="flex space-x-6">
                        <li><a href="index.html" class="text-green-400 hover:text-green-600">Home</a></li>
                        <li><a href="Workouts.html" class="text-green-400 hover:text-green-600">Workouts</a></li>
                        <li><a href="Calculator.html" class="text-green-400 hover:text-green-600">Macros Calculator</a></li>
                        <li><a href="Products.html" class="text-green-400 hover:text-green-600">Shop</a></li>
                        <li><a href="About-Us.html" class="text-green-400 hover:text-green-600">About Us</a></li>
                    </ul>
                    <a href="login.html" class="bg-green-500 text-black px-4 py-2 rounded hover:bg-orange-500">Login</a>
                </nav>
            </header>
            <main class="flex justify-center mt-10">
                <section class="w-3/4 p-6 bg-gray-800 rounded-lg shadow-lg text-center">
                    <h1 class="text-4xl font-bold text-green-400 mb-6">Macros Calculator</h1>
                    <form id="macros-form" class="space-y-4">
                        <div>
                            <label for="food-name" class="block text-lg">Food Item</label>
                            <input type="text" id="food-name" placeholder="Search for food..." class="w-full p-2 rounded bg-gray-700 text-white" autocomplete="off" />
                        </div>
                        <div>
                            <label for="grams" class="block text-lg">Grams Consumed</label>
                            <input type="number" id="grams" placeholder="e.g., 100" required class="w-full p-2 rounded bg-gray-700 text-white" />
                        </div>
                        <div id="error-message" class="text-red-500 hidden"></div>
                        <div class="flex justify-center space-x-4">
                            <button type="button" id="add-food" class="bg-green-500 text-black px-6 py-2 rounded hover:bg-orange-500">Add Food</button>
                            <button type="button" id="reset-table" class="bg-green-500 text-black px-6 py-2 rounded hover:bg-orange-500">Reset Table</button>
                        </div>
                    </form>
                    <div class="overflow-x-auto mt-6">
                        <table class="w-full border border-green-400 text-white">
                            <thead>
                                <tr class="bg-green-500 text-black">
                                    <th class="p-2">Food</th>
                                    <th class="p-2">Grams</th>
                                    <th class="p-2">Proteins</th>
                                    <th class="p-2">Carbs</th>
                                    <th class="p-2">Fats</th>
                                    <th class="p-2">Calories</th>
                                </tr>
                            </thead>
                            <tbody id="macros-body"></tbody>
                            <tfoot>
                                <tr class="bg-gray-900">
                                    <td colspan="2" class="p-2 font-bold">Total</td>
                                    <td id="total-proteins" class="p-2">0g</td>
                                    <td id="total-carbs" class="p-2">0g</td>
                                    <td id="total-fats" class="p-2">0g</td>
                                    <td id="total-calories" class="p-2">0</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </section>
            </main>
        </div>
    </body>
</html>