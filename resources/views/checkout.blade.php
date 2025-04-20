{{-- filepath: c:\xampp\htdocs\Train-Thrive\resources\views\checkout.blade.php --}}
@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="container-fluid py-5 bg-dark text-white min-vh-100">
    <h1 class="mb-4 text-success fw-bold text-center">Checkout</h1>

    <div class="mb-4">
        <h4 class="text-center text-white">Your Cart</h4>
        <table class="table table-dark table-bordered table-hover align-middle text-center">
            <thead class="table-success text-dark">
                <tr>
                    <th>Product</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>
                        <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" class="img-fluid rounded" style="width: 80px; height: 80px;">
                    </td>
                    <td>${{ $item->product->price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                </tr>
                @endforeach
                <tr class="table-success text-dark fw-bold">
                    <td colspan="4" class="text-end">Total:</td>
                    <td>${{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity), 2) }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <form action="{{ route('checkout.submit') }}" method="POST" class="mx-auto col-md-6 bg-dark p-4 rounded shadow-lg">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label fw-semibold">Full Name</label>
            <input type="text" id="name" name="name" class="form-control bg-secondary text-white border-0" placeholder="Enter your full name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email Address</label>
            <input type="email" id="email" name="email" class="form-control bg-secondary text-white border-0" placeholder="Enter your email" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label fw-semibold">Phone Number</label>
            <input type="text" id="phone" name="phone" class="form-control bg-secondary text-white border-0" placeholder="Enter your phone number" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label fw-semibold">Delivery Address</label>
            <textarea id="address" name="address" class="form-control bg-secondary text-white border-0" rows="3" placeholder="Enter your delivery address" required></textarea>
        </div>
        <div class="mb-3">
            <label for="notes" class="form-label fw-semibold">Additional Notes (Optional)</label>
            <textarea id="notes" name="notes" class="form-control bg-secondary text-white border-0" rows="3" placeholder="Any special instructions?"></textarea>
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ url('/cart') }}" class="btn btn-outline-warning">Back to Cart</a>
            <button type="submit" class="btn btn-success">Submit Order</button>
        </div>
    </form>
</div>

<style>
    body {
        background: #000 !important; /* Ensures the entire page background is black */
    }

    .container-fluid {
        background: #000; /* Matches the background color of the body */
    }

    form {
        background: #1c1c1c; /* Darkens the form background slightly for contrast */
    }
</style>
@endsection