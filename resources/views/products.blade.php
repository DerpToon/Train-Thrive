@extends('layouts.app')

@section('title', 'Shop')

@section('content')
<head>
<style>
    #search-bar::placeholder {
        color: #adb5bd;
        opacity: 1;
    }
</style>

</head>
<div class="position-relative" style="background-image: url('{{ asset('imgs/Products/background1.jpg') }}'); background-size: cover; height: 60vh;">
    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background-color: rgba(0,0,0,0.5);">
        <h1 class="text-white text-center fw-bold display-4">
            <span class="text-success">FUEL</span> Your Fitness<br>Premier Protein Supplements Await
        </h1>
    </div>
</div>

<div class="bg-dark text-white py-5">
    <div class="container">
        <!-- Search Bar -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-8">
                <input type="text" id="search-bar" class="form-control form-control-lg bg-black text-white border-success" placeholder="Search for products...">
            </div>
        </div>

        <div class="d-flex justify-content-end align-items-center mb-4">
    <a href="{{ url('/cart') }}" class="btn btn-outline-success position-relative">
        <i class="fas fa-shopping-cart me-2"></i> View Cart
          <span id="cart-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
             {{ session('cart_count', 0) }}
          </span>
    </a>
</div>

        <!-- Categories and Products -->
        @foreach ($categories as $category)
            <div class="mb-5">
                <h2 id="{{ strtolower(str_replace(' ', '-', $category->name)) }}" class="text-success fw-bold mb-4">{{ $category->name }}</h2>
                <div class="row g-4">
                    @foreach ($category->products as $product)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="card h-100 bg-black text-white border-success shadow product-card">
                                <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: contain;">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text text-success fw-bold">${{ $product->price }}</p>
                                    <div class="mt-auto">
                                        @if (in_array($product->id, $cartItems))
                                            <a href="{{ route('cart') }}" class="btn btn-success w-100">Go To Cart</a>
                                        @else
                                            <button class="btn btn-success w-100 add-to-cart" data-id="{{ $product->id }}"><i class="fas fa-cart-plus"></i>Add To Cart</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Optional Alert Message -->
<div class="container">
    <div id="login-alert" class="alert alert-danger d-none mt-3">You need to login!</div>
</div>
<div id="customMessage"
     class="position-fixed bottom-0 end-0 m-4 bg-dark text-success border border-success rounded px-4 py-3 shadow"
     style="display: none; z-index: 1051;">
</div>

@endsection
@push('scripts')
<script>
    function showCustomMessage(message, isError = false) {
    const msgBox = $('#customMessage');
    msgBox.text(message);
    msgBox
        .removeClass('text-success border-success text-danger border-danger')
        .addClass(isError ? 'text-danger border-danger' : 'text-success border-success');

    msgBox.fadeIn();
    setTimeout(() => msgBox.fadeOut(), 2000);
}

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
                    $('#cart-count').text(response.cart_count);
                    showCustomMessage(response.message);
                    
                },
                error: function(xhr) {
                    $('#login-alert').removeClass('d-none').addClass('opacity-100');
                }
            });
        });

        $('.add-to-cart').prop('disabled', true);
        setTimeout(() => $('.add-to-cart').prop('disabled', false), 1000);


        // Search functionality 
        $('#search-bar').on('input', function() {
            const term = $(this).val().toLowerCase();
            $('.card-title').each(function() {
                $(this).closest('.product-card').toggle(
                    $(this).text().toLowerCase().includes(term)
                );
            });
        });
    });
</script>
@endpush
