@extends('layouts.app')

@section('title','workouts')

@section('content')
@include('partials','navbar')
<p id="login-alert" class="text-red-500 text-lg font-bold opacity-0 transition-opacity">You need to login!</p>
    <div class="flex justify-center items-center h-full text-center">
        <p class="text-4xl text-black font-bold">"<span class="text-green-500">FUEL</span> Your Fitness: <br> Premier Protein <br> Supplements Await."</p>
    </div>
    <main class="bg-green-500 py-10 text-center">
    <div id="links"></div>
    <div class="search-container">
        <input type="text" id="search-bar" class="w-1/2 p-3 text-xl border-2 border-green-500 rounded-full focus:ring focus:ring-green-300" placeholder="Find the perfect workout gear">
    </div>
</main>    
<footer class="bg-black text-white py-10">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 gap-8 text-center md:text-left">
        <div>
            <h4 class="text-lg font-semibold">Support</h4>
            <ul>
                <li><a href="mailto:support@trainandthrive.com">Help Center</a></li>
                <li><a href="{{ url('/about-us') }}">About Us</a></li>
            </ul>
        </div>
        <div>
            <h4 class="text-lg font-semibold">Customer Service</h4>
            <ul>
                <li><a href="{{ url('/cart') }}">Track Your Order</a></li>
            </ul>
        </div>
        <div>
            <h4 class="text-lg font-semibold">Online Shop</h4>
            <ul>
                <li><a href="{{ url('/products#category0') }}">Protein Powders</a></li>
                <li><a href="{{ url('/products#category1') }}">Flakes</a></li>
                <li><a href="{{ url('/products#category2') }}">Mass Gainers</a></li>
                <li><a href="{{ url('/products#category3') }}">Energy Flavors</a></li>
            </ul>
        </div>
        <div>
            <h4 class="text-lg font-semibold">Follow Us</h4>
            <div class="flex justify-center space-x-4">
                <a href="https://www.facebook.com/trainandthrive" target="_blank" class="text-blue-500 text-xl"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.instagram.com/trainandthrive" target="_blank" class="text-pink-500 text-xl"><i class="fab fa-instagram"></i></a>
                <a href="https://wa.me/81932062" target="_blank" class="text-green-500 text-xl"><i class="fab fa-whatsapp"></i></a>
            </div>
        </div>
    </div>
    <p class="text-center mt-5">&copy; 2024 Train & Thrive. All Rights Reserved.</p>
</footer>
<script src="{{ asset('Scripts/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('Scripts/Products.js') }}" defer></script>
<script src="{{ asset('Scripts/Common.js') }}" defer></script>
@endsection