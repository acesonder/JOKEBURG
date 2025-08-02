<?php
/**
 * Footer Include File for JOKEBURG
 * File: /php-app/includes/footer.php
 */
?>

<footer class="footer bg-dark text-light py-5 mt-5">
    <div class="container">
        <div class="row">
            <!-- About Section -->
            <div class="col-lg-4 col-md-6 mb-4">
                <h5 class="text-primary mb-3">
                    <i class="fas fa-heart text-danger me-2"></i>
                    JOKEBURG
                </h5>
                <p class="mb-3">
                    Empowering Cobourg's community through comprehensive support, 
                    case management, and collaborative care for our most vulnerable residents.
                </p>
                <div class="social-links">
                    <a href="#" class="text-light me-3" title="Facebook">
                        <i class="fab fa-facebook-f fa-lg"></i>
                    </a>
                    <a href="#" class="text-light me-3" title="Twitter">
                        <i class="fab fa-twitter fa-lg"></i>
                    </a>
                    <a href="#" class="text-light me-3" title="LinkedIn">
                        <i class="fab fa-linkedin-in fa-lg"></i>
                    </a>
                    <a href="#" class="text-light" title="Email">
                        <i class="fas fa-envelope fa-lg"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h6 class="text-primary mb-3">Quick Links</h6>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="<?php echo BASE_URL; ?>/index.php" class="text-light text-decoration-none">
                            <i class="fas fa-home me-1"></i>Home
                        </a>
                    </li>
                    <?php if (isLoggedIn()): ?>
                        <li class="mb-2">
                            <a href="<?php echo BASE_URL; ?>/pages/dashboard.php" class="text-light text-decoration-none">
                                <i class="fas fa-tachometer-alt me-1"></i>Dashboard
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="<?php echo BASE_URL; ?>/pages/resources.php" class="text-light text-decoration-none">
                                <i class="fas fa-book-open me-1"></i>Resources
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="mb-2">
                            <a href="<?php echo BASE_URL; ?>/auth/login.php" class="text-light text-decoration-none">
                                <i class="fas fa-sign-in-alt me-1"></i>Login
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="<?php echo BASE_URL; ?>/auth/register.php" class="text-light text-decoration-none">
                                <i class="fas fa-user-plus me-1"></i>Register
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>

            <!-- Resources -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h6 class="text-primary mb-3">Emergency Resources</h6>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="tel:9053770378" class="text-light text-decoration-none">
                            <i class="fas fa-home me-1"></i>Transition House: (905) 377-0378
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="tel:9053779891" class="text-light text-decoration-none">
                            <i class="fas fa-brain me-1"></i>Mental Health: (905) 377-9891
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="tel:9058858700" class="text-light text-decoration-none">
                            <i class="fas fa-hands-helping me-1"></i>Green Wood: (905) 885-8700
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="tel:911" class="text-danger text-decoration-none">
                            <i class="fas fa-exclamation-triangle me-1"></i>Emergency: 911
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h6 class="text-primary mb-3">Contact Information</h6>
                <div class="contact-info">
                    <p class="mb-2">
                        <i class="fas fa-map-marker-alt me-2"></i>
                        Cobourg, Ontario, Canada
                    </p>
                    <p class="mb-2">
                        <i class="fas fa-envelope me-2"></i>
                        support@jokeburg.org
                    </p>
                    <p class="mb-2">
                        <i class="fas fa-clock me-2"></i>
                        24/7 Crisis Support Available
                    </p>
                </div>
            </div>
        </div>

        <!-- Bottom Section -->
        <hr class="my-4 border-secondary">
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="mb-0 text-muted">
                    &copy; <?php echo date('Y'); ?> JOKEBURG - Cobourg Community Success. 
                    All rights reserved.
                </p>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="mb-0 text-muted">
                    <i class="fas fa-code me-1"></i>
                    Version <?php echo APP_VERSION; ?> | 
                    <a href="#" class="text-primary text-decoration-none">Privacy Policy</a> | 
                    <a href="#" class="text-primary text-decoration-none">Terms of Service</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- AOS Animation Library -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- Custom JavaScript -->
<script src="<?php echo BASE_URL; ?>/assets/js/main.js"></script>

<!-- Theme Switcher Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize AOS animations
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true
    });

    // Hide loading overlay
    setTimeout(() => {
        document.getElementById('loading-overlay').style.opacity = '0';
        setTimeout(() => {
            document.getElementById('loading-overlay').style.display = 'none';
        }, 300);
    }, 500);

    // Theme switcher
    document.querySelectorAll('.theme-option').forEach(option => {
        option.addEventListener('click', function(e) {
            e.preventDefault();
            const theme = this.dataset.theme;
            
            // Send AJAX request to save theme
            fetch('<?php echo BASE_URL; ?>/auth/set-theme.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ theme: theme })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            });
        });
    });
});
</script>

</body>
</html>