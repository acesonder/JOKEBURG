<?php
/**
 * Logout Handler for JOKEBURG
 * File: /php-app/auth/logout.php
 */

require_once '../config/config.php';

// Clear session
session_destroy();

// Clear remember me cookie
if (isset($_COOKIE['remember_token'])) {
    setcookie('remember_token', '', time() - 3600, '/');
}

// Redirect to login page
redirect(BASE_URL . '/auth/login.php');
?>