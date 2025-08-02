<?php
/**
 * Forgot Password Page for JOKEBURG
 * File: /php-app/auth/forgot-password.php
 */

require_once '../config/config.php';

// Redirect if already logged in
if (isLoggedIn()) {
    redirect(BASE_URL . '/pages/dashboard.php');
}

$message = '';
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = sanitize($_POST['email'] ?? '');
    
    if (empty($email)) {
        $message = 'Please enter your email address.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = 'Please enter a valid email address.';
    } else {
        // In a real application, you would:
        // 1. Check if email exists in database
        // 2. Generate a secure reset token
        // 3. Send password reset email
        // 4. Store token with expiration time
        
        $success = true;
        $message = 'If an account with that email exists, you will receive password reset instructions shortly.';
    }
}

$page_title = 'Forgot Password - ' . APP_NAME;
include '../includes/header.php';
?>

<div class="container-fluid vh-100">
    <div class="row h-100">
        <!-- Left Panel - Hero Content -->
        <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center position-relative"
             style="background: linear-gradient(135deg, #6f42c1 0%, #e83e8c 100%);">
            <div class="text-center text-white px-5">
                <div data-aos="fade-up">
                    <i class="fas fa-key fa-4x mb-4 pulse"></i>
                    <h2 class="mb-4">Reset Your Password</h2>
                    <p class="lead mb-4">
                        Don't worry, it happens to the best of us. 
                        Enter your email and we'll help you get back on track.
                    </p>
                </div>
            </div>
        </div>

        <!-- Right Panel - Reset Form -->
        <div class="col-lg-6 d-flex align-items-center justify-content-center bg-light">
            <div class="card shadow-lg border-0" style="width: 100%; max-width: 400px;">
                <div class="card-header bg-gradient-primary text-white text-center py-4">
                    <i class="fas fa-key fa-2x mb-2"></i>
                    <h4 class="mb-0">Password Reset</h4>
                    <small>Recover your JOKEBURG account</small>
                </div>
                <div class="card-body p-4">
                    <?php if ($message): ?>
                        <div class="alert alert-<?php echo $success ? 'success' : 'danger'; ?>" role="alert">
                            <i class="fas fa-<?php echo $success ? 'check-circle' : 'exclamation-triangle'; ?> me-2"></i>
                            <?php echo $message; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!$success): ?>
                        <form method="POST" class="needs-validation" novalidate>
                            <div class="mb-4">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope me-1"></i>Email Address
                                </label>
                                <input type="email" class="form-control" id="email" name="email" 
                                       value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
                                <div class="invalid-feedback">
                                    Please provide a valid email address.
                                </div>
                                <small class="form-text text-muted">
                                    Enter the email address associated with your account.
                                </small>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mb-3">
                                <i class="fas fa-paper-plane me-2"></i>Send Reset Instructions
                            </button>
                        </form>
                    <?php else: ?>
                        <div class="text-center">
                            <i class="fas fa-envelope-open-text fa-3x text-success mb-3"></i>
                            <h5>Check Your Email</h5>
                            <p class="text-muted">
                                If an account exists with the provided email, 
                                you'll receive reset instructions within a few minutes.
                            </p>
                        </div>
                    <?php endif; ?>

                    <hr class="my-4">

                    <div class="text-center">
                        <p class="mb-2">
                            <i class="fas fa-lightbulb me-1 text-warning"></i>
                            <strong>Remember your password?</strong>
                        </p>
                        <a href="login.php" class="btn btn-outline-primary">
                            <i class="fas fa-sign-in-alt me-2"></i>Back to Login
                        </a>
                    </div>
                </div>
                <div class="card-footer text-center bg-light">
                    <small class="text-muted">
                        Need help? Contact us at 
                        <a href="mailto:support@jokeburg.org" class="text-primary text-decoration-none">
                            support@jokeburg.org
                        </a>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>