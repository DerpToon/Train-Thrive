@extends('layouts.app')

@section('title', 'Your Cart')

@section('content')
<div class="p-10">
    <h1 class="text-3xl font-bold mb-6 text-green-700">Your Cart</h1>
    
    @if($cartItems->isEmpty())
        <p class="text-gray-500">Your cart is empty.</p>
    @else
        <table class="w-full text-left bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-green-500 text-white">
                <tr>
                    <th class="p-4">Product</th>
                    <th class="p-4">Price</th>
                    <th class="p-4">Quantity</th>
                    <th class="p-4">Total</th>
                    <th class="p-4">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $item)
                    <tr class="border-t">
                        <td class="p-4">{{ $item->product->name }}</td>
                        <td class="p-4">${{ $item->product->price }}</td>
                        <td class="p-4">
                            <input type="number" min="1" class="quantity-input w-16 p-1 border" data-id="{{ $item->product_id }}" value="{{ $item->quantity }}">
                        </td>
                        <td class="p-4">${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                        <td class="p-4">
                            <button class="remove-btn bg-red-500 text-white px-3 py-1 rounded" data-id="{{ $item->product_id }}">Remove</button>
                        </td>
                    </tr>
                @endforeach
                <tr class="font-bold bg-green-100">
                    <td colspan="3" class="p-4 text-right">Total:</td>
                    <td class="p-4">${{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity), 2) }}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <div class="text-right mt-6">
            <a href="{{ route('checkout.index') }}" class="bg-green-600 text-white px-5 py-2 rounded hover:bg-green-700">Proceed to Checkout</a>
        </div>
    @endif
</div>

<script>
    $(document).ready(function() {
        // Update cart quantity
        $('.quantity-input').change(function() {
            const productId = $(this).data('id');
            const quantity = $(this).val();

            $.ajax({
                method: 'POST',
                url: '{{ url("/cart/update") }}',
                data: {
                    product_id: productId,
                    quantity: quantity,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert(response.message);
                    location.reload(); // Refresh totals
                },
                error: function(xhr) {
                    alert('Failed to update the cart.');
                }
            });
        });

        // Remove item from cart
        $('.remove-btn').click(function() {
            if (!confirm('Are you sure you want to remove this item?')) {
                return;
            }

            const productId = $(this).data('id');

            $.ajax({
                method: 'POST',
                url: '{{ url("/cart/remove") }}',
                data: {
                    product_id: productId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert(response.message);
                    location.reload(); // Refresh the cart
                },
                error: function(xhr) {
                    alert('Failed to remove the product from the cart.');
                }
            });
        });
    });
</script>
@endsection
