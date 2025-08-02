<?php
/**
 * Main Landing Page for JOKEBURG
 * File: /php-app/index.php
 */

require_once 'config/config.php';

$page_title = 'Home - ' . APP_NAME;
include 'includes/header.php';
include 'includes/navbar.php';
?>

<!-- Hero Section -->
<section class="hero-section text-center" data-aos="fade-up">
    <div class="container">
        <div class="hero-content">
            <h1 class="display-4 fw-bold mb-4">
                Join Our Team. <br>
                <span class="text-gradient">Empower Your Journey.</span>
            </h1>
            <p class="lead mb-5">
                Connect with Cobourg's comprehensive support network for mental health, 
                housing, addiction recovery, and community wellness. Together, we create success stories.
            </p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="<?php echo BASE_URL; ?>/auth/register.php" class="btn btn-light btn-lg px-5">
                    <i class="fas fa-user-plus me-2"></i>Become a Client
                </a>
                <a href="<?php echo BASE_URL; ?>/auth/register.php" class="btn btn-outline-light btn-lg px-5">
                    <i class="fas fa-hands-helping me-2"></i>Join Our Team
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Why Join Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="display-5 fw-bold mb-3">Why Join JOKEBURG?</h2>
            <p class="lead text-muted">
                Experience the difference of comprehensive, compassionate care
            </p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card feature-card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <i class="fas fa-tachometer-alt fa-3x text-primary mb-3"></i>
                        <h4 class="card-title">Flexible Dashboard</h4>
                        <p class="card-text">
                            Personalized interface adapts to your role - whether you're a client 
                            tracking progress or a provider managing cases.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card feature-card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <i class="fas fa-palette fa-3x text-success mb-3"></i>
                        <h4 class="card-title">Rich Customization</h4>
                        <p class="card-text">
                            Choose from 10 beautiful themes, customize your experience, 
                            and access tools tailored to your specific needs.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card feature-card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <i class="fas fa-shield-alt fa-3x text-info mb-3"></i>
                        <h4 class="card-title">Secure Data & Consent</h4>
                        <p class="card-text">
                            Your privacy matters. Full control over data sharing with 
                            bank-level security and transparent consent management.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Animated Counters Section -->
<section class="py-5 counters-section" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <div class="container">
        <div class="row text-center text-white">
            <div class="col-lg-3 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="counter display-4 fw-bold" data-target="500">0</div>
                <h5>Clients Served</h5>
                <p class="mb-0">Active community members</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="200">
                <div class="counter display-4 fw-bold" data-target="50">0</div>
                <h5>Service Providers</h5>
                <p class="mb-0">Dedicated professionals</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="300">
                <div class="counter display-4 fw-bold" data-target="95">0</div>
                <h5>Success Rate %</h5>
                <p class="mb-0">Positive outcomes achieved</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="zoom-in" data-aos-delay="400">
                <div class="counter display-4 fw-bold" data-target="24">0</div>
                <h5>Hours Support</h5>
                <p class="mb-0">Available every day</p>
            </div>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="display-5 fw-bold mb-3">How It Works</h2>
            <p class="lead text-muted">Three simple steps to access comprehensive support</p>
        </div>
        
        <div class="row g-4 align-items-center">
            <div class="col-lg-4" data-aos="slide-in-left">
                <div class="text-center">
                    <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                         style="width: 80px; height: 80px;">
                        <span class="h3 mb-0">1</span>
                    </div>
                    <h4>Sign Up</h4>
                    <p class="text-muted">
                        Create your account in minutes. Choose your role and complete your profile 
                        to get personalized recommendations.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="text-center">
                    <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                         style="width: 80px; height: 80px;">
                        <span class="h3 mb-0">2</span>
                    </div>
                    <h4>Complete Profile</h4>
                    <p class="text-muted">
                        Take our smart assessment to help us understand your needs and connect 
                        you with the most relevant services.
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4" data-aos="slide-in-right" data-aos-delay="400">
                <div class="text-center">
                    <div class="bg-info text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                         style="width: 80px; height: 80px;">
                        <span class="h3 mb-0">3</span>
                    </div>
                    <h4>Access Support</h4>
                    <p class="text-muted">
                        Connect with your care team, access resources, track progress, 
                        and engage through secure communication channels.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Demo Accounts Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="display-5 fw-bold mb-3">Try It Now</h2>
            <p class="lead text-muted">
                Explore JOKEBURG with pre-configured demo accounts
            </p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4" data-aos="flip-left" data-aos-delay="100">
                <div class="card text-center h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <i class="fas fa-user-shield fa-3x text-primary mb-3"></i>
                        <h4 class="card-title">Admin Demo</h4>
                        <p class="card-text">
                            Experience full system administration with user management, 
                            reports, and configuration settings.
                        </p>
                        <button class="btn btn-primary" data-demo-role="admin">
                            <i class="fas fa-play me-2"></i>Try Admin Dashboard
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4" data-aos="flip-left" data-aos-delay="200">
                <div class="card text-center h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <i class="fas fa-user-md fa-3x text-info mb-3"></i>
                        <h4 class="card-title">Provider Demo</h4>
                        <p class="card-text">
                            See how service providers manage referrals, appointments, 
                            and client communications.
                        </p>
                        <button class="btn btn-info" data-demo-role="provider">
                            <i class="fas fa-play me-2"></i>Try Provider Portal
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4" data-aos="flip-left" data-aos-delay="300">
                <div class="card text-center h-100 border-0 shadow-sm">
                    <div class="card-body p-4">
                        <i class="fas fa-user fa-3x text-warning mb-3"></i>
                        <h4 class="card-title">Client Demo</h4>
                        <p class="card-text">
                            Experience the client journey with goal tracking, 
                            resource access, and progress monitoring.
                        </p>
                        <button class="btn btn-warning" data-demo-role="client">
                            <i class="fas fa-play me-2"></i>Try Client Portal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="display-5 fw-bold mb-3">Impact Stories</h2>
            <p class="lead text-muted">Real stories from our community members</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="testimonial-card">
                    <div class="testimonial-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <blockquote class="mb-3">
                        "JOKEBURG helped me find stable housing and connect with mental health support. 
                        The platform made everything so much easier to navigate."
                    </blockquote>
                    <cite class="text-muted">- Sarah M., Client</cite>
                </div>
            </div>
            
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="testimonial-card">
                    <div class="testimonial-avatar">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <blockquote class="mb-3">
                        "As a service provider, JOKEBURG streamlined our client referrals and 
                        improved communication with the entire care team."
                    </blockquote>
                    <cite class="text-muted">- Dr. Michael K., Provider</cite>
                </div>
            </div>
            
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="testimonial-card">
                    <div class="testimonial-avatar">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <blockquote class="mb-3">
                        "The platform gives us real-time insights into our community impact 
                        and helps us coordinate resources more effectively."
                    </blockquote>
                    <cite class="text-muted">- Jennifer L., Outreach Worker</cite>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Final CTA Section -->
<section class="py-5" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%);">
    <div class="container text-center text-white">
        <div data-aos="zoom-in">
            <h2 class="display-5 fw-bold mb-4">Ready to Make a Difference?</h2>
            <p class="lead mb-5">
                Join Cobourg's community success network today and be part of the solution.
            </p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="<?php echo BASE_URL; ?>/auth/register.php" class="btn btn-light btn-lg px-5">
                    <i class="fas fa-user-plus me-2"></i>Become a Client
                </a>
                <a href="<?php echo BASE_URL; ?>/auth/register.php" class="btn btn-outline-light btn-lg px-5">
                    <i class="fas fa-hands-helping me-2"></i>Join Our Team
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Demo Modal -->
<div class="modal fade" id="demoModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="<?php echo BASE_URL; ?>/auth/login.php" class="btn btn-primary">
                    <i class="fas fa-sign-in-alt me-2"></i>Go to Login
                </a>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>