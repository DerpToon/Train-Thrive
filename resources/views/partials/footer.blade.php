<footer class="bg-dark text-white text-center py-5 mt-auto w-100 position-relative overflow-hidden">
    <div class="container position-relative z-2">
        <div class="row justify-content-center mb-4">
            <div class="col-auto">
                <h5 class="fw-bold text-success display-6">Stride Fitness</h5>
                <p class="fst-italic text-light">Empowering Your Fitness Journey</p>
            </div>
        </div>

        <div class="row justify-content-center mb-3">
            <div class="col-auto d-flex flex-wrap gap-3">
                <a href="/privacy-policy" class="footer-link">Privacy Policy</a>
                <a href="/terms-of-service" class="footer-link">Terms of Service</a>
                <a href="/contact-us" class="footer-link">Contact Us</a>
                <a href="/about-us" class="footer-link">About Us</a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-auto">
                <ul class="list-unstyled d-flex justify-content-center mb-0 gap-3">
                    <li>
                        <a href="https://www.facebook.com" target="_blank" class="footer-icon"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                        <a href="https://twitter.com" target="_blank" class="footer-icon"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com" target="_blank" class="footer-icon"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com" target="_blank" class="footer-icon"><i class="fab fa-youtube"></i></a>
                    </li>
                </ul>
            </div>
        </div>

        <p class="mb-0 mt-4 small text-white">&copy; {{ date('Y') }} Stride Fitness. All Rights Reserved.</p>
    </div>

    <div class="footer-glow position-absolute top-50 start-50 translate-middle opacity-25"></div>
</footer>

<style>
    .footer-link {
        color: #ccc;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .footer-link:hover {
        color: #28a745;
    }

    .footer-icon {
        color: white;
        font-size: 1.5rem;
        transition: color 0.3s ease, transform 0.3s ease;
    }

    .footer-icon:hover {
        color: #28a745;
        transform: scale(1.2);
    }

    .footer-glow {
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(40, 167, 69, 0.3), transparent 70%);
        border-radius: 50%;
        pointer-events: none;
    }
</style>
