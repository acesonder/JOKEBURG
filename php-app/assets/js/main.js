/**
 * Main JavaScript File for JOKEBURG
 * File: /php-app/assets/js/main.js
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Initialize popovers
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });

    // Animated counters
    function animateCounters() {
        const counters = document.querySelectorAll('.counter');
        
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            const duration = 2000; // 2 seconds
            const increment = target / (duration / 16); // 60fps
            let current = 0;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                counter.textContent = Math.floor(current);
            }, 16);
        });
    }

    // Intersection Observer for counter animation
    const observerOptions = {
        threshold: 0.7
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounters();
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    const counterSection = document.querySelector('.counters-section');
    if (counterSection) {
        observer.observe(counterSection);
    }

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

    // Form validation enhancement
    const forms = document.querySelectorAll('.needs-validation');
    forms.forEach(form => {
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });

    // Auto-hide alerts
    const alerts = document.querySelectorAll('.alert:not(.alert-permanent)');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.opacity = '0';
            setTimeout(() => {
                alert.remove();
            }, 300);
        }, 5000);
    });

    // Modal animations
    const modals = document.querySelectorAll('.modal');
    modals.forEach(modal => {
        modal.addEventListener('show.bs.modal', function () {
            this.querySelector('.modal-dialog').style.transform = 'translate(0, -50px) scale(0.9)';
        });
        
        modal.addEventListener('shown.bs.modal', function () {
            this.querySelector('.modal-dialog').style.transform = 'translate(0, 0) scale(1)';
        });
    });

    // Navbar background change on scroll
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('main-navbar');
        if (window.scrollY > 50) {
            navbar.style.backgroundColor = 'rgba(0, 123, 255, 0.98)';
        } else {
            navbar.style.backgroundColor = 'rgba(0, 123, 255, 0.95)';
        }
    });

    // Dashboard real-time updates (placeholder)
    function updateDashboard() {
        // This would typically connect to a WebSocket or make AJAX calls
        // For now, just a placeholder for future implementation
        console.log('Dashboard update triggered');
    }

    // Update dashboard every 30 seconds if on dashboard page
    if (window.location.pathname.includes('dashboard')) {
        setInterval(updateDashboard, 30000);
    }

    // Quick demo functionality
    function showDemoModal(role) {
        const modal = new bootstrap.Modal(document.getElementById('demoModal'));
        const modalTitle = document.querySelector('#demoModal .modal-title');
        const modalBody = document.querySelector('#demoModal .modal-body');
        
        const demoData = {
            'admin': {
                title: 'Admin Demo Account',
                content: `
                    <div class="text-center">
                        <i class="fas fa-user-shield fa-3x text-primary mb-3"></i>
                        <h5>Administrator Access</h5>
                        <p>This demo account provides full administrative access to:</p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>User Management</li>
                            <li><i class="fas fa-check text-success me-2"></i>System Reports</li>
                            <li><i class="fas fa-check text-success me-2"></i>Configuration Settings</li>
                            <li><i class="fas fa-check text-success me-2"></i>Full Client Database</li>
                        </ul>
                        <div class="mt-3">
                            <strong>Demo Credentials:</strong><br>
                            Email: admin@jokeburg.demo<br>
                            Password: AdminDemo123
                        </div>
                    </div>
                `
            },
            'provider': {
                title: 'Service Provider Demo',
                content: `
                    <div class="text-center">
                        <i class="fas fa-user-md fa-3x text-info mb-3"></i>
                        <h5>Service Provider Access</h5>
                        <p>This demo account provides provider access to:</p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Client Referrals</li>
                            <li><i class="fas fa-check text-success me-2"></i>Appointment Management</li>
                            <li><i class="fas fa-check text-success me-2"></i>Service Documentation</li>
                            <li><i class="fas fa-check text-success me-2"></i>Secure Messaging</li>
                        </ul>
                        <div class="mt-3">
                            <strong>Demo Credentials:</strong><br>
                            Email: provider@jokeburg.demo<br>
                            Password: ProviderDemo123
                        </div>
                    </div>
                `
            },
            'client': {
                title: 'Client Demo Account',
                content: `
                    <div class="text-center">
                        <i class="fas fa-user fa-3x text-warning mb-3"></i>
                        <h5>Client Portal Access</h5>
                        <p>This demo account provides client access to:</p>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i>Personal Dashboard</li>
                            <li><i class="fas fa-check text-success me-2"></i>Goal Tracking</li>
                            <li><i class="fas fa-check text-success me-2"></i>Appointment Booking</li>
                            <li><i class="fas fa-check text-success me-2"></i>Resource Directory</li>
                        </ul>
                        <div class="mt-3">
                            <strong>Demo Credentials:</strong><br>
                            Email: client@jokeburg.demo<br>
                            Password: ClientDemo123
                        </div>
                    </div>
                `
            }
        };
        
        modalTitle.textContent = demoData[role].title;
        modalBody.innerHTML = demoData[role].content;
        modal.show();
    }

    // Attach demo modal functionality to buttons
    document.querySelectorAll('[data-demo-role]').forEach(button => {
        button.addEventListener('click', function() {
            const role = this.getAttribute('data-demo-role');
            showDemoModal(role);
        });
    });

});

// Utility functions
window.JokeburgApp = {
    showNotification: function(message, type = 'info') {
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
        alertDiv.style.top = '100px';
        alertDiv.style.right = '20px';
        alertDiv.style.zIndex = '9999';
        alertDiv.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        document.body.appendChild(alertDiv);
        
        setTimeout(() => {
            alertDiv.remove();
        }, 5000);
    },
    
    loadModal: function(url, title) {
        fetch(url)
            .then(response => response.text())
            .then(html => {
                const modal = document.getElementById('dynamicModal') || this.createDynamicModal();
                modal.querySelector('.modal-title').textContent = title;
                modal.querySelector('.modal-body').innerHTML = html;
                new bootstrap.Modal(modal).show();
            })
            .catch(error => {
                this.showNotification('Error loading content', 'danger');
            });
    },
    
    createDynamicModal: function() {
        const modal = document.createElement('div');
        modal.id = 'dynamicModal';
        modal.className = 'modal fade';
        modal.innerHTML = `
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body"></div>
                </div>
            </div>
        `;
        document.body.appendChild(modal);
        return modal;
    }
};