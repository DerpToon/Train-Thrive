@extends('layouts.app')

@section('title', 'Your Cart')

@section('content')
<div class="container py-5 bg-dark text-white min-vh-100">
    <h1 class="mb-4 text-success fw-bold">🛒 Your Cart</h1>

    @if($cartItems->isEmpty())
        <p class="text-muted">Your cart is empty.</p>
    @else
        <div class="table-responsive">
            <table class="table table-dark table-bordered table-hover align-middle text-center">
                <thead class="table-success text-dark">
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>${{ $item->product->price }}</td>
                            <td>
                                <input type="number" min="1" class="form-control w-auto mx-auto quantity-input bg-dark text-white border-success" data-id="{{ $item->product_id }}" value="{{ $item->quantity }}">
                            </td>
                            <td>${{ number_format($item->product->price * $item->quantity, 2) }}</td>
                            <td>
                                <button class="btn btn-sm btn-danger remove-btn" data-id="{{ $item->product_id }}">Remove</button>
                            </td>
                        </tr>
                    @endforeach
                    <tr class="table-success text-dark fw-bold">
                        <td colspan="3" class="text-end">Total:</td>
                        <td>${{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity), 2) }}</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endif
</div>

<script>
    $(document).ready(function() {
        // Update quantity
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
                    location.reload();
                },
                error: function() {
                    alert('Failed to update the cart.');
                }
            });
        });

        // Remove item
        $('.remove-btn').click(function() {
            if (!confirm('Are you sure you want to remove this item?')) return;

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
                    location.reload();
                },
                error: function() {
                    alert('Failed to remove the product from the cart.');
                }
            });
        });
    });
</script>
@endsection
