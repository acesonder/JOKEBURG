<?php
require_once 'config/app.php';

// Include header
include 'includes/header.php';

// Include navigation
include 'includes/navbar.php';

// Main content area
echo '<div class="main-wrapper">';

// Handle routing
switch($page) {
    case 'home':
        include 'views/home.php';
        break;
    case 'about':
        include 'views/about.php';
        break;
    case 'contact':
        include 'views/contact.php';
        break;
    case 'login':
        include 'views/auth/login.php';
        break;
    case 'register':
        include 'views/auth/register.php';
        break;
    case 'logout':
        include 'controllers/auth_controller.php';
        logout();
        break;
    case 'dashboard':
        include 'views/dashboard/dashboard.php';
        break;
    case 'profile':
        include 'views/profile/profile.php';
        break;
    case 'clients':
        include 'views/clients/clients.php';
        break;
    case 'assessments':
        include 'views/assessments/assessments.php';
        break;
    case 'messages':
        include 'views/messages/messages.php';
        break;
    case 'resources':
        include 'views/resources/resources.php';
        break;
    case 'supplies':
        include 'views/supplies/supplies.php';
        break;
    case 'settings':
        include 'views/admin/settings.php';
        break;
    case 'themes':
        include 'views/admin/themes.php';
        break;
    default:
        include 'views/404.php';
        break;
}

echo '</div>'; // End main-wrapper

// Include footer
include 'includes/footer.php';
?>