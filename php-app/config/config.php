<?php
/**
 * Main Configuration File for JOKEBURG
 * File: /php-app/config/config.php
 */

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Database configuration
require_once 'database.php';

// Application settings
define('APP_NAME', 'JOKEBURG - Cobourg Community Success');
define('APP_VERSION', '1.0.0');
define('BASE_URL', 'http://localhost/JOKEBURG/php-app');

// Theme settings
$themes = [
    'default' => 'Default Blue',
    'dark' => 'Dark Mode',
    'green' => 'Nature Green',
    'purple' => 'Royal Purple',
    'orange' => 'Sunset Orange',
    'red' => 'Passion Red',
    'teal' => 'Ocean Teal',
    'pink' => 'Soft Pink',
    'yellow' => 'Sunshine Yellow',
    'gray' => 'Professional Gray'
];

// User roles
define('ROLE_CLIENT', 'client');
define('ROLE_ADMIN', 'admin');
define('ROLE_OUTREACH', 'outreach');
define('ROLE_PROVIDER', 'provider');

// Helper functions
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function getUserRole() {
    return $_SESSION['user_role'] ?? null;
}

function getCurrentTheme() {
    return $_SESSION['theme'] ?? 'default';
}

function redirect($url) {
    header("Location: $url");
    exit();
}

function sanitize($data) {
    return htmlspecialchars(trim($data));
}
?>