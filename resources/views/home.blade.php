<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="Scripts/Home.js" defer></script>
    <script src="Scripts/Common.js" defer></script>
    <style>
        :root {
            --primary-color: #00ff00;
            --background-color: #000000;
            --text-color: #ffffff;
            --button-hover: #1e1e1e;
            --gradient-bg: linear-gradient(135deg, #1e1e1e, #000000);
            --box-shadow-hover: 0 10px 20px rgba(0, 255, 0, 0.6);
        }
    </style>
</head>
<body class="bg-black text-white">
    <header class="p-4 bg-gradient-to-r from-gray-900 to-black">
        <nav class="flex justify-between items-center">
            <img src="Images/Workouts/Logo.jpg" alt="Logo" class="h-12" />
            <ul class="flex gap-6">
                <li><a href="index.html" class="text-green-400 hover:underline">Home</a></li>
                <li><a href="Workouts.html" class="text-green-400 hover:underline">Workouts</a></li>
                <li><a href="Calculator.html" class="text-green-400 hover:underline">Macros Calculator</a></li>
                <li><a href="Products.html" class="text-green-400 hover:underline">Shop</a></li>
                <li><a href="About-Us.html" class="text-green-400 hover:underline">About Us</a></li>
            </ul>
            <a href="login.html" class="bg-green-500 px-4 py-2 rounded-lg hover:bg-green-600">Login</a>
        </nav>
    </header>
    
    <section class="text-center py-20">
        <h1 class="text-4xl font-bold">TO GIVE IT ALL</h1>
        <h3 class="text-xl text-green-400 mt-2">ALWAYS LIVE ACTIVE</h3>
    </section>

    <section class="text-center py-10">
        <h2 class="text-3xl font-bold mb-4">CATEGORIES</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div><img src="Images/Home page/powder.png" alt="powder" class="mx-auto"><button class="bg-green-500 px-4 py-2 mt-2 block mx-auto">POWDERS</button></div>
            <div><img src="Images/Home page/mass-gainer.png" alt="mass gainer" class="mx-auto"><button class="bg-green-500 px-4 py-2 mt-2 block mx-auto">MASS GAINERS</button></div>
            <div><img src="./Images/Products/Product Images/21.png" alt="energy flavors" class="mx-auto"><button class="bg-green-500 px-4 py-2 mt-2 block mx-auto">ENERGY FLAVORS</button></div>
            <div><img src="Images/Home page/flakes.png" alt="flakes" class="mx-auto"><button class="bg-green-500 px-4 py-2 mt-2 block mx-auto">FLAKES</button></div>
        </div>
    </section>

    <section class="p-6 bg-gray-900 rounded-lg w-4/5 mx-auto my-10">
        <h2 class="text-3xl font-bold text-center mb-4">Calorie Calculator</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input type="text" placeholder="Age in Years" class="p-2 rounded bg-gray-800">
            <select class="p-2 rounded bg-gray-800">
                <option>Select your gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <input type="text" placeholder="Height in Cms" class="p-2 rounded bg-gray-800">
            <input type="text" placeholder="Weight in Kgs" class="p-2 rounded bg-gray-800">
            <select class="p-2 rounded bg-gray-800">
                <option>Select activity level</option>
                <option value="sedentary">Sedentary</option>
                <option value="light">Lightly active</option>
                <option value="moderate">Moderately active</option>
                <option value="active">Very active</option>
                <option value="very active">Super active</option>
            </select>
        </div>
        <button class="bg-green-500 px-6 py-2 mt-4 rounded-lg hover:bg-green-600 w-full">Calculate</button>
    </section>

    <section class="text-center py-10">
        <h2 class="text-3xl font-bold">EXCLUSIVE SERVICES</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            <div class="p-4 bg-gray-900 rounded-lg"><h3>Loyalty Program</h3></div>
            <div class="p-4 bg-gray-900 rounded-lg"><h3>Workouts Plans</h3></div>
            <div class="p-4 bg-gray-900 rounded-lg"><h3>Nutrition Advice</h3></div>
        </div>
    </section>
    
    <section class="text-center py-10">
        <h2 class="text-3xl font-bold">Customer Reviews</h2>
        <button class="bg-green-500 px-6 py-2 mt-4 rounded-lg hover:bg-green-600">Add Review</button>
    </section>
    
    <footer class="bg-gray-900 text-white py-6 mt-10">
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-6">
            <div>
                <h4 class="font-bold">Support</h4>
                <ul>
                    <li><a href="mailto:support@trainandthrive.com" class="hover:underline">Help Center</a></li>
                    <li><a href="About-Us.html" class="hover:underline">About Us</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold">Customer Service</h4>
                <ul>
                    <li><a href="Cart.html" class="hover:underline">Track Your Order</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold">Online Shop</h4>
                <ul>
                    <li><a href="Products.html#category0" class="hover:underline">Protein Powders</a></li>
                    <li><a href="Products.html#category1" class="hover:underline">Flakes</a></li>
                    <li><a href="Products.html#category2" class="hover:underline">Mass Gainers</a></li>
                    <li><a href="Products.html#category3" class="hover:underline">Energy Flavors</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold">Follow Us</h4>
                <div class="flex space-x-4">
                    <a href="#" class="text-xl hover:text-green-500"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-xl hover:text-green-500"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-xl hover:text-green-500"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
        </div>
        <p class="text-center mt-4">&copy; 2024 Train & Thrive. All Rights Reserved.</p>
    </footer>
</body>
</html>
</body>
</html>
