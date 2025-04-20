{{-- filepath: c:\xampp\htdocs\Train-Thrive\resources\views\thank-you.blade.php --}}
@extends('layouts.app')

@section('title', 'Thank You')

@section('content')
<div class="container-fluid text-center text-white min-vh-100 d-flex flex-column justify-content-center align-items-center position-relative">
    <div class="thank-you-content animate__animated animate__fadeInUp" style="z-index: 2;">
        <h1 class="text-gradient fw-bold display-3 mb-4">Thank You! 🎉</h1>
        <p class="fs-4 mb-4">Your order has been placed successfully. We’ll contact you shortly!</p>
        <a href="{{ url('/') }}" class="btn btn-gradient btn-lg px-5 py-3 shadow-lg">Back to Home</a>
    </div>
    <div class="floating-icons position-absolute w-100 h-100 overflow-hidden" style="z-index: 1;">
        <div class="icon icon-1"></div>
        <div class="icon icon-2"></div>
        <div class="icon icon-3"></div>
    </div>
</div>

<style>
    body {
        background: linear-gradient(135deg, #0f0f0f, #1c1c1c) !important;
        overflow: hidden;
    }

    .text-gradient {
        background: linear-gradient(90deg, #28a745, #20c997, #17a2b8);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .btn-gradient {
        background: linear-gradient(90deg, #28a745, #20c997, #17a2b8);
        color: #fff;
        border: none;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .btn-gradient:hover {
        transform: scale(1.1);
        box-shadow: 0 0 20px rgba(23, 162, 184, 0.8);
    }

    .floating-icons .icon {
        position: absolute;
        width: 100px;
        height: 100px;
        background: radial-gradient(circle, rgba(40, 167, 69, 0.5), transparent 70%);
        border-radius: 50%;
        animation: float 6s infinite ease-in-out;
        filter: blur(30px);
    }

    .floating-icons .icon-1 {
        top: 10%;
        left: 20%;
        animation-delay: 0s;
    }

    .floating-icons .icon-2 {
        top: 50%;
        left: 70%;
        animation-delay: 2s;
    }

    .floating-icons .icon-3 {
        top: 80%;
        left: 30%;
        animation-delay: 4s;
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0) translateX(0);
        }
        50% {
            transform: translateY(-20px) translateX(10px);
        }
    }
</style>
@endsection