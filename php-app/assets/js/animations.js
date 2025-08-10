// Main animations JavaScript for JOKEBURG
document.addEventListener('DOMContentLoaded', function() {
    initializeScrollAnimations();
    initializeHoverEffects();
    initializeModalAnimations();
    initializeLoadingAnimations();
});

/**
 * Initialize scroll-based animations
 */
function initializeScrollAnimations() {
    // Intersection Observer for scroll animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
                
                // Staggered animations for grouped elements
                if (entry.target.hasAttribute('data-stagger')) {
                    const siblings = entry.target.parentElement.children;
                    Array.from(siblings).forEach((sibling, index) => {
                        if (sibling.hasAttribute('data-stagger')) {
                            setTimeout(() => {
                                sibling.classList.add('animate');
                            }, index * 100);
                        }
                    });
                }
            }
        });
    }, observerOptions);
    
    // Observe elements with animation classes
    const animatedElements = document.querySelectorAll('[data-aos], .scroll-animate, .fade-in-up, .fade-in-left, .fade-in-right');
    animatedElements.forEach(el => observer.observe(el));
}

/**
 * Initialize hover effects and micro-interactions
 */
function initializeHoverEffects() {
    // Enhanced button hover effects
    const buttons = document.querySelectorAll('.btn');
    buttons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            if (!this.disabled) {
                this.style.transform = 'translateY(-2px)';
                this.style.boxShadow = '0 4px 12px rgba(0,0,0,0.15)';
            }
        });
        
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '';
        });
        
        button.addEventListener('mousedown', function() {
            if (!this.disabled) {
                this.style.transform = 'translateY(0) scale(0.98)';
            }
        });
        
        button.addEventListener('mouseup', function() {
            if (!this.disabled) {
                this.style.transform = 'translateY(-2px) scale(1)';
            }
        });
    });
    
    // Card hover effects
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            if (this.classList.contains('card-hover-lift')) {
                this.style.transform = 'translateY(-8px)';
                this.style.boxShadow = '0 15px 35px rgba(0,0,0,0.1)';
            } else if (this.classList.contains('card-hover-zoom')) {
                this.style.transform = 'scale(1.02)';
            }
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = '';
            this.style.boxShadow = '';
        });
    });
    
    // Navigation item effects
    const navLinks = document.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('mouseenter', function() {
            this.style.backgroundColor = 'rgba(255, 255, 255, 0.1)';
            this.style.borderRadius = '6px';
        });
        
        link.addEventListener('mouseleave', function() {
            if (!this.classList.contains('active')) {
                this.style.backgroundColor = '';
                this.style.borderRadius = '';
            }
        });
    });
}

/**
 * Initialize modal-specific animations
 */
function initializeModalAnimations() {
    const modals = document.querySelectorAll('.modal');
    
    modals.forEach(modal => {
        // Show animation
        modal.addEventListener('show.bs.modal', function() {
            const dialog = this.querySelector('.modal-dialog');
            
            // Apply entrance animation based on modal class
            if (this.classList.contains('modal-slide-up')) {
                dialog.style.transform = 'translateY(100%)';
                dialog.style.transition = 'transform 0.3s ease-out';
            } else if (this.classList.contains('modal-slide-down')) {
                dialog.style.transform = 'translateY(-100%)';
                dialog.style.transition = 'transform 0.3s ease-out';
            } else if (this.classList.contains('modal-zoom')) {
                dialog.style.transform = 'scale(0.3)';
                dialog.style.transition = 'transform 0.3s ease-out';
            } else if (this.classList.contains('modal-flip-h')) {
                dialog.style.transform = 'perspective(1000px) rotateY(-90deg)';
                dialog.style.transition = 'transform 0.4s ease-out';
            } else {
                // Default scale animation
                dialog.style.transform = 'scale(0.7)';
                dialog.style.transition = 'transform 0.3s ease-out';
            }
        });
        
        modal.addEventListener('shown.bs.modal', function() {
            const dialog = this.querySelector('.modal-dialog');
            dialog.style.transform = 'none';
            
            // Animate modal content
            const modalBody = this.querySelector('.modal-body');
            if (modalBody) {
                animateElement(modalBody, 'animate-fade-in-up');
            }
        });
        
        // Hide animation
        modal.addEventListener('hide.bs.modal', function() {
            const dialog = this.querySelector('.modal-dialog');
            
            if (this.classList.contains('modal-slide-up')) {
                dialog.style.transform = 'translateY(100%)';
            } else if (this.classList.contains('modal-slide-down')) {
                dialog.style.transform = 'translateY(-100%)';
            } else if (this.classList.contains('modal-zoom')) {
                dialog.style.transform = 'scale(0.3)';
            } else if (this.classList.contains('modal-flip-h')) {
                dialog.style.transform = 'perspective(1000px) rotateY(90deg)';
            } else {
                dialog.style.transform = 'scale(0.7)';
            }
        });
    });
}

/**
 * Initialize loading and transition animations
 */
function initializeLoadingAnimations() {
    // Page loading animation
    window.addEventListener('load', function() {
        const loadingSpinner = document.getElementById('loading-spinner');
        if (loadingSpinner) {
            loadingSpinner.style.opacity = '0';
            loadingSpinner.style.pointerEvents = 'none';
            setTimeout(() => {
                loadingSpinner.style.display = 'none';
            }, 300);
        }
        
        // Trigger entrance animations
        const heroElements = document.querySelectorAll('.hero-section [data-aos]');
        heroElements.forEach((el, index) => {
            setTimeout(() => {
                el.classList.add('aos-animate');
            }, index * 200);
        });
    });
    
    // Form submission animations
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('button[type="submit"]');
            if (submitBtn && !submitBtn.disabled) {
                // Add loading state
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Processing...';
                submitBtn.disabled = true;
                
                // Store original text for potential restoration
                submitBtn.dataset.originalText = originalText;
            }
        });
    });
}

/**
 * Animate counter numbers
 */
function animateCounters() {
    const counters = document.querySelectorAll('[data-counter]');
    
    counters.forEach(counter => {
        const target = parseInt(counter.dataset.counter);
        const duration = parseInt(counter.dataset.duration) || 2000;
        const increment = target / (duration / 16); // 60fps
        let current = 0;
        
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                counter.textContent = target;
                clearInterval(timer);
            } else {
                counter.textContent = Math.floor(current);
            }
        }, 16);
    });
}

/**
 * Create particle effect
 */
function createParticleEffect(element, count = 10) {
    const rect = element.getBoundingClientRect();
    
    for (let i = 0; i < count; i++) {
        const particle = document.createElement('div');
        particle.className = 'particle';
        particle.style.cssText = `
            position: fixed;
            width: 4px;
            height: 4px;
            background: var(--primary-color);
            border-radius: 50%;
            pointer-events: none;
            z-index: 9999;
            left: ${rect.left + rect.width / 2}px;
            top: ${rect.top + rect.height / 2}px;
            animation: particle-burst 0.8s ease-out forwards;
            animation-delay: ${i * 0.1}s;
        `;
        
        document.body.appendChild(particle);
        
        // Remove particle after animation
        setTimeout(() => {
            particle.remove();
        }, 800 + (i * 100));
    }
}

/**
 * Add typewriter effect
 */
function typeWriter(element, text, speed = 100) {
    element.innerHTML = '';
    let i = 0;
    
    function type() {
        if (i < text.length) {
            element.innerHTML += text.charAt(i);
            i++;
            setTimeout(type, speed);
        }
    }
    
    type();
}

/**
 * Create ripple effect on click
 */
function createRipple(event) {
    const element = event.currentTarget;
    const rect = element.getBoundingClientRect();
    const ripple = document.createElement('span');
    const size = Math.max(rect.width, rect.height);
    const x = event.clientX - rect.left - size / 2;
    const y = event.clientY - rect.top - size / 2;
    
    ripple.style.cssText = `
        position: absolute;
        width: ${size}px;
        height: ${size}px;
        left: ${x}px;
        top: ${y}px;
        background: rgba(255, 255, 255, 0.6);
        border-radius: 50%;
        transform: scale(0);
        animation: ripple 0.6s linear;
        pointer-events: none;
    `;
    
    ripple.className = 'ripple-effect';
    element.style.position = 'relative';
    element.style.overflow = 'hidden';
    element.appendChild(ripple);
    
    setTimeout(() => {
        ripple.remove();
    }, 600);
}

// Add ripple effect to buttons
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('btn') && !e.target.classList.contains('btn-outline-secondary')) {
        createRipple(e);
    }
});

// CSS animations keyframes
const animationStyles = document.createElement('style');
animationStyles.textContent = `
    @keyframes particle-burst {
        0% {
            transform: translate(0, 0) scale(1);
            opacity: 1;
        }
        100% {
            transform: translate(${Math.random() * 100 - 50}px, ${Math.random() * 100 - 50}px) scale(0);
            opacity: 0;
        }
    }
    
    @keyframes ripple {
        to {
            transform: scale(2);
            opacity: 0;
        }
    }
    
    .scroll-animate {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s cubic-bezier(0.4, 0.0, 0.2, 1);
    }
    
    .scroll-animate.animate {
        opacity: 1;
        transform: translateY(0);
    }
    
    .fade-in-up {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s ease;
    }
    
    .fade-in-up.animate {
        opacity: 1;
        transform: translateY(0);
    }
    
    .fade-in-left {
        opacity: 0;
        transform: translateX(-30px);
        transition: all 0.6s ease;
    }
    
    .fade-in-left.animate {
        opacity: 1;
        transform: translateX(0);
    }
    
    .fade-in-right {
        opacity: 0;
        transform: translateX(30px);
        transition: all 0.6s ease;
    }
    
    .fade-in-right.animate {
        opacity: 1;
        transform: translateX(0);
    }
`;

document.head.appendChild(animationStyles);