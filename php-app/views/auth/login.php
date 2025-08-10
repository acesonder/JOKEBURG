<?php
$page_title = "Login";
?>

<div class="container-fluid">
    <div class="row min-vh-100">
        <!-- Left Side - Login Form -->
        <div class="col-lg-6 d-flex align-items-center justify-content-center bg-light">
            <div class="w-100" style="max-width: 400px;">
                <div class="text-center mb-4" data-aos="fade-down">
                    <img src="assets/images/logo.svg" alt="JOKEBURG Logo" width="80" height="80" class="mb-3">
                    <h2 class="fw-bold text-primary">Welcome Back</h2>
                    <p class="text-muted">Sign in to access your account</p>
                </div>
                
                <div class="card shadow-lg border-0" data-aos="fade-up">
                    <div class="card-body p-4">
                        <form id="loginForm" class="needs-validation" novalidate>
                            <div class="form-group-animated mb-4">
                                <input type="email" class="form-control form-control-animated" id="email" name="email" required placeholder=" ">
                                <label for="email" class="form-label-animated">
                                    <i class="bi bi-envelope me-2"></i>Email Address
                                </label>
                                <div class="invalid-feedback">
                                    Please provide a valid email address.
                                </div>
                            </div>
                            
                            <div class="form-group-animated mb-4">
                                <input type="password" class="form-control form-control-animated" id="password" name="password" required placeholder=" ">
                                <label for="password" class="form-label-animated">
                                    <i class="bi bi-lock me-2"></i>Password
                                </label>
                                <div class="invalid-feedback">
                                    Please provide your password.
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">
                                        Remember me
                                    </label>
                                </div>
                                <a href="#" class="text-decoration-none small" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">
                                    Forgot password?
                                </a>
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-lg w-100 mb-3 btn-animated">
                                <i class="bi bi-box-arrow-in-right me-2"></i>
                                Sign In
                            </button>
                            
                            <div class="text-center">
                                <span class="text-muted">Don't have an account? </span>
                                <a href="?page=register" class="text-decoration-none fw-bold">Join Us</a>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Demo Accounts -->
                <div class="card mt-4 border-0 bg-info bg-opacity-10" data-aos="fade-up" data-aos-delay="200">
                    <div class="card-body p-3">
                        <h6 class="fw-bold text-info mb-2">
                            <i class="bi bi-info-circle me-2"></i>Demo Accounts
                        </h6>
                        <div class="row g-2 small">
                            <div class="col-6">
                                <strong>Admin:</strong><br>
                                admin@jokeburg.ca<br>
                                password123
                            </div>
                            <div class="col-6">
                                <strong>Worker:</strong><br>
                                worker1@jokeburg.ca<br>
                                password123
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Right Side - Hero Image/Content -->
        <div class="col-lg-6 d-none d-lg-flex position-relative" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);">
            <div class="position-absolute w-100 h-100 d-flex align-items-center justify-content-center text-white p-5">
                <div class="text-center" data-aos="fade-left">
                    <h1 class="display-4 fw-bold mb-4">
                        Join Our <br>
                        <span class="text-warning">Community of Change</span>
                    </h1>
                    <p class="lead mb-4 opacity-90">
                        Access comprehensive case management tools, connect with resources, 
                        and be part of Cobourg's transformation story.
                    </p>
                    <div class="row g-3 text-center">
                        <div class="col-4">
                            <div class="stat-item">
                                <h3 class="fw-bold text-warning mb-1">150+</h3>
                                <small>Active Users</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="stat-item">
                                <h3 class="fw-bold text-info mb-1">24/7</h3>
                                <small>Support Available</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="stat-item">
                                <h3 class="fw-bold text-success mb-1">85%</h3>
                                <small>Success Rate</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Floating Elements -->
            <div class="position-absolute w-100 h-100" style="opacity: 0.1;">
                <div class="animate-float" style="position: absolute; top: 15%; left: 15%; width: 80px; height: 80px; background: white; border-radius: 50%; animation-delay: 0s;"></div>
                <div class="animate-float" style="position: absolute; top: 70%; right: 20%; width: 60px; height: 60px; background: white; border-radius: 50%; animation-delay: 1.5s;"></div>
                <div class="animate-float" style="position: absolute; bottom: 30%; left: 25%; width: 40px; height: 40px; background: white; border-radius: 50%; animation-delay: 3s;"></div>
            </div>
        </div>
    </div>
</div>

<!-- Forgot Password Modal -->
<div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="forgotPasswordModalLabel">
                    <i class="bi bi-key me-2"></i>Reset Password
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="forgotPasswordForm">
                    <p class="text-muted mb-3">
                        Enter your email address and we'll send you a link to reset your password.
                    </p>
                    <div class="mb-3">
                        <label for="resetEmail" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="resetEmail" name="resetEmail" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" form="forgotPasswordForm" class="btn btn-primary">
                    <i class="bi bi-send me-2"></i>Send Reset Link
                </button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Handle login form submission
    const loginForm = document.getElementById('loginForm');
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        if (this.checkValidity()) {
            const formData = new FormData(this);
            const email = formData.get('email');
            const password = formData.get('password');
            
            // Show loading
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Signing In...';
            submitBtn.disabled = true;
            
            // Simulate authentication (replace with actual backend call)
            setTimeout(() => {
                // Demo authentication
                if (email === 'admin@jokeburg.ca' && password === 'password123') {
                    showNotification('Welcome back! Redirecting to dashboard...', 'success');
                    setTimeout(() => {
                        window.location.href = '?page=dashboard';
                    }, 1500);
                } else if (email === 'worker1@jokeburg.ca' && password === 'password123') {
                    showNotification('Welcome back! Redirecting to dashboard...', 'success');
                    setTimeout(() => {
                        window.location.href = '?page=dashboard';
                    }, 1500);
                } else {
                    showNotification('Invalid email or password. Please try again.', 'danger');
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                    animateElement(this, 'animate-shake');
                }
            }, 2000);
        }
        
        this.classList.add('was-validated');
    });
    
    // Handle forgot password form
    const forgotPasswordForm = document.getElementById('forgotPasswordForm');
    forgotPasswordForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        const email = this.querySelector('#resetEmail').value;
        
        if (email) {
            showNotification('Password reset link sent to your email!', 'success');
            const modal = bootstrap.Modal.getInstance(document.getElementById('forgotPasswordModal'));
            modal.hide();
            this.reset();
        }
    });
});
</script>