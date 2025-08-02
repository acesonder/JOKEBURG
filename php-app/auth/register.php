<?php
/**
 * Registration Page for JOKEBURG
 * File: /php-app/auth/register.php
 */

require_once '../config/config.php';

// Redirect if already logged in
if (isLoggedIn()) {
    redirect(BASE_URL . '/pages/dashboard.php');
}

$error_message = '';
$success_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = sanitize($_POST['first_name'] ?? '');
    $last_name = sanitize($_POST['last_name'] ?? '');
    $email = sanitize($_POST['email'] ?? '');
    $phone = sanitize($_POST['phone'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $role = sanitize($_POST['role'] ?? ROLE_CLIENT);
    $terms = isset($_POST['terms']);
    
    // Validation
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
        $error_message = 'Please fill in all required fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = 'Please enter a valid email address.';
    } elseif (strlen($password) < 8) {
        $error_message = 'Password must be at least 8 characters long.';
    } elseif ($password !== $confirm_password) {
        $error_message = 'Passwords do not match.';
    } elseif (!$terms) {
        $error_message = 'Please accept the terms and conditions.';
    } else {
        try {
            $database = new Database();
            $conn = $database->getConnection();
            
            // Check if email already exists
            $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->execute([$email]);
            
            if ($stmt->fetch()) {
                $error_message = 'An account with this email already exists.';
            } else {
                // Create new user
                $password_hash = password_hash($password, PASSWORD_DEFAULT);
                
                $stmt = $conn->prepare("
                    INSERT INTO users (email, password_hash, role, first_name, last_name, phone, created_at) 
                    VALUES (?, ?, ?, ?, ?, ?, NOW())
                ");
                
                if ($stmt->execute([$email, $password_hash, $role, $first_name, $last_name, $phone])) {
                    $user_id = $conn->lastInsertId();
                    
                    // If role is client, create client profile
                    if ($role === ROLE_CLIENT) {
                        $client_stmt = $conn->prepare("
                            INSERT INTO clients (user_id, created_at) 
                            VALUES (?, NOW())
                        ");
                        $client_stmt->execute([$user_id]);
                    }
                    
                    $success_message = 'Account created successfully! You can now log in.';
                } else {
                    $error_message = 'An error occurred while creating your account.';
                }
            }
        } catch (Exception $e) {
            $error_message = 'An error occurred. Please try again.';
        }
    }
}

$page_title = 'Register - ' . APP_NAME;
include '../includes/header.php';
?>

<div class="container-fluid vh-100">
    <div class="row h-100">
        <!-- Left Panel - Hero Content -->
        <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center position-relative"
             style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%);">
            <div class="text-center text-white px-5">
                <div data-aos="fade-up">
                    <i class="fas fa-users fa-4x mb-4 pulse"></i>
                    <h2 class="mb-4">Become Part of the Solution</h2>
                    <p class="lead mb-4">
                        Join Cobourg's community success network and help create 
                        positive change for our most vulnerable residents.
                    </p>
                    <div class="row text-center mt-5">
                        <div class="col-6">
                            <div class="counter" data-target="24">0</div>
                            <small>Hours Support</small>
                        </div>
                        <div class="col-6">
                            <div class="counter" data-target="100">0</div>
                            <small>% Confidential</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Panel - Registration Form -->
        <div class="col-lg-6 d-flex align-items-center justify-content-center bg-light">
            <div class="card shadow-lg border-0" style="width: 100%; max-width: 500px;">
                <div class="card-header bg-gradient-primary text-white text-center py-4">
                    <i class="fas fa-user-plus fa-2x mb-2"></i>
                    <h4 class="mb-0">Create Account</h4>
                    <small>Join the JOKEBURG community</small>
                </div>
                <div class="card-body p-4">
                    <?php if ($error_message): ?>
                        <div class="alert alert-danger" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            <?php echo $error_message; ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($success_message): ?>
                        <div class="alert alert-success" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            <?php echo $success_message; ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST" class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="first_name" class="form-label">
                                    <i class="fas fa-user me-1"></i>First Name *
                                </label>
                                <input type="text" class="form-control" id="first_name" name="first_name" 
                                       value="<?php echo htmlspecialchars($first_name ?? ''); ?>" required>
                                <div class="invalid-feedback">Please provide your first name.</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="last_name" class="form-label">
                                    <i class="fas fa-user me-1"></i>Last Name *
                                </label>
                                <input type="text" class="form-control" id="last_name" name="last_name" 
                                       value="<?php echo htmlspecialchars($last_name ?? ''); ?>" required>
                                <div class="invalid-feedback">Please provide your last name.</div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope me-1"></i>Email Address *
                            </label>
                            <input type="email" class="form-control" id="email" name="email" 
                                   value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
                            <div class="invalid-feedback">Please provide a valid email address.</div>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">
                                <i class="fas fa-phone me-1"></i>Phone Number
                            </label>
                            <input type="tel" class="form-control" id="phone" name="phone" 
                                   value="<?php echo htmlspecialchars($phone ?? ''); ?>">
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">
                                <i class="fas fa-user-tag me-1"></i>I am registering as a:
                            </label>
                            <select class="form-select" id="role" name="role" required>
                                <option value="<?php echo ROLE_CLIENT; ?>" <?php echo ($role ?? ROLE_CLIENT) === ROLE_CLIENT ? 'selected' : ''; ?>>
                                    Client (seeking support services)
                                </option>
                                <option value="<?php echo ROLE_PROVIDER; ?>" <?php echo ($role ?? '') === ROLE_PROVIDER ? 'selected' : ''; ?>>
                                    Service Provider
                                </option>
                                <option value="<?php echo ROLE_OUTREACH; ?>" <?php echo ($role ?? '') === ROLE_OUTREACH ? 'selected' : ''; ?>>
                                    Outreach Worker
                                </option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">
                                    <i class="fas fa-lock me-1"></i>Password *
                                </label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                <div class="invalid-feedback">Password must be at least 8 characters long.</div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="confirm_password" class="form-label">
                                    <i class="fas fa-lock me-1"></i>Confirm Password *
                                </label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                                <div class="invalid-feedback">Passwords must match.</div>
                            </div>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                            <label class="form-check-label" for="terms">
                                I agree to the <a href="#" class="text-primary">Terms and Conditions</a> 
                                and <a href="#" class="text-primary">Privacy Policy</a> *
                            </label>
                            <div class="invalid-feedback">You must agree to the terms and conditions.</div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mb-3">
                            <i class="fas fa-user-plus me-2"></i>Create Account
                        </button>
                    </form>
                </div>
                <div class="card-footer text-center bg-light">
                    <small class="text-muted">
                        Already have an account? 
                        <a href="login.php" class="text-primary text-decoration-none">
                            <strong>Sign in here</strong>
                        </a>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Password strength indicator
document.getElementById('password').addEventListener('input', function() {
    const password = this.value;
    const strengthBar = document.getElementById('strength-bar');
    let strength = 0;
    
    if (password.length >= 8) strength++;
    if (/[A-Z]/.test(password)) strength++;
    if (/[a-z]/.test(password)) strength++;
    if (/[0-9]/.test(password)) strength++;
    if (/[^A-Za-z0-9]/.test(password)) strength++;
    
    // Update UI based on strength (if strength bar exists)
});

// Confirm password validation
document.getElementById('confirm_password').addEventListener('input', function() {
    const password = document.getElementById('password').value;
    const confirmPassword = this.value;
    
    if (confirmPassword && password !== confirmPassword) {
        this.setCustomValidity('Passwords do not match');
    } else {
        this.setCustomValidity('');
    }
});
</script>

<?php include '../includes/footer.php'; ?>