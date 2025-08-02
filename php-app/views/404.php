<?php
$page_title = "Page Not Found";
?>

<div class="container-fluid d-flex align-items-center justify-content-center min-vh-100">
    <div class="text-center" data-aos="fade-up">
        <!-- 404 Animation -->
        <div class="mb-4">
            <div class="error-animation position-relative d-inline-block">
                <h1 class="display-1 fw-bold text-primary mb-0 animate__animated animate__bounceIn" style="font-size: 8rem;">
                    4<span class="text-warning animate__animated animate__pulse animate__infinite">0</span>4
                </h1>
                <div class="floating-elements position-absolute w-100 h-100 top-0 start-0">
                    <i class="bi bi-question-circle position-absolute animate-float" 
                       style="top: 20%; left: 10%; font-size: 2rem; color: var(--info-color); animation-delay: 0s;"></i>
                    <i class="bi bi-exclamation-triangle position-absolute animate-float" 
                       style="top: 60%; right: 15%; font-size: 1.5rem; color: var(--warning-color); animation-delay: 1s;"></i>
                    <i class="bi bi-search position-absolute animate-float" 
                       style="bottom: 30%; left: 20%; font-size: 1.8rem; color: var(--success-color); animation-delay: 2s;"></i>
                </div>
            </div>
        </div>

        <!-- Error Message -->
        <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
            <h2 class="h3 fw-bold text-dark mb-3">Oops! Page Not Found</h2>
            <p class="lead text-muted mb-4">
                The page you're looking for doesn't exist or has been moved. 
                Don't worry, let's get you back on track!
            </p>
        </div>

        <!-- Action Buttons -->
        <div class="mb-4" data-aos="fade-up" data-aos-delay="400">
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="?page=home" class="btn btn-primary btn-lg px-4 py-3 btn-3d">
                    <i class="bi bi-house-door me-2"></i>
                    Go Home
                </a>
                <a href="?page=resources" class="btn btn-outline-primary btn-lg px-4 py-3">
                    <i class="bi bi-bookmark-star me-2"></i>
                    Browse Resources
                </a>
                <button class="btn btn-outline-secondary btn-lg px-4 py-3" onclick="window.history.back()">
                    <i class="bi bi-arrow-left me-2"></i>
                    Go Back
                </button>
            </div>
        </div>

        <!-- Search Suggestion -->
        <div class="mb-4" data-aos="fade-up" data-aos-delay="600">
            <div class="card border-0 shadow-lg mx-auto" style="max-width: 500px;">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-search text-primary me-2"></i>
                        Try Searching Instead
                    </h5>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for resources, services, or help..." id="searchInput">
                        <button class="btn btn-primary" type="button" onclick="performSearch()">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Help Section -->
        <div data-aos="fade-up" data-aos-delay="800">
            <div class="row justify-content-center g-3">
                <div class="col-md-3 col-sm-6">
                    <div class="card border-0 bg-light h-100 card-hover-lift">
                        <div class="card-body text-center p-3">
                            <i class="bi bi-headset fs-1 text-primary mb-2"></i>
                            <h6 class="fw-bold">Need Help?</h6>
                            <small class="text-muted">24/7 Support Available</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card border-0 bg-light h-100 card-hover-lift">
                        <div class="card-body text-center p-3">
                            <i class="bi bi-chat-dots fs-1 text-success mb-2"></i>
                            <h6 class="fw-bold">Live Chat</h6>
                            <small class="text-muted">Chat with our team</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card border-0 bg-light h-100 card-hover-lift">
                        <div class="card-body text-center p-3">
                            <i class="bi bi-telephone fs-1 text-info mb-2"></i>
                            <h6 class="fw-bold">Call Us</h6>
                            <small class="text-muted">(905) 377-0378</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="card border-0 bg-light h-100 card-hover-lift">
                        <div class="card-body text-center p-3">
                            <i class="bi bi-envelope fs-1 text-warning mb-2"></i>
                            <h6 class="fw-bold">Email</h6>
                            <small class="text-muted">info@jokeburg.ca</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Emergency Contact -->
        <div class="mt-5" data-aos="fade-up" data-aos-delay="1000">
            <div class="alert alert-danger d-inline-flex align-items-center mx-auto" style="max-width: 600px;">
                <i class="bi bi-exclamation-triangle-fill fs-4 me-3 animate-pulse"></i>
                <div>
                    <strong>Emergency?</strong> If you need immediate help, please call 
                    <a href="tel:911" class="alert-link fw-bold">911</a> or our crisis line at 
                    <a href="tel:9053770378" class="alert-link fw-bold">(905) 377-0378</a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add some custom styles for the 404 page -->
<style>
.error-animation {
    position: relative;
    z-index: 1;
}

.floating-elements {
    z-index: 0;
}

.card-hover-lift {
    transition: all 0.3s ease;
    cursor: pointer;
}

.card-hover-lift:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}

@media (max-width: 768px) {
    .display-1 {
        font-size: 5rem !important;
    }
    
    .floating-elements i {
        font-size: 1.2rem !important;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add click handlers to help cards
    const helpCards = document.querySelectorAll('.card-hover-lift');
    
    helpCards.forEach((card, index) => {
        card.addEventListener('click', function() {
            const cardBody = this.querySelector('.card-body');
            const title = cardBody.querySelector('h6').textContent;
            
            switch(index) {
                case 0: // Need Help?
                    showNotification('Connecting you to our help center...', 'info');
                    break;
                case 1: // Live Chat
                    showNotification('Live chat feature coming soon!', 'info');
                    break;
                case 2: // Call Us
                    window.open('tel:+19053770378', '_self');
                    break;
                case 3: // Email
                    window.open('mailto:info@jokeburg.ca', '_self');
                    break;
            }
            
            // Add click animation
            animateElement(this, 'animate-pulse');
        });
    });
    
    // Auto-focus search input
    const searchInput = document.getElementById('searchInput');
    setTimeout(() => {
        searchInput.focus();
    }, 1000);
    
    // Handle Enter key in search
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            performSearch();
        }
    });
});

function performSearch() {
    const searchInput = document.getElementById('searchInput');
    const searchTerm = searchInput.value.trim();
    
    if (searchTerm) {
        // Redirect to resources page with search term
        window.location.href = `?page=resources&search=${encodeURIComponent(searchTerm)}`;
    } else {
        showNotification('Please enter a search term', 'warning');
        animateElement(searchInput.parentElement, 'animate-shake');
    }
}

// Add some fun Easter egg - typing specific words
document.addEventListener('keydown', function(e) {
    if (e.ctrlKey && e.key === 'h') {
        e.preventDefault();
        showNotification('🎉 You found the secret shortcut! Going home...', 'success');
        setTimeout(() => {
            window.location.href = '?page=home';
        }, 1500);
    }
});
</script>