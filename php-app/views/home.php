<?php
$page_title = "Home";
?>

<!-- Hero Section -->
<section class="hero-section bg-primary text-white position-relative overflow-hidden" style="min-height: 100vh; background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);">
    <!-- Animated Background Elements -->
    <div class="position-absolute w-100 h-100" style="opacity: 0.1;">
        <div class="animate-float" style="position: absolute; top: 10%; left: 10%; width: 100px; height: 100px; background: white; border-radius: 50%; animation-delay: 0s;"></div>
        <div class="animate-float" style="position: absolute; top: 60%; right: 15%; width: 60px; height: 60px; background: white; border-radius: 50%; animation-delay: 1s;"></div>
        <div class="animate-float" style="position: absolute; bottom: 20%; left: 20%; width: 80px; height: 80px; background: white; border-radius: 50%; animation-delay: 2s;"></div>
    </div>
    
    <div class="container d-flex align-items-center min-vh-100">
        <div class="row w-100 align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h1 class="display-3 fw-bold mb-4 animate__animated animate__fadeInUp">
                    Cobourg: <br>
                    <span class="text-warning">Confronting Our Past</span><br>
                    <span class="text-info">Creating Our Future</span>
                </h1>
                <p class="lead mb-4 animate__animated animate__fadeInUp animate__delay-1s">
                    Transform lives through comprehensive case management, integrated support services, 
                    and meaningful pathways from crisis to stability. Join us in rewriting Cobourg's story.
                </p>
                <div class="d-flex flex-wrap gap-3 mb-4 animate__animated animate__fadeInUp animate__delay-2s">
                    <a href="?page=register" class="btn btn-warning btn-lg px-4 py-3 btn-3d">
                        <i class="bi bi-person-plus me-2"></i>
                        Join Our Community
                    </a>
                    <a href="#services" class="btn btn-outline-light btn-lg px-4 py-3">
                        <i class="bi bi-arrow-down me-2"></i>
                        Learn More
                    </a>
                </div>
                <div class="row g-3 text-center animate__animated animate__fadeInUp animate__delay-3s">
                    <div class="col-4">
                        <div class="stat-item">
                            <h3 class="fw-bold text-warning mb-1">150+</h3>
                            <small>Lives Supported</small>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="stat-item">
                            <h3 class="fw-bold text-info mb-1">24/7</h3>
                            <small>Crisis Support</small>
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
            <div class="col-lg-6" data-aos="fade-left">
                <div class="hero-image position-relative">
                    <img src="assets/images/hero-illustration.svg" alt="Community Support Illustration" class="img-fluid animate-float">
                    <div class="floating-cards position-absolute">
                        <!-- Floating UI Cards for Visual Appeal -->
                        <div class="card shadow-lg animate__animated animate__fadeInUp animate__delay-1s" style="position: absolute; top: 20%; right: 10%; width: 200px;">
                            <div class="card-body p-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-success rounded-circle p-2 me-3">
                                        <i class="bi bi-heart-fill text-white"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 text-dark">Mental Health</h6>
                                        <small class="text-muted">Support Available</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card shadow-lg animate__animated animate__fadeInUp animate__delay-2s" style="position: absolute; bottom: 30%; left: 5%; width: 180px;">
                            <div class="card-body p-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-info rounded-circle p-2 me-3">
                                        <i class="bi bi-house-fill text-white"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 text-dark">Housing</h6>
                                        <small class="text-muted">Secure & Stable</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="position-absolute bottom-0 start-50 translate-middle-x mb-4">
        <a href="#about" class="text-white animate-bounce">
            <i class="bi bi-chevron-down fs-1"></i>
        </a>
    </div>
</section>

<!-- About Section -->
<section id="about" class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h2 class="display-5 fw-bold mb-4">Our Story of Transformation</h2>
                <div class="mb-4">
                    <h4 class="text-primary fw-bold mb-3">Our History, Our Truth</h4>
                    <p class="lead text-muted">
                        Cobourg is a vibrant community with a complex past. We've faced challenges with homelessness, 
                        addiction, and mental health, but within this reality lies incredible resilience and strength—a 
                        community determined to rewrite its story.
                    </p>
                </div>
                
                <div class="mb-4">
                    <h4 class="text-warning fw-bold mb-3">The Challenge We Face</h4>
                    <p class="text-muted">
                        Many residents still struggle with housing insecurity, untreated mental health conditions, 
                        and substance dependence. Current services, while vital, often fall short due to fragmented 
                        coordination and resource gaps.
                    </p>
                </div>
                
                <div class="mb-4">
                    <h4 class="text-success fw-bold mb-3">Hope for a New Beginning</h4>
                    <p class="text-muted">
                        Our vision is clear: transform Cobourg into a community where every individual can thrive. 
                        We believe in success stories—not broken systems. Through compassionate, integrated support, 
                        we create tangible pathways from crisis to stability.
                    </p>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card h-100 card-hover-lift border-0 shadow">
                            <div class="card-body text-center p-4">
                                <div class="bg-primary bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                    <i class="bi bi-people-fill fs-3 text-white"></i>
                                </div>
                                <h5 class="fw-bold">Community First</h5>
                                <p class="text-muted small mb-0">Every decision centers on community wellbeing and individual dignity</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 card-hover-lift border-0 shadow">
                            <div class="card-body text-center p-4">
                                <div class="bg-success bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                    <i class="bi bi-shield-check fs-3 text-white"></i>
                                </div>
                                <h5 class="fw-bold">Evidence-Based</h5>
                                <p class="text-muted small mb-0">Programs built on proven methods and continuous outcome tracking</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 card-hover-lift border-0 shadow">
                            <div class="card-body text-center p-4">
                                <div class="bg-info bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                    <i class="bi bi-heart-fill fs-3 text-white"></i>
                                </div>
                                <h5 class="fw-bold">Trauma-Informed</h5>
                                <p class="text-muted small mb-0">Compassionate care that recognizes and responds to trauma</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card h-100 card-hover-lift border-0 shadow">
                            <div class="card-body text-center p-4">
                                <div class="bg-warning bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                    <i class="bi bi-lightning-fill fs-3 text-white"></i>
                                </div>
                                <h5 class="fw-bold">Innovative</h5>
                                <p class="text-muted small mb-0">Technology-enhanced solutions for modern challenges</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3" data-aos="fade-up">What We Offer</h2>
            <p class="lead text-muted" data-aos="fade-up" data-aos-delay="100">
                Comprehensive, integrated support services designed to create lasting change
            </p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-card card h-100 border-0 shadow-lg card-hover-lift">
                    <div class="card-header bg-primary text-white text-center py-4">
                        <i class="bi bi-clipboard-check display-4 mb-3"></i>
                        <h4 class="fw-bold">Case Management</h4>
                    </div>
                    <div class="card-body p-4">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Individualized care plans</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Progress tracking & follow-ups</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Secure data management</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>24/7 crisis support</li>
                        </ul>
                        <a href="?page=about#case-management" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-card card h-100 border-0 shadow-lg card-hover-lift">
                    <div class="card-header bg-success text-white text-center py-4">
                        <i class="bi bi-lightning-charge display-4 mb-3"></i>
                        <h4 class="fw-bold">Smart Assessment</h4>
                    </div>
                    <div class="card-body p-4">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Real-time needs identification</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Trauma-informed approach</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Mobile-responsive tools</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Immediate service connection</li>
                        </ul>
                        <a href="?page=about#assessment" class="btn btn-outline-success">Learn More</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-card card h-100 border-0 shadow-lg card-hover-lift">
                    <div class="card-header bg-info text-white text-center py-4">
                        <i class="bi bi-chat-dots display-4 mb-3"></i>
                        <h4 class="fw-bold">Communication Hub</h4>
                    </div>
                    <div class="card-body p-4">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Secure messaging platform</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Team coordination tools</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Mobile & desktop access</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Real-time notifications</li>
                        </ul>
                        <a href="?page=about#communication" class="btn btn-outline-info">Learn More</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="service-card card h-100 border-0 shadow-lg card-hover-lift">
                    <div class="card-header bg-warning text-white text-center py-4">
                        <i class="bi bi-bookmark-star display-4 mb-3"></i>
                        <h4 class="fw-bold">Resource Network</h4>
                    </div>
                    <div class="card-body p-4">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Curated service directory</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Streamlined referrals</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Interactive mapping</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Regular updates</li>
                        </ul>
                        <a href="?page=resources" class="btn btn-outline-warning">Explore Resources</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                <div class="service-card card h-100 border-0 shadow-lg card-hover-lift">
                    <div class="card-header bg-danger text-white text-center py-4">
                        <i class="bi bi-box display-4 mb-3"></i>
                        <h4 class="fw-bold">Harm Reduction</h4>
                    </div>
                    <div class="card-body p-4">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Essential supplies distribution</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Peer support groups</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Mobile outreach</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Safe use education</li>
                        </ul>
                        <a href="?page=about#harm-reduction" class="btn btn-outline-danger">Learn More</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                <div class="service-card card h-100 border-0 shadow-lg card-hover-lift">
                    <div class="card-header bg-secondary text-white text-center py-4">
                        <i class="bi bi-graph-up display-4 mb-3"></i>
                        <h4 class="fw-bold">Analytics & Transparency</h4>
                    </div>
                    <div class="card-body p-4">
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Real-time dashboards</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Outcome tracking</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Public transparency</li>
                            <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Continuous improvement</li>
                        </ul>
                        <a href="?page=about#analytics" class="btn btn-outline-secondary">View Analytics</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Join Us Section -->
<section class="py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8" data-aos="fade-right">
                <h2 class="display-5 fw-bold mb-3">Together, We Can Turn the Page</h2>
                <p class="lead mb-4">
                    Join us as we rebuild trust, inspire hope, and create lasting success. Cobourg's future 
                    depends on us working together—ensuring that every resident has the opportunity to thrive.
                </p>
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-white bg-opacity-25 rounded-circle p-2 me-3">
                                <i class="bi bi-person-heart text-white"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Join Our Team</h6>
                                <small class="opacity-75">Become an outreach worker or service provider</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-white bg-opacity-25 rounded-circle p-2 me-3">
                                <i class="bi bi-handshake text-white"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Partner With Us</h6>
                                <small class="opacity-75">Connect your organization to our network</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-white bg-opacity-25 rounded-circle p-2 me-3">
                                <i class="bi bi-heart text-white"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Get Support</h6>
                                <small class="opacity-75">Access our comprehensive support services</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-white bg-opacity-25 rounded-circle p-2 me-3">
                                <i class="bi bi-gift text-white"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Support Our Mission</h6>
                                <small class="opacity-75">Contribute to community transformation</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center" data-aos="fade-left">
                <div class="card shadow-lg border-0 bg-white">
                    <div class="card-body p-4">
                        <h5 class="fw-bold text-dark mb-3">Ready to Make a Difference?</h5>
                        <p class="text-muted mb-4 small">
                            Whether you're seeking support or want to join our mission, we're here to help.
                        </p>
                        <div class="d-grid gap-2">
                            <a href="?page=register" class="btn btn-primary btn-lg">
                                <i class="bi bi-person-plus me-2"></i>
                                Join Now
                            </a>
                            <a href="?page=contact" class="btn btn-outline-primary">
                                <i class="bi bi-envelope me-2"></i>
                                Contact Us
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Success Stories Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3" data-aos="fade-up">Success Stories</h2>
            <p class="lead text-muted" data-aos="fade-up" data-aos-delay="100">
                Real transformations, real hope, real change
            </p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 border-0 shadow card-hover-lift">
                    <div class="card-body p-4">
                        <div class="text-center mb-3">
                            <img src="assets/images/avatars/success-1.jpg" alt="Success Story" class="rounded-circle" width="80" height="80">
                        </div>
                        <blockquote class="blockquote text-center">
                            <p class="mb-3">"JOKEBURG helped me find stable housing and connected me with mental health support. I now have hope for my future."</p>
                            <footer class="blockquote-footer">
                                <cite title="Client">Alexandra T.</cite>
                            </footer>
                        </blockquote>
                        <div class="text-center">
                            <span class="badge bg-success">Housing Secured</span>
                            <span class="badge bg-info">Mental Health Support</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card h-100 border-0 shadow card-hover-lift">
                    <div class="card-body p-4">
                        <div class="text-center mb-3">
                            <img src="assets/images/avatars/success-2.jpg" alt="Success Story" class="rounded-circle" width="80" height="80">
                        </div>
                        <blockquote class="blockquote text-center">
                            <p class="mb-3">"The integrated approach made all the difference. Instead of navigating multiple systems, everything was coordinated."</p>
                            <footer class="blockquote-footer">
                                <cite title="Client">Michael R.</cite>
                            </footer>
                        </blockquote>
                        <div class="text-center">
                            <span class="badge bg-warning">Employment</span>
                            <span class="badge bg-primary">Case Management</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card h-100 border-0 shadow card-hover-lift">
                    <div class="card-body p-4">
                        <div class="text-center mb-3">
                            <img src="assets/images/avatars/success-3.jpg" alt="Success Story" class="rounded-circle" width="80" height="80">
                        </div>
                        <blockquote class="blockquote text-center">
                            <p class="mb-3">"The peer support and harm reduction services literally saved my life. I'm now 18 months clean and helping others."</p>
                            <footer class="blockquote-footer">
                                <cite title="Client">Sarah M.</cite>
                            </footer>
                        </blockquote>
                        <div class="text-center">
                            <span class="badge bg-danger">Recovery</span>
                            <span class="badge bg-secondary">Peer Support</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact CTA Section -->
<section class="py-5 bg-dark text-white">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-lg-8" data-aos="fade-up">
                <h2 class="display-5 fw-bold mb-3">Let's Create Meaningful Change, Today</h2>
                <p class="lead mb-4">
                    Ready to be part of Cobourg's transformation? Whether you need support or want to help, 
                    we're here to make it happen together.
                </p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="?page=register" class="btn btn-primary btn-lg px-4 py-3">
                        <i class="bi bi-person-plus me-2"></i>
                        Get Started Today
                    </a>
                    <a href="?page=contact" class="btn btn-outline-light btn-lg px-4 py-3">
                        <i class="bi bi-telephone me-2"></i>
                        Call (905) 377-0378
                    </a>
                </div>
                <div class="mt-4">
                    <small class="text-muted">
                        <i class="bi bi-clock me-1"></i>
                        24/7 Crisis Support Available
                    </small>
                </div>
            </div>
        </div>
    </div>
</section>