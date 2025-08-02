<?php
$page_title = "Dashboard";
// Simulate session data
$_SESSION['user_id'] = 1;
$_SESSION['user_name'] = 'Sarah Johnson';
$_SESSION['user_role'] = 'outreach-worker';
$_SESSION['user_email'] = 'worker1@jokeburg.ca';
?>

<div class="container-fluid px-4">
    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card bg-gradient text-white border-0 shadow-lg" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);" data-aos="fade-down">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <h1 class="h2 fw-bold mb-2">
                                Welcome back, <?php echo sanitizeOutput($_SESSION['user_name']); ?>! 
                                <span class="wave animate__animated animate__swing animate__infinite animate__slow">👋</span>
                            </h1>
                            <p class="mb-3 opacity-90">
                                You have 3 new messages and 2 pending assessments that need your attention.
                            </p>
                            <div class="d-flex gap-2">
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#quickActionsModal">
                                    <i class="bi bi-lightning-charge me-1"></i>Quick Actions
                                </button>
                                <button class="btn btn-outline-light btn-sm" data-bs-toggle="modal" data-bs-target="#notificationsModal">
                                    <i class="bi bi-bell me-1"></i>Notifications <span class="badge bg-danger ms-1">5</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-4 text-end d-none d-lg-block">
                            <div class="position-relative">
                                <img src="assets/images/dashboard-hero.svg" alt="Dashboard" class="img-fluid animate-float" style="max-height: 120px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card border-0 shadow card-hover-lift h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="bg-primary bg-gradient rounded-circle p-3 me-3">
                            <i class="bi bi-people-fill fs-4 text-white"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-1 text-primary">12</h3>
                            <p class="text-muted mb-0 small">Active Clients</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-primary" style="width: 75%"></div>
                        </div>
                        <small class="text-muted">+3 this week</small>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="card border-0 shadow card-hover-lift h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="bg-success bg-gradient rounded-circle p-3 me-3">
                            <i class="bi bi-clipboard-check fs-4 text-white"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-1 text-success">8</h3>
                            <p class="text-muted mb-0 small">Assessments</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-success" style="width: 60%"></div>
                        </div>
                        <small class="text-muted">2 pending review</small>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="card border-0 shadow card-hover-lift h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="bg-warning bg-gradient rounded-circle p-3 me-3">
                            <i class="bi bi-chat-dots fs-4 text-white"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-1 text-warning">15</h3>
                            <p class="text-muted mb-0 small">Messages</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-warning" style="width: 90%"></div>
                        </div>
                        <small class="text-muted">3 unread</small>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="card border-0 shadow card-hover-lift h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="bg-info bg-gradient rounded-circle p-3 me-3">
                            <i class="bi bi-box fs-4 text-white"></i>
                        </div>
                        <div>
                            <h3 class="fw-bold mb-1 text-info">23</h3>
                            <p class="text-muted mb-0 small">Supply Orders</p>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="progress" style="height: 4px;">
                            <div class="progress-bar bg-info" style="width: 45%"></div>
                        </div>
                        <small class="text-muted">5 pending</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row g-4">
        <!-- Recent Activity -->
        <div class="col-lg-8">
            <div class="card border-0 shadow h-100" data-aos="fade-up">
                <div class="card-header bg-white border-0 pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0">
                            <i class="bi bi-activity text-primary me-2"></i>Recent Activity
                        </h5>
                        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#activityModal">
                            <i class="bi bi-eye me-1"></i>View All
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-marker bg-success"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Assessment Completed</h6>
                                <p class="text-muted mb-1 small">Completed intake assessment for Alex Thompson</p>
                                <small class="text-muted">2 hours ago</small>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker bg-info"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Message Received</h6>
                                <p class="text-muted mb-1 small">New message from Jordan Williams about housing update</p>
                                <small class="text-muted">4 hours ago</small>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker bg-warning"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Supply Order</h6>
                                <p class="text-muted mb-1 small">Distributed harm reduction supplies to Sam Brown</p>
                                <small class="text-muted">1 day ago</small>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-marker bg-primary"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1">Goal Updated</h6>
                                <p class="text-muted mb-1 small">Updated housing goals for Alex Thompson</p>
                                <small class="text-muted">2 days ago</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Quick Actions & Shortcuts -->
        <div class="col-lg-4">
            <div class="card border-0 shadow h-100" data-aos="fade-up" data-aos-delay="200">
                <div class="card-header bg-white border-0 pb-0">
                    <h5 class="fw-bold mb-0">
                        <i class="bi bi-lightning-charge text-warning me-2"></i>Quick Actions
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary btn-lg text-start" data-bs-toggle="modal" data-bs-target="#newClientModal">
                            <i class="bi bi-person-plus me-2"></i>
                            Add New Client
                        </button>
                        <button class="btn btn-success btn-lg text-start" data-bs-toggle="modal" data-bs-target="#assessmentModal">
                            <i class="bi bi-clipboard-check me-2"></i>
                            Start Assessment
                        </button>
                        <button class="btn btn-info btn-lg text-start" data-bs-toggle="modal" data-bs-target="#messageModal">
                            <i class="bi bi-chat-dots me-2"></i>
                            Send Message
                        </button>
                        <button class="btn btn-warning btn-lg text-start" data-bs-toggle="modal" data-bs-target="#supplyOrderModal">
                            <i class="bi bi-box me-2"></i>
                            Order Supplies
                        </button>
                        <hr>
                        <div class="row g-2">
                            <div class="col-6">
                                <button class="btn btn-outline-secondary w-100" data-bs-toggle="modal" data-bs-target="#reportsModal">
                                    <i class="bi bi-graph-up d-block mb-1"></i>
                                    <small>Reports</small>
                                </button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-outline-secondary w-100" data-bs-toggle="modal" data-bs-target="#settingsModal">
                                    <i class="bi bi-gear d-block mb-1"></i>
                                    <small>Settings</small>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions Modal -->
<div class="modal fade modal-slide-up" id="quickActionsModal" tabindex="-1" aria-labelledby="quickActionsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="quickActionsModalLabel">
                    <i class="bi bi-lightning-charge me-2"></i>Quick Actions Dashboard
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="card border-primary h-100 card-hover-lift">
                            <div class="card-body text-center p-3">
                                <i class="bi bi-person-plus fs-1 text-primary mb-2"></i>
                                <h6 class="fw-bold">New Client</h6>
                                <p class="small text-muted mb-2">Register a new client in the system</p>
                                <button class="btn btn-primary btn-sm">Add Client</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-success h-100 card-hover-lift">
                            <div class="card-body text-center p-3">
                                <i class="bi bi-clipboard-check fs-1 text-success mb-2"></i>
                                <h6 class="fw-bold">Assessment</h6>
                                <p class="small text-muted mb-2">Conduct needs assessment</p>
                                <button class="btn btn-success btn-sm">Start Assessment</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-info h-100 card-hover-lift">
                            <div class="card-body text-center p-3">
                                <i class="bi bi-chat-dots fs-1 text-info mb-2"></i>
                                <h6 class="fw-bold">Message</h6>
                                <p class="small text-muted mb-2">Send secure message</p>
                                <button class="btn btn-info btn-sm">Compose</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-warning h-100 card-hover-lift">
                            <div class="card-body text-center p-3">
                                <i class="bi bi-box fs-1 text-warning mb-2"></i>
                                <h6 class="fw-bold">Supplies</h6>
                                <p class="small text-muted mb-2">Order harm reduction supplies</p>
                                <button class="btn btn-warning btn-sm">Order Now</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-danger h-100 card-hover-lift">
                            <div class="card-body text-center p-3">
                                <i class="bi bi-exclamation-triangle fs-1 text-danger mb-2"></i>
                                <h6 class="fw-bold">Crisis</h6>
                                <p class="small text-muted mb-2">Emergency intervention</p>
                                <button class="btn btn-danger btn-sm">Crisis Mode</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card border-secondary h-100 card-hover-lift">
                            <div class="card-body text-center p-3">
                                <i class="bi bi-calendar-event fs-1 text-secondary mb-2"></i>
                                <h6 class="fw-bold">Appointment</h6>
                                <p class="small text-muted mb-2">Schedule meeting</p>
                                <button class="btn btn-secondary btn-sm">Schedule</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Additional CSS for Timeline -->
<style>
.timeline {
    position: relative;
    padding-left: 30px;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 15px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: #dee2e6;
}

.timeline-item {
    position: relative;
    margin-bottom: 20px;
}

.timeline-marker {
    position: absolute;
    left: -37px;
    top: 5px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    border: 2px solid white;
    box-shadow: 0 0 0 2px #dee2e6;
}

.timeline-content {
    background: #f8f9fa;
    padding: 12px;
    border-radius: 8px;
    border-left: 3px solid var(--primary-color);
}

.timeline-item:last-child {
    margin-bottom: 0;
}

.wave {
    display: inline-block;
    animation-duration: 2s;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add dynamic counter animations
    const counters = document.querySelectorAll('.card-body h3');
    counters.forEach(counter => {
        const target = parseInt(counter.textContent);
        let current = 0;
        const increment = target / 30;
        
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                counter.textContent = target;
                clearInterval(timer);
            } else {
                counter.textContent = Math.floor(current);
            }
        }, 50);
    });
    
    // Add interactive hover effects to cards
    const cards = document.querySelectorAll('.card-hover-lift');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
            this.style.boxShadow = '0 10px 30px rgba(0,0,0,0.2)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 4px 6px rgba(0,0,0,0.1)';
        });
    });
});
</script>