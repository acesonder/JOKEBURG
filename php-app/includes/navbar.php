<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top animate__animated animate__slideInDown">
    <div class="container-fluid">
        <!-- Brand Logo -->
        <a class="navbar-brand d-flex align-items-center" href="?page=home">
            <img src="assets/images/logo.svg" alt="JOKEBURG Logo" width="40" height="40" class="me-2">
            <span class="fw-bold"><?php echo $site_name; ?></span>
        </a>
        
        <!-- Mobile Toggle Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <?php if(!isLoggedIn()): ?>
                <!-- Public Navigation -->
                <li class="nav-item">
                    <a class="nav-link <?php echo $page == 'home' ? 'active' : ''; ?>" href="?page=home">
                        <i class="bi bi-house-door"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $page == 'about' ? 'active' : ''; ?>" href="?page=about">
                        <i class="bi bi-info-circle"></i> About
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $page == 'contact' ? 'active' : ''; ?>" href="?page=contact">
                        <i class="bi bi-envelope"></i> Contact
                    </a>
                </li>
                <?php else: ?>
                <!-- Authenticated Navigation -->
                <li class="nav-item">
                    <a class="nav-link <?php echo $page == 'dashboard' ? 'active' : ''; ?>" href="?page=dashboard">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                </li>
                
                <?php if(hasPermission('outreach-worker')): ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-people"></i> Case Management
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="?page=clients"><i class="bi bi-person-lines-fill"></i> Clients</a></li>
                        <li><a class="dropdown-item" href="?page=assessments"><i class="bi bi-clipboard-check"></i> Assessments</a></li>
                        <li><a class="dropdown-item" href="?page=supplies"><i class="bi bi-box"></i> Supplies</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="?page=reports"><i class="bi bi-graph-up"></i> Reports</a></li>
                    </ul>
                </li>
                <?php endif; ?>
                
                <li class="nav-item">
                    <a class="nav-link <?php echo $page == 'resources' ? 'active' : ''; ?>" href="?page=resources">
                        <i class="bi bi-bookmark-star"></i> Resources
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link <?php echo $page == 'messages' ? 'active' : ''; ?>" href="?page=messages">
                        <i class="bi bi-chat-dots"></i> Messages
                        <span class="badge bg-danger ms-1" id="message-count">3</span>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
            
            <!-- Right Side Navigation -->
            <ul class="navbar-nav">
                <?php if(!isLoggedIn()): ?>
                <!-- Guest Navigation -->
                <li class="nav-item">
                    <a class="nav-link" href="?page=login">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-light ms-2" href="?page=register">
                        <i class="bi bi-person-plus"></i> Join Us
                    </a>
                </li>
                <?php else: ?>
                <!-- User Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="assets/images/avatars/default.png" alt="User Avatar" width="30" height="30" class="rounded-circle me-2">
                        <span><?php echo sanitizeOutput($_SESSION['user_name'] ?? 'User'); ?></span>
                        <span class="badge bg-secondary ms-2"><?php echo ucfirst(str_replace('-', ' ', getUserRole())); ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <h6 class="dropdown-header">
                                <i class="bi bi-person-circle"></i> Account
                            </h6>
                        </li>
                        <li><a class="dropdown-item" href="?page=profile"><i class="bi bi-person"></i> My Profile</a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#themeModal"><i class="bi bi-palette"></i> Themes</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <?php if(hasPermission('admin')): ?>
                        <li>
                            <h6 class="dropdown-header">
                                <i class="bi bi-gear"></i> Administration
                            </h6>
                        </li>
                        <li><a class="dropdown-item" href="?page=settings"><i class="bi bi-sliders"></i> Settings</a></li>
                        <li><a class="dropdown-item" href="?page=users"><i class="bi bi-people"></i> User Management</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <?php endif; ?>
                        <li><a class="dropdown-item text-danger" href="?page=logout"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                    </ul>
                </li>
                <?php endif; ?>
                
                <!-- Theme Switcher (Quick Access) -->
                <li class="nav-item">
                    <button class="nav-link btn btn-link" data-bs-toggle="modal" data-bs-target="#themeModal" title="Change Theme">
                        <i class="bi bi-palette"></i>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Spacer for fixed navbar -->
<div class="navbar-spacer" style="height: 76px;"></div>