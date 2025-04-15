@extends('layouts.app')

@section('title', 'Admin Panel')

@section('content')
<div class="container-fluid">
    <div class="row">
        {{-- Sidebar --}}
        <nav class="col-md-3 col-lg-2 d-md-block bg-dark sidebar text-white">
            <div class="position-sticky pt-3">
                <h4 class="text-center py-3">Admin Panel</h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#add-product">
                            <i class="bi bi-box"></i> Add Product
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#add-user">
                            <i class="bi bi-person-plus"></i> Add User
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#add-category">
                            <i class="bi bi-tags"></i> Add Category
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        {{-- Main Content --}}
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Admin Dashboard</h1>
            </div>

            {{-- Add Product Form --}}
            <section id="add-product" class="mb-5">
                <h3>Add Product</h3>
                <div class="card">
                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="product-name" class="form-label">Product Name</label>
                                <input type="text" name="name" id="product-name" class="form-control" placeholder="Enter product name" required>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </main>
    </div>
</div>
@endsection