@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<body class="bg-dark text-white">
    <main class="container text-center py-5">
        <h1 class="fw-bold text-success">About Us</h1>
    </main>

    <section class="container bg-dark text-white rounded p-4 my-5">
        <div class="row align-items-center mb-5">
            <div class="col-md-6">
                <h2 class="text-success">Our Mission</h2>
                <p>At <strong>Train & Thrive</strong>, our mission is to provide innovative solutions that transform lives and drive sustainable growth. We are dedicated to delivering excellence and making a positive impact through integrity, innovation, and collaboration.</p>
            </div>
            <div class="col-md-6">
                <img src="images/About us/mission.jpg" class="img-fluid rounded shadow" alt="Our Mission">
            </div>
        </div>

        <div class="row align-items-center mb-5 flex-md-row-reverse">
            <div class="col-md-6">
                <h2 class="text-success">Our Story</h2>
                <p>Founded in 2024, <strong>Train & Thrive</strong> Gym began with a simple vision: to create a welcoming space where fitness meets fun. With a focus on community and personalized training, we’ve quickly grown into a fitness hub that empowers individuals to reach their fullest potential, one workout at a time.</p>
            </div>
            <div class="col-md-6">
                <img src="images/About us/story.jpg" class="img-fluid rounded shadow" alt="Our Story">
            </div>
        </div>

        <div class="row align-items-center text-center">
            <div class="col-md-6">
                <h2 class="text-success">Discover More About Us</h2>
                <p>The founder talking about our journey:</p>
            </div>
            <div class="col-md-6">
                <iframe src="https://drive.google.com/file/d/195sCXnZ3ltwtMAap-iqI8GgCUp9sMvZ1/preview" allowfullscreen class="w-100 rounded shadow" height="400"></iframe>
            </div>
        </div>
    </section>

    <section class="container text-center py-4">
        <h2 class="fw-bold text-success">Follow Us</h2>
        <div class="d-flex justify-content-center gap-3">
            <a href="https://www.facebook.com/trainandthrive" target="_blank" class="btn btn-outline-light"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/trainandthrive" target="_blank" class="btn btn-outline-light"><i class="fab fa-instagram"></i></a>
            <a href="https://wa.me/81932062" target="_blank" class="btn btn-outline-light"><i class="fab fa-whatsapp"></i></a>
        </div>
    </section>

    @include('partials.footer')
</body>
@endsection
