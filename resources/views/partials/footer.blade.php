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
                <a href="#" class="footer-link">Privacy Policy</a>
                <a href="#" class="footer-link">Terms of Service</a>
                <a href="#" class="footer-link">Contact Us</a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-auto">
                <ul class="list-unstyled d-flex justify-content-center mb-0 gap-3">
                    <li>
                        <a href="#" class="footer-icon"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                        <a href="#" class="footer-icon"><i class="fab fa-x-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#" class="footer-icon"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li>
                        <a href="#" class="footer-icon"><i class="fab fa-youtube"></i></a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- New Icon Buttons -->
        <div class="row justify-content-center mt-4">
            <div class="col-auto d-flex gap-3">
                <a href="#" class="social-btn facebook-btn" title="Facebook">
                    <img src="/imgs/Workouts/facebook.png" alt="Facebook" />
                </a>
                <a href="#" class="social-btn instagram-btn" title="Instagram">
                    <img src="/imgs/Workouts/instagram.png" alt="Instagram" />
                </a>
                <a href="#" class="social-btn whatsapp-btn" title="WhatsApp">
                    <img src="/imgs/Workouts/whatsapp.png" alt="WhatsApp" />
                </a>
            </div>
        </div>

        <p class="mb-0 mt-4 small text-muted">&copy; 2025 Stride Fitness. All Rights Reserved.</p>
    </div>

    <!-- Optional glow effect background -->
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
        z-index: 0;
    }

    .social-btn {
        width: 50px;
        height: 50px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        overflow: hidden;
        background-color: #222;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .social-btn img {
        width: 60%;
        height: 60%;
        object-fit: contain;
        transition: filter 0.3s ease;
    }

    .social-btn:hover {
        transform: scale(1.1);
        box-shadow: 0 0 20px rgba(40, 167, 69, 0.6);
    }

    .facebook-btn:hover img,
    .instagram-btn:hover img,
    .whatsapp-btn:hover img {
        filter: none;
    }
</style>
