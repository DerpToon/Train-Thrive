
@extends('layouts.app')

@section('title', 'Shop')

@section('content')
<p id="login-alert" class="text-red-500 text-lg font-bold opacity-0 transition-opacity">You need to login!</p>

<div class="flex justify-center items-center h-full text-center">
    <p class="text-4xl text-black font-bold">
        "<span class="text-green-500">FUEL</span> Your Fitness: <br> Premier Protein <br> Supplements Await."
    </p>
</div>

<main class="bg-green-500 py-10 text-center">
    <div id="links"></div>
    <div class="search-container">
        <input type="text" id="search-bar" class="w-1/2 p-3 text-xl border-2 border-green-500 rounded-full focus:ring focus:ring-green-300" placeholder="Find the perfect workout gear">
    </div>

    <div class="products-container mt-10">
        @foreach ($categories as $category)
            <h2 class="text-2xl font-bold text-black">{{ $category->name }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
                @foreach ($category->products as $product)
                    <div class="product-card border p-4 rounded-lg shadow-lg">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-md">
                        <h3 class="product-name text-xl font-semibold mt-2">{{ $product->name }}</h3>
                        <p class="text-green-500 font-bold">${{ $product->price }}</p>
                        @if (in_array($product->id, $cartItems))
                            <a href="{{ route('cart.index') }}" class="btn btn-primary mt-2">Go To Cart</a>
                        @else
                            <button class="add-to-cart btn btn-success mt-2" data-id="{{ $product->id }}">Add To Cart</button>
                        @endif
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</main>

<script>
    $(document).ready(function() {
        // Add to cart functionality
        $('.add-to-cart').click(function() {
            const productId = $(this).data('id');
            $.ajax({
                method: 'POST',
                url: '{{ url("/cart/add") }}',
                data: {
                    product_id: productId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    location.reload(); // Reload the page or update the cart dynamically
                }
            });
        });

        // Search functionality
        $('#search-bar').on('input', function() {
            const term = $(this).val().toLowerCase();
            $('.product-name').each(function() {
                $(this).closest('.product-card').toggle(
                    $(this).text().toLowerCase().includes(term)
                );
            });
        });
    });
</script>
@endsection