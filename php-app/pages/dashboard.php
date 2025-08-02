<?php
/**
 * Dashboard Page for JOKEBURG
 * File: /php-app/pages/dashboard.php
 */

require_once '../config/config.php';

// Redirect if not logged in
if (!isLoggedIn()) {
    redirect(BASE_URL . '/auth/login.php');
}

$page_title = 'Dashboard - ' . APP_NAME;
include '../includes/header.php';
include '../includes/navbar.php';

$user_role = getUserRole();
?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="h3 mb-0">
                        <i class="fas fa-tachometer-alt me-2 text-primary"></i>
                        Dashboard
                    </h1>
                    <p class="text-muted mb-0">Welcome back, <?php echo $_SESSION['user_name']; ?>!</p>
                </div>
                <div class="badge bg-primary fs-6">
                    <i class="fas fa-user-tag me-1"></i>
                    <?php echo ucfirst($user_role); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Row -->
    <div class="row mb-4">
        <?php if ($user_role === ROLE_ADMIN): ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card dashboard-card h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Clients
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">125</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card dashboard-card h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Active Cases
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">89</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card dashboard-card h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Pending Assessments
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">12</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar-check fa-2x text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card dashboard-card h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Supply Orders
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">8</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-box fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php elseif ($user_role === ROLE_CLIENT): ?>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card dashboard-card h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Active Goals
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">3</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-bullseye fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card dashboard-card h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Goals Completed
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">1</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-check-circle fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card dashboard-card h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Unread Messages
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">2</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-envelope fa-2x text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card dashboard-card h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Next Appointment
                                </div>
                                <div class="h6 mb-0 font-weight-bold text-gray-800">Tomorrow</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Main Content Row -->
    <div class="row">
        <!-- Left Column -->
        <div class="col-lg-8">
            <?php if ($user_role === ROLE_ADMIN): ?>
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-chart-line me-2"></i>
                            System Overview
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>Recent Activity</h6>
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <i class="fas fa-user-plus text-success me-2"></i>
                                        New client registration: Jane Wilson
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-clipboard-check text-info me-2"></i>
                                        Assessment completed for John Doe
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-comments text-primary me-2"></i>
                                        5 new messages in system
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-exclamation-triangle text-warning me-2"></i>
                                        Low stock alert: Naloxone kits
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h6>Quick Actions</h6>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fas fa-user-plus me-1"></i>Add New User
                                    </button>
                                    <button class="btn btn-info btn-sm">
                                        <i class="fas fa-chart-bar me-1"></i>View Reports
                                    </button>
                                    <button class="btn btn-success btn-sm">
                                        <i class="fas fa-cog me-1"></i>System Settings
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php elseif ($user_role === ROLE_CLIENT): ?>
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">
                            <i class="fas fa-bullseye me-2"></i>
                            My Goals Progress
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Secure Permanent Housing</span>
                                <span class="text-primary">40%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" style="width: 40%"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Regular Counseling Sessions</span>
                                <span class="text-primary">60%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar" style="width: 60%"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between mb-1">
                                <span>Primary Care Connection</span>
                                <span class="text-success">100%</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-success" style="width: 100%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Right Column -->
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-phone me-2"></i>
                        Emergency Resources
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="tel:911" class="btn btn-danger">
                            <i class="fas fa-exclamation-triangle me-2"></i>Emergency: 911
                        </a>
                        <a href="tel:9053770378" class="btn btn-outline-primary">
                            <i class="fas fa-home me-2"></i>Transition House
                        </a>
                        <a href="tel:9053779891" class="btn btn-outline-info">
                            <i class="fas fa-brain me-2"></i>Mental Health Crisis
                        </a>
                        <a href="tel:9058858700" class="btn btn-outline-success">
                            <i class="fas fa-hands-helping me-2"></i>Green Wood Coalition
                        </a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-calendar me-2"></i>
                        Upcoming Events
                    </h5>
                </div>
                <div class="card-body">
                    <div class="mb-3 pb-3 border-bottom">
                        <div class="fw-bold">Team Meeting</div>
                        <div class="text-muted small">Tomorrow at 2:00 PM</div>
                    </div>
                    <div class="mb-3 pb-3 border-bottom">
                        <div class="fw-bold">Monthly Assessment Review</div>
                        <div class="text-muted small">Friday at 10:00 AM</div>
                    </div>
                    <div class="mb-3">
                        <div class="fw-bold">Community Outreach</div>
                        <div class="text-muted small">Next Monday at 9:00 AM</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>