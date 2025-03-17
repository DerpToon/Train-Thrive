@extends('layouts.app')
@section('title','Cart')
@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-4xl font-bold text-center text-gray-200 mb-6">Cart</h1>
        <div id="cart" class="flex flex-col items-center">
            <div id="itemParent" class="w-full max-w-3xl space-y-4"></div>
            <div id="total" class="self-end bg-white shadow-md rounded-lg p-6 w-80">
                <div id="subtotal" class="text-lg font-semibold mb-4">Subtotal: <span id="total-text" class="text-green-500">$1002</span></div>
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
                    <button id="pay-button" class="mt-4 w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 rounded-md">Pay Now</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('Scripts/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('Scripts/Cart.js') }}" defer></script>
    <script src="{{ asset('Scripts/Common.js') }}" defer></script>
@endpush
@include('partials.footer')
