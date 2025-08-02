<!DOCTYPE html>
<html lang="en" class="<?php echo $current_theme; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="JOKEBURG - Cobourg Community Success Platform. Supporting vulnerable individuals through comprehensive case management, assessment tools, and community resources.">
    <meta name="keywords" content="cobourg, community support, mental health, addiction, homelessness, case management">
    <meta name="author" content="JOKEBURG Team">
    
    <title><?php echo isset($page_title) ? $page_title . ' - ' . $site_name : $site_name . ' - ' . $site_tagline; ?></title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <!-- Animate.css for animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    
    <!-- AOS (Animate On Scroll) -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/themes.css">
    <link rel="stylesheet" href="assets/css/animations.css">
    
    <!-- Theme-specific CSS -->
    <link rel="stylesheet" href="themes/<?php echo str_replace('theme-', '', $current_theme); ?>/style.css">
    
    <!-- Progressive Web App -->
    <link rel="manifest" href="manifest.json">
    <meta name="theme-color" content="#0066cc">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $base_url; ?>">
    <meta property="og:title" content="<?php echo $site_name; ?> - <?php echo $site_tagline; ?>">
    <meta property="og:description" content="Supporting Cobourg's community through comprehensive case management and integrated support services.">
    <meta property="og:image" content="<?php echo $base_url; ?>/assets/images/og-image.jpg">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="<?php echo $base_url; ?>">
    <meta property="twitter:title" content="<?php echo $site_name; ?> - <?php echo $site_tagline; ?>">
    <meta property="twitter:description" content="Supporting Cobourg's community through comprehensive case management and integrated support services.">
    <meta property="twitter:image" content="<?php echo $base_url; ?>/assets/images/og-image.jpg">
</head>
<body class="<?php echo $current_theme; ?> <?php echo isLoggedIn() ? 'authenticated' : 'guest'; ?>">
    
    <!-- Loading Spinner -->
    <div id="loading-spinner" class="loading-spinner">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    
    <!-- Skip to Content Link -->
    <a class="skip-to-content" href="#main-content">Skip to main content</a>
    
    <!-- Alert Container -->
    <div id="alert-container" class="position-fixed top-0 start-50 translate-middle-x" style="z-index: 9999; margin-top: 20px;">
        <?php $alert = getAlert(); if($alert): ?>
        <div class="alert alert-<?php echo $alert['type']; ?> alert-dismissible fade show animate__animated animate__fadeInDown" role="alert">
            <i class="bi bi-<?php echo $alert['type'] == 'danger' ? 'exclamation-triangle' : ($alert['type'] == 'success' ? 'check-circle' : 'info-circle'); ?>"></i>
            <?php echo sanitizeOutput($alert['message']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
    </div>