@extends('layouts.app')

@section('title', 'Your Cart')

@section('content')
<div class="container-fluid py-5 bg-dark text-white min-vh-100">
    <h1 class="mb-4 text-success fw-bold text-center">🛒 Your Cart</h1>

    @if($cartItems->isEmpty())
    <p class="text-muted text-center">Your cart is empty. <a href="{{ url('/products') }}" class="text-success">Start shopping</a>!</p>
    @else
        <div class="table-responsive">
            <table class="table table-dark table-bordered table-hover align-middle text-center">
                <thead class="table-success text-dark">
                    <tr>
                        <th>Product</th>
                        <th>Image</th>
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
                            <td>
                                <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" class="img-fluid rounded" style="width: 80px; height: 80px;">
                            </td>
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
                        <td colspan="4" class="text-end">Total:</td>
                        <td>${{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity), 2) }}</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endif
</div>

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
    <div id="cart-toast" class="toast align-items-center text-bg-success border-0" role="alert">
        <div class="d-flex">
            <div class="toast-body"></div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
        </div>
    </div>
</div>

@if(!$cartItems->isEmpty())
    <div class="position-fixed bottom-0 start-0 end-0 bg-success text-white d-flex justify-content-between align-items-center p-3 shadow">
        <span class="fw-bold">Total: ${{ number_format($cartItems->sum(fn($item) => $item->product->price * $item->quantity), 2) }}</span>
        <a href="{{ url('/checkout') }}" class="btn btn-dark">Proceed to Checkout</a>
    </div>
@endif
@include('partials.footer')
<script>
    function showToast(message) {
        $('#cart-toast .toast-body').text(message);
        const toast = new bootstrap.Toast(document.getElementById('cart-toast'));
        toast.show();
    }

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
                    showToast(response.message);
                    location.reload();
                },
                error: function() {
                    showToast("Something went wrong. Please try again.");
                },
            });
        });

        // Remove item
        let productIdToRemove = null;

        $('.remove-btn').click(function() {
            productIdToRemove = $(this).data('id');
            const productId = $(this).data('id');

            $.ajax({
                method: 'POST',
                url: '{{ url("/cart/remove") }}',
                data: {
                    product_id: productId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    showToast(response.message);
                    $(`button[data-id="${productIdToRemove}"]`).closest('tr').remove();
                    productIdToRemove = null;
                    if ($('tbody tr:has(button.remove-btn)').length === 0) {
                        window.location.reload();
                    }
                },
                error: function() {
                    showToast("Something went wrong. Please try again.");
                }
            });
        });
    });
</script>
@endsection