<?php
/**
 * Navigation Bar Include File for JOKEBURG
 * File: /php-app/includes/navbar.php
 */
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="main-navbar">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="navbar-brand d-flex align-items-center" href="<?php echo BASE_URL; ?>/index.php">
            <i class="fas fa-heart text-danger me-2 fa-beat"></i>
            <span class="fw-bold">JOKEBURG</span>
            <small class="ms-2 text-light opacity-75">Community Success</small>
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Items -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <?php if (isLoggedIn()): ?>
                <!-- Authenticated User Menu -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>/pages/dashboard.php">
                            <i class="fas fa-tachometer-alt me-1"></i>Dashboard
                        </a>
                    </li>
                    
                    <?php if (getUserRole() === ROLE_CLIENT): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>/pages/my-profile.php">
                                <i class="fas fa-user me-1"></i>My Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>/pages/my-goals.php">
                                <i class="fas fa-bullseye me-1"></i>My Goals
                            </a>
                        </li>
                    <?php elseif (getUserRole() === ROLE_ADMIN): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                <i class="fas fa-users-cog me-1"></i>Management
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>/pages/clients.php">
                                    <i class="fas fa-users me-1"></i>Clients
                                </a></li>
                                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>/pages/users.php">
                                    <i class="fas fa-user-tie me-1"></i>Users
                                </a></li>
                                <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>/pages/reports.php">
                                    <i class="fas fa-chart-bar me-1"></i>Reports
                                </a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>/pages/messages.php">
                            <i class="fas fa-comments me-1"></i>Messages
                            <span class="badge bg-danger ms-1">3</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>/pages/resources.php">
                            <i class="fas fa-book-open me-1"></i>Resources
                        </a>
                    </li>
                </ul>

                <!-- User Menu -->
                <ul class="navbar-nav">
                    <!-- Theme Selector -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" title="Change Theme">
                            <i class="fas fa-palette"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end theme-selector">
                            <li><h6 class="dropdown-header">Choose Theme</h6></li>
                            <?php foreach ($themes as $theme_id => $theme_name): ?>
                                <li>
                                    <a class="dropdown-item theme-option <?php echo getCurrentTheme() === $theme_id ? 'active' : ''; ?>" 
                                       href="#" data-theme="<?php echo $theme_id; ?>">
                                        <span class="theme-preview theme-<?php echo $theme_id; ?>"></span>
                                        <?php echo $theme_name; ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>

                    <!-- User Profile -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i>
                            <?php echo $_SESSION['user_name'] ?? 'User'; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>/pages/profile.php">
                                <i class="fas fa-user-edit me-1"></i>Edit Profile
                            </a></li>
                            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>/pages/settings.php">
                                <i class="fas fa-cog me-1"></i>Settings
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="<?php echo BASE_URL; ?>/auth/logout.php">
                                <i class="fas fa-sign-out-alt me-1"></i>Logout
                            </a></li>
                        </ul>
                    </li>
                </ul>
            <?php else: ?>
                <!-- Guest User Menu -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>/auth/login.php">
                            <i class="fas fa-sign-in-alt me-1"></i>Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>/auth/register.php">
                            <i class="fas fa-user-plus me-1"></i>Register
                        </a>
                    </li>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</nav>

<!-- Spacer for fixed navbar -->
<div style="height: 80px;"></div>