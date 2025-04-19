@extends('layouts.app')

@section('title', 'Shop')

@section('content')
<body class="bg-dark text-black">
<div style="background-image: url({{ asset("imgs/Products/background1.jpg") }}); background-size: cover; transition: background-size 0.3s ease-in-out; padding: 20px;">
<p id="login-alert" class="text-red-500 text-lg font-bold opacity-0 transition-opacity">You need to login!</p>
 <div class="flex justify-center items-center h-full text-center bg-cover bg-center py-10" >
    <p class="text-4xl text-white font-bold">
        "<span class="text-black font-bold">FUEL</span> Your Fitness: <br> Premier Protein <br> Supplements Await."
    </p>
 </div>

 <div class="bg-green-100 py-10"> 
    <div class="search-container text-center bg-green-100 py-10">
        <input type="text" id="search-bar"  class="w-3/4 md:w-1/2 p-3 text-xl text-dark-green bg-green-500 border-2 border-green-500 rounded-full placeholder-green focus:ring focus:ring-green-300 hover:bg-green-600 transition-colors" 
        placeholder="Find the perfect workout gear">
    </div>
  </div>
  </div>

  <div class="products-container mt-10 px-4 md:px-20">
            @foreach ($categories as $category)
            <h2 id="{{ strtolower(str_replace(' ', '-', $category->name)) }}" class="text-3xl font-bold text-green-700 mt-10">{{ $category->name }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                @foreach ($category->products as $product)
                    <div class="product-card border border-green-500 p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow bg-white">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover rounded-md">
                        <h3 class="product-name text-xl font-semibold mt-4 text-green-700">{{ $product->name }}</h3>
                        <p class="text-green-500 font-bold text-lg mt-2">${{ $product->price }}</p>
                        @if (in_array($product->id, $cartItems))
                            <a href="{{ route('cart.index') }}" class="btn bg-green-500 text-white font-bold py-2 px-4 rounded-full mt-4 hover:bg-green-600">Go To Cart</a>
                        @else
                        <button class="add-to-cart btn bg-green-500 text-white font-bold py-3 px-6 rounded-full mt-4 hover:bg-green-600 shadow-lg hover:shadow-xl transition-all transform hover:scale-105" data-id="{{ $product->id }}">
                            Add To Cart
                        </button>
                        @endif
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</body>

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
                    // Show a success message
                    alert(response.message);

                    // Update the cart count dynamically
                    let cartCount = $('#cart-count').text();
                    $('#cart-count').text(parseInt(cartCount) + 1);

                    // Replace the button with "Go To Cart"
                    const button = $(`button[data-id="${productId}"]`);
                    button.replaceWith('<a href="{{ route('cart.index') }}" class="btn bg-green-500 text-white font-bold py-2 px-4 rounded-full mt-4 hover:bg-green-600">Go To Cart</a>');
                },
                error: function(xhr) {
                    alert('Failed to add the product to the cart.');
                }
            });
        });

        // Search functionality
        $('#search-bar').on('input', function() {
            const term = $(this).val().toLowerCase();
            let visibleCount = 0;

            $('.product-name').each(function() {
                const isVisible = $(this).text().toLowerCase().includes(term);
                $(this).closest('.product-card').toggle(isVisible);
                if (isVisible) visibleCount++;
            });

            // Show "No products found" message if no products match
            if (visibleCount === 0) {
                if (!$('.no-results').length) {
                    $('.products-container').append('<p class="no-results text-center text-red-500 mt-4">No products found</p>');
                }
            } else {
                $('.no-results').remove();
            }
        });
    });
</script>
@endsection