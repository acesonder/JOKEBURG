<?php
session_start();
require_once 'config/database.php';

// Initialize database connection
$database = new Database();
$db = $database->getConnection();

// Get current theme from session or default
$current_theme = $_SESSION['theme'] ?? 'theme-cobourg-blue';

// Basic configuration
$site_name = "JOKEBURG";
$site_tagline = "Cobourg Community Success Platform";
$base_url = "http" . (isset($_SERVER['HTTPS']) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']);

// Helper functions
function isLoggedIn() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

function getUserRole() {
    return $_SESSION['user_role'] ?? 'guest';
}

function hasPermission($required_role) {
    $user_role = getUserRole();
    $hierarchy = ['guest' => 0, 'client' => 1, 'outreach-worker' => 2, 'service-provider' => 3, 'admin' => 4];
    return isset($hierarchy[$user_role], $hierarchy[$required_role]) && 
           $hierarchy[$user_role] >= $hierarchy[$required_role];
}

function formatDate($date, $format = 'M j, Y') {
    return date($format, strtotime($date));
}

function sanitizeOutput($text) {
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
}

function redirectTo($url) {
    header("Location: $url");
    exit();
}

function showAlert($message, $type = 'info') {
    $_SESSION['alert'] = ['message' => $message, 'type' => $type];
}

function getAlert() {
    if (isset($_SESSION['alert'])) {
        $alert = $_SESSION['alert'];
        unset($_SESSION['alert']);
        return $alert;
    }
    return null;
}

// Route handling
$page = $_GET['page'] ?? 'home';
$action = $_GET['action'] ?? '';

// Security: Sanitize page parameter
$page = preg_replace('/[^a-zA-Z0-9_-]/', '', $page);

// Available pages
$public_pages = ['home', 'about', 'contact', 'login', 'register'];
$auth_pages = ['dashboard', 'profile', 'messages', 'logout'];
$worker_pages = ['clients', 'assessments', 'supplies', 'reports'];
$admin_pages = ['users', 'resources', 'settings', 'themes'];

// Check access permissions
if (!isLoggedIn() && !in_array($page, $public_pages)) {
    redirectTo('?page=login');
}

if (isLoggedIn() && in_array($page, $worker_pages) && !hasPermission('outreach-worker')) {
    redirectTo('?page=dashboard');
}

if (isLoggedIn() && in_array($page, $admin_pages) && !hasPermission('admin')) {
    redirectTo('?page=dashboard');
}
?>