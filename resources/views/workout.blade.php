<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="Scripts/Workouts.js" defer></script>
        <script src="Scripts/Common.js" defer></script>
        <title>Workouts</title>
    </head>
    <body class="bg-black text-white font-sans overflow-x-hidden">
        <header class="h-[300px] bg-gray-900 flex justify-center items-center">
            <nav class="flex items-center justify-between w-full max-w-6xl px-6">
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
        <main class="p-10 text-center">
            <h1 class="text-4xl font-bold text-green-400 mb-6 uppercase">Select Your Workout</h1>
            <div class="flex flex-wrap justify-center gap-6">
                <div class="border-2 border-green-400 rounded-lg p-6 max-w-lg shadow-lg transition-transform transform hover:scale-105">
                    <h2 class="text-xl font-semibold mb-4">Choose Your Level</h2>
                    <button class="bg-green-500 text-black px-6 py-2 rounded-full m-2 hover:bg-orange-500">Beginner</button>
                    <button class="bg-green-500 text-black px-6 py-2 rounded-full m-2 hover:bg-orange-500">Intermediate</button>
                    <button class="bg-green-500 text-black px-6 py-2 rounded-full m-2 hover:bg-orange-500">Advanced</button>
                    <button class="bg-white text-green-700 px-6 py-2 rounded-full m-2 border hover:bg-green-500 hover:text-white">Reset Level</button>
                </div>
                <div class="border-2 border-green-400 rounded-lg p-6 max-w-lg shadow-lg transition-transform transform hover:scale-105">
                    <h2 class="text-xl font-semibold mb-4">Select Muscle Group</h2>
                    <button class="bg-green-500 text-black px-6 py-2 rounded-full m-2 hover:bg-orange-500">Chest</button>
                    <button class="bg-green-500 text-black px-6 py-2 rounded-full m-2 hover:bg-orange-500">Back</button>
                    <button class="bg-green-500 text-black px-6 py-2 rounded-full m-2 hover:bg-orange-500">Legs</button>
                    <button class="bg-green-500 text-black px-6 py-2 rounded-full m-2 hover:bg-orange-500">Arms</button>
                    <button class="bg-green-500 text-black px-6 py-2 rounded-full m-2 hover:bg-orange-500">Shoulders</button>
                    <button class="bg-green-500 text-black px-6 py-2 rounded-full m-2 hover:bg-orange-500">Core</button>
                    <button class="bg-white text-green-700 px-6 py-2 rounded-full m-2 border hover:bg-green-500 hover:text-white">Reset Muscle</button>
                </div>
            </div>
            <div id="workout-results" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-10 p-4"></div>
        </main>
    </body>
</html>