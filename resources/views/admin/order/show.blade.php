{{-- filepath: c:\xampp\htdocs\Train-Thrive\resources\views\admin\order\show.blade.php --}}
@extends('layouts.admin-layout')

@section('title', 'Order Details')

@section('header', 'Order Details')

@section('content')
<div class="card bg-dark text-white mb-4">
    <div class="card-body">
        <h5 class="card-title">Order #{{ $order->id }}</h5>
        <p><strong>Customer Name:</strong> {{ $order->name }}</p>
        <p><strong>Email:</strong> {{ $order->email }}</p>
        <p><strong>Phone:</strong> {{ $order->phone }}</p>
        <p><strong>Address:</strong> {{ $order->address }}</p>
        <p><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>
        <p><strong>Notes:</strong> {{ $order->notes ?? 'N/A' }}</p>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-dark table-bordered table-hover align-middle text-center">
        <thead class="table-success text-dark">
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>${{ number_format($item->price, 2) }}</td>
                <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection