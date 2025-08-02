<?php
/**
 * Header Include File for JOKEBURG
 * File: /php-app/includes/header.php
 */
require_once dirname(__DIR__) . '/config/config.php';
?>
<!DOCTYPE html>
<html lang="en" data-theme="<?php echo getCurrentTheme(); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? APP_NAME; ?></title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    
    <!-- Custom Theme CSS -->
    <link href="<?php echo BASE_URL; ?>/assets/css/main.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>/assets/themes/<?php echo getCurrentTheme(); ?>.css" rel="stylesheet">
    
    <!-- Animation Libraries -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <meta name="description" content="JOKEBURG - Cobourg Community Success Web Application for comprehensive case management">
    <meta name="keywords" content="cobourg, community, homelessness, mental health, case management">
</head>
<body class="theme-<?php echo getCurrentTheme(); ?>">
    
    <!-- Loading Overlay -->
    <div id="loading-overlay" class="loading-overlay">
        <div class="loading-spinner">
            <i class="fas fa-heart fa-beat"></i>
            <p>Loading JOKEBURG...</p>
        </div>
    </div>