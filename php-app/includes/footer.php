    <!-- Footer -->
    <footer class="footer bg-dark text-light py-5 mt-5">
        <div class="container">
            <div class="row">
                <!-- About Section -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5 class="fw-bold mb-3">
                        <img src="assets/images/logo-white.svg" alt="JOKEBURG" width="30" height="30" class="me-2">
                        <?php echo $site_name; ?>
                    </h5>
                    <p class="text-muted">
                        Supporting Cobourg's community through comprehensive case management, 
                        integrated support services, and meaningful pathways to success.
                    </p>
                    <div class="social-links">
                        <a href="#" class="text-light me-3" title="Facebook">
                            <i class="bi bi-facebook fs-5"></i>
                        </a>
                        <a href="#" class="text-light me-3" title="Twitter">
                            <i class="bi bi-twitter fs-5"></i>
                        </a>
                        <a href="#" class="text-light me-3" title="LinkedIn">
                            <i class="bi bi-linkedin fs-5"></i>
                        </a>
                        <a href="#" class="text-light" title="Instagram">
                            <i class="bi bi-instagram fs-5"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="fw-bold mb-3">Quick Links</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="?page=home" class="text-muted text-decoration-none">Home</a></li>
                        <li class="mb-2"><a href="?page=about" class="text-muted text-decoration-none">About Us</a></li>
                        <li class="mb-2"><a href="?page=contact" class="text-muted text-decoration-none">Contact</a></li>
                        <?php if(isLoggedIn()): ?>
                        <li class="mb-2"><a href="?page=dashboard" class="text-muted text-decoration-none">Dashboard</a></li>
                        <li class="mb-2"><a href="?page=resources" class="text-muted text-decoration-none">Resources</a></li>
                        <?php else: ?>
                        <li class="mb-2"><a href="?page=login" class="text-muted text-decoration-none">Login</a></li>
                        <li class="mb-2"><a href="?page=register" class="text-muted text-decoration-none">Join Us</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                
                <!-- Services -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <h6 class="fw-bold mb-3">Our Services</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><span class="text-muted">Case Management</span></li>
                        <li class="mb-2"><span class="text-muted">Smart Assessments</span></li>
                        <li class="mb-2"><span class="text-muted">Resource Directory</span></li>
                        <li class="mb-2"><span class="text-muted">Harm Reduction</span></li>
                        <li class="mb-2"><span class="text-muted">Peer Support</span></li>
                        <li class="mb-2"><span class="text-muted">Crisis Intervention</span></li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <h6 class="fw-bold mb-3">Contact Information</h6>
                    <div class="contact-info">
                        <div class="mb-2">
                            <i class="bi bi-geo-alt me-2"></i>
                            <span class="text-muted">Cobourg, Ontario, Canada</span>
                        </div>
                        <div class="mb-2">
                            <i class="bi bi-telephone me-2"></i>
                            <a href="tel:+19053770378" class="text-muted text-decoration-none">(905) 377-0378</a>
                        </div>
                        <div class="mb-2">
                            <i class="bi bi-envelope me-2"></i>
                            <a href="mailto:info@jokeburg.ca" class="text-muted text-decoration-none">info@jokeburg.ca</a>
                        </div>
                        <div class="mb-2">
                            <i class="bi bi-clock me-2"></i>
                            <span class="text-muted">24/7 Crisis Support</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <hr class="my-4 border-secondary">
            
            <!-- Footer Bottom -->
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <p class="mb-0 text-muted">
                        &copy; <?php echo date('Y'); ?> <?php echo $site_name; ?>. All rights reserved.
                        <span class="ms-2">
                            <a href="#" class="text-muted text-decoration-none">Privacy Policy</a>
                            <span class="mx-2">|</span>
                            <a href="#" class="text-muted text-decoration-none">Terms of Service</a>
                        </span>
                    </p>
                </div>
                <div class="col-lg-6 text-lg-end">
                    <p class="mb-0 text-muted">
                        <i class="bi bi-heart-fill text-danger"></i>
                        Made with love for the Cobourg community
                    </p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Theme Selector Modal -->
    <div class="modal fade" id="themeModal" tabindex="-1" aria-labelledby="themeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="themeModalLabel">
                        <i class="bi bi-palette"></i> Choose Your Theme
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6 col-lg-4">
                            <div class="theme-option" data-theme="theme-cobourg-blue">
                                <div class="theme-preview bg-primary"></div>
                                <h6 class="mt-2">Cobourg Blue</h6>
                                <p class="text-muted small">Professional and trustworthy</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="theme-option" data-theme="theme-forest-green">
                                <div class="theme-preview bg-success"></div>
                                <h6 class="mt-2">Forest Green</h6>
                                <p class="text-muted small">Natural and calming</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="theme-option" data-theme="theme-sunset-orange">
                                <div class="theme-preview bg-warning"></div>
                                <h6 class="mt-2">Sunset Orange</h6>
                                <p class="text-muted small">Warm and energetic</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="theme-option" data-theme="theme-deep-purple">
                                <div class="theme-preview" style="background: #6f42c1;"></div>
                                <h6 class="mt-2">Deep Purple</h6>
                                <p class="text-muted small">Creative and inspiring</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="theme-option" data-theme="theme-crimson-red">
                                <div class="theme-preview bg-danger"></div>
                                <h6 class="mt-2">Crimson Red</h6>
                                <p class="text-muted small">Bold and confident</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="theme-option" data-theme="theme-ocean-teal">
                                <div class="theme-preview bg-info"></div>
                                <h6 class="mt-2">Ocean Teal</h6>
                                <p class="text-muted small">Fresh and modern</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="theme-option" data-theme="theme-midnight-dark">
                                <div class="theme-preview bg-dark"></div>
                                <h6 class="mt-2">Midnight Dark</h6>
                                <p class="text-muted small">Sleek and professional</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="theme-option" data-theme="theme-sunrise-yellow">
                                <div class="theme-preview" style="background: #ffc107;"></div>
                                <h6 class="mt-2">Sunrise Yellow</h6>
                                <p class="text-muted small">Bright and optimistic</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="theme-option" data-theme="theme-lavender-soft">
                                <div class="theme-preview" style="background: #e6e6fa;"></div>
                                <h6 class="mt-2">Lavender Soft</h6>
                                <p class="text-muted small">Gentle and peaceful</p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4">
                            <div class="theme-option" data-theme="theme-earth-brown">
                                <div class="theme-preview" style="background: #8b4513;"></div>
                                <h6 class="mt-2">Earth Brown</h6>
                                <p class="text-muted small">Grounded and stable</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="applyTheme">Apply Theme</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Back to Top Button -->
    <button class="btn btn-primary btn-back-to-top" id="backToTop" style="display: none;">
        <i class="bi bi-arrow-up"></i>
    </button>
    
    <!-- JavaScript Libraries -->
    <!-- Bootstrap 5.3 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- AOS (Animate On Scroll) -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    
    <!-- Custom JavaScript -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/themes.js"></script>
    <script src="assets/js/animations.js"></script>
    
    <!-- Initialize AOS -->
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });
    </script>
    
    <!-- Remove loading spinner -->
    <script>
        window.addEventListener('load', function() {
            const spinner = document.getElementById('loading-spinner');
            if (spinner) {
                spinner.style.opacity = '0';
                setTimeout(() => spinner.style.display = 'none', 300);
            }
        });
    </script>
    
</body>
</html>