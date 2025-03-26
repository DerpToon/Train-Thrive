@extends('layouts.app') 
@section('title', 'Cart')

@section('content')
<script src="{{ asset('js/cart.js') }}" defer></script>

<div class="container mx-auto p-6">
    <h1 class="text-4xl font-bold text-center text-gray-200 mb-6">Cart</h1>

    <div id="cart" class="flex flex-col items-center bg-cover bg-center w-full p-6 rounded-lg shadow-lg"
        style="background-image: url('{{ asset('/imgs/cart.png') }}');">
        
        <div id="itemParent" class="w-full max-w-3xl space-y-4">
            @foreach ($cartItems as $item)
                <div class="cartItem flex items-center justify-between bg-gray-800 p-4 rounded-lg shadow-lg w-full">
                    <img src="{{ asset('storage/'.$item->product->image) }}" class="w-20 h-20 object-cover rounded-md" alt="Product">
                    
                    <section class="text-white text-lg font-semibold">
                        {{ $item->product->name }}
                    </section>

                    <div class="flex items-center space-x-3">
                        <h2 class="text-gray-300">Quantity</h2>
                        <button onclick="updateQuantity({{ $item->id }}, -1)"
                            class="px-3 py-1 bg-gray-600 text-white rounded-md hover:bg-gray-500">-</button>
                        <input type="number" id="quantity-{{ $item->id }}" value="{{ $item->quantity }}" 
                            class="w-12 text-center bg-gray-700 text-white border-none rounded-md" readonly>
                        <button onclick="updateQuantity({{ $item->id }}, 1)"
                            class="px-3 py-1 bg-gray-600 text-white rounded-md hover:bg-gray-500">+</button>
                    </div>

                    <div class="text-gray-300">
                        <h2>Price</h2>
                        <span id="price-{{ $item->id }}" class="font-bold text-green-400">
                            ${{ $item->product->price * $item->quantity }}
                        </span>
                    </div>

                    <button onclick="removeItem({{ $item->id }})" 
                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-md">
                        REMOVE
                    </button>
                </div>
            @endforeach
        </div>

        <div id="total" class="mt-6 bg-white text-black p-6 rounded-lg shadow-md w-80">
            <div id="subtotal" class="text-lg font-semibold mb-4">
                Subtotal: <span id="total-text" class="text-green-500">$1002</span>
            </div>

            <div id="payment-section">
                <h3 class="text-lg font-medium mb-2">Payment Method</h3>
                <label for="card-number" class="block font-semibold">Card Number:</label>
                <input type="text" id="card-number" class="w-full p-2 border rounded-md" placeholder="**** **** **** 1234">

                <label for="card-holder" class="block font-semibold mt-2">Card Holder:</label>
                <input type="text" id="card-holder" class="w-full p-2 border rounded-md" placeholder="John Doe">

                <label for="expiry-date" class="block font-semibold mt-2">Expiry Date:</label>
                <input type="text" id="expiry-date" class="w-full p-2 border rounded-md" placeholder="MM/YY">

                <label for="cvv" class="block font-semibold mt-2">CVV:</label>
                <input type="password" id="cvv" class="w-full p-2 border rounded-md" placeholder="***">

                <p id="paymentText" class="hidden text-red-500 mt-2">Error</p>
                <button id="pay-button" class="mt-4 w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 rounded-md">
                    Pay Now
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
