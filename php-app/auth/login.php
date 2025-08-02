<?php
/**
 * Login Page for JOKEBURG
 * File: /php-app/auth/login.php
 */

require_once '../config/config.php';

// Redirect if already logged in
if (isLoggedIn()) {
    redirect(BASE_URL . '/pages/dashboard.php');
}

$error_message = '';
$success_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = sanitize($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);
    
    if (empty($email) || empty($password)) {
        $error_message = 'Please enter both email and password.';
    } else {
        try {
            $database = new Database();
            $conn = $database->getConnection();
            
            $stmt = $conn->prepare("
                SELECT id, email, password_hash, role, first_name, last_name, is_active 
                FROM users 
                WHERE email = ? AND is_active = 1
            ");
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($user && password_verify($password, $user['password_hash'])) {
                // Update last login
                $update_stmt = $conn->prepare("UPDATE users SET last_login = NOW() WHERE id = ?");
                $update_stmt->execute([$user['id']]);
                
                // Set session variables
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_role'] = $user['role'];
                $_SESSION['user_name'] = $user['first_name'] . ' ' . $user['last_name'];
                
                // Set remember me cookie if requested
                if ($remember) {
                    $remember_token = bin2hex(random_bytes(32));
                    setcookie('remember_token', $remember_token, time() + (30 * 24 * 60 * 60), '/');
                    
                    // Store token in database
                    $token_stmt = $conn->prepare("
                        INSERT INTO remember_tokens (user_id, token, expires_at) 
                        VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 30 DAY))
                    ");
                    $token_stmt->execute([$user['id'], hash('sha256', $remember_token)]);
                }
                
                redirect(BASE_URL . '/pages/dashboard.php');
            } else {
                $error_message = 'Invalid email or password.';
            }
        } catch (Exception $e) {
            $error_message = 'An error occurred. Please try again.';
        }
    }
}

$page_title = 'Login - ' . APP_NAME;
include '../includes/header.php';
?>

<div class="container-fluid vh-100">
    <div class="row h-100">
        <!-- Left Panel - Login Form -->
        <div class="col-lg-6 d-flex align-items-center justify-content-center bg-light">
            <div class="card shadow-lg border-0" style="width: 100%; max-width: 400px;">
                <div class="card-header bg-gradient-primary text-white text-center py-4">
                    <i class="fas fa-heart fa-2x text-danger mb-2"></i>
                    <h4 class="mb-0">Welcome Back</h4>
                    <small>Sign in to JOKEBURG</small>
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
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="fas fa-envelope me-1"></i>Email Address
                            </label>
                            <input type="email" class="form-control" id="email" name="email" 
                                   value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
                            <div class="invalid-feedback">
                                Please provide a valid email address.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                <i class="fas fa-lock me-1"></i>Password
                            </label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" required>
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePassword()">
                                    <i class="fas fa-eye" id="toggleIcon"></i>
                                </button>
                            </div>
                            <div class="invalid-feedback">
                                Please provide your password.
                            </div>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">
                                Remember me for 30 days
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mb-3">
                            <i class="fas fa-sign-in-alt me-2"></i>Sign In
                        </button>

                        <div class="text-center">
                            <a href="forgot-password.php" class="text-decoration-none">
                                <i class="fas fa-key me-1"></i>Forgot your password?
                            </a>
                        </div>
                    </form>

                    <hr class="my-4">

                    <!-- Demo Account Buttons -->
                    <div class="text-center">
                        <h6 class="mb-3">Try Demo Accounts</h6>
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary btn-sm" data-demo-role="admin">
                                <i class="fas fa-user-shield me-1"></i>Admin Demo
                            </button>
                            <button class="btn btn-outline-info btn-sm" data-demo-role="provider">
                                <i class="fas fa-user-md me-1"></i>Provider Demo
                            </button>
                            <button class="btn btn-outline-warning btn-sm" data-demo-role="client">
                                <i class="fas fa-user me-1"></i>Client Demo
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center bg-light">
                    <small class="text-muted">
                        Don't have an account? 
                        <a href="register.php" class="text-primary text-decoration-none">
                            <strong>Register here</strong>
                        </a>
                    </small>
                </div>
            </div>
        </div>

        <!-- Right Panel - Hero Content -->
        <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center position-relative"
             style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            <div class="text-center text-white px-5">
                <div data-aos="fade-up">
                    <i class="fas fa-heart fa-4x text-danger mb-4 pulse"></i>
                    <h2 class="mb-4">Join Our Team.<br>Empower Your Journey.</h2>
                    <p class="lead mb-4">
                        Connect with Cobourg's comprehensive support network for 
                        mental health, housing, and community wellness.
                    </p>
                    <div class="row text-center mt-5">
                        <div class="col-4">
                            <div class="counter" data-target="500">0</div>
                            <small>Clients Served</small>
                        </div>
                        <div class="col-4">
                            <div class="counter" data-target="50">0</div>
                            <small>Service Providers</small>
                        </div>
                        <div class="col-4">
                            <div class="counter" data-target="95">0</div>
                            <small>% Success Rate</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Demo Modal -->
<div class="modal fade" id="demoModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="#" class="btn btn-primary" id="loginDemoBtn">Login with Demo Account</a>
            </div>
        </div>
    </div>
</div>

<script>
function togglePassword() {
    const password = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');
    
    if (password.type === 'password') {
        password.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
    } else {
        password.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
    }
}

// Auto-fill demo credentials when demo buttons are clicked
document.addEventListener('DOMContentLoaded', function() {
    const demoCredentials = {
        'admin': { email: 'admin@jokeburg.demo', password: 'AdminDemo123' },
        'provider': { email: 'provider@jokeburg.demo', password: 'ProviderDemo123' },
        'client': { email: 'client@jokeburg.demo', password: 'ClientDemo123' }
    };
    
    document.querySelectorAll('[data-demo-role]').forEach(button => {
        button.addEventListener('click', function() {
            const role = this.getAttribute('data-demo-role');
            document.getElementById('email').value = demoCredentials[role].email;
            document.getElementById('password').value = demoCredentials[role].password;
        });
    });
});
</script>

<?php include '../includes/footer.php'; ?>