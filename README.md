# JOKEBURG - Cobourg Community Success Platform

**PHP + MySQL Web Application for Community Case Management**

A comprehensive web application built with PHP and MySQL to support vulnerable individuals in the Cobourg community through case management, assessment tools, and resource coordination.

## Table of Contents

- [Prerequisites](#prerequisites)
- [Local Setup](#local-setup)
- [Database Setup](#database-setup)
- [Application Structure](#application-structure)
- [Demo Accounts](#demo-accounts)
- [AJAX Endpoints](#ajax-endpoints)
- [Error Logging & Troubleshooting](#error-logging--troubleshooting)
- [Security & Validation](#security--validation)
- [Responsive UI Testing](#responsive-ui-testing)
- [QA Checklist](#qa-checklist)

## Prerequisites

### Required Software

- **PHP 8.1+** with the following extensions:
  - PDO and PDO_MySQL
  - OpenSSL
  - mbstring
  - JSON
  - Session support
- **MySQL 8.0+** or MariaDB 10.4+
- **phpMyAdmin** (for database management)
- **Web Server** (Apache/Nginx) or PHP built-in server for development

### Check Your Installation

```bash
# Check PHP version and extensions
php -v
php -m | grep -E "(pdo|mysql|openssl|mbstring|json)"

# Check MySQL version
mysql --version
```

### Optional Tools

- **Composer** (if managing PHP dependencies)
- **Node.js & npm** (for frontend assets if needed)

## Local Setup

### 1. Clone the Repository

```bash
git clone https://github.com/acesonder/JOKEBURG.git
cd JOKEBURG
```

### 2. Configure Database Connection

Copy and edit the database configuration:

```bash
cd php-app/config
# Edit database.php with your local MySQL credentials
```

Update `php-app/config/database.php`:

```php
<?php
class Database {
    private $host = 'localhost';        // Your MySQL host
    private $db_name = 'jokeburg_db';   // Database name
    private $username = 'root';         // Your MySQL username
    private $password = '';             // Your MySQL password
    private $port = 3306;               // MySQL port (default: 3306)
    private $charset = 'utf8mb4';
    
    // ... rest of the file remains the same
}
?>
```

### 3. Set Base URL (Optional)

If not running from document root, update the base URL in `php-app/config/app.php`:

```php
$base_url = "http://localhost/JOKEBURG/php-app"; // Adjust as needed
```

### 4. Start Development Server

Using PHP built-in server (recommended for development):

```bash
cd php-app
php -S localhost:8000
```

Or configure your web server to point to the `php-app` directory.

## Database Setup

### 1. Create Database via phpMyAdmin

1. Open phpMyAdmin in your browser (usually `http://localhost/phpmyadmin`)
2. Login with your MySQL credentials
3. Click "New" to create a new database
4. Enter database name: `jokeburg_db`
5. Select collation: `utf8mb4_unicode_ci`
6. Click "Create"

### 2. Import Database Schema

1. Select the `jokeburg_db` database
2. Click the "Import" tab
3. Click "Choose File" and select `php-app/database/schema.sql`
4. Ensure format is set to "SQL"
5. Click "Import"

### 3. Import Demo Data

1. Still in the `jokeburg_db` database
2. Click "Import" tab again
3. Select `php-app/database/demo_data.sql`
4. Click "Import"

### 4. Verify Database Setup

Check that the following tables were created:
- `users` (user accounts and authentication)
- `clients` (client profiles and demographics)
- `resources` (community resources directory)
- `supply_items` (harm reduction supplies)
- `goals` (client goals and progress)
- `case_notes` (case management notes)

## Application Structure

```
php-app/
├── config/
│   ├── app.php          # Main application configuration
│   └── database.php     # Database connection settings
├── includes/
│   ├── header.php       # HTML head and navigation
│   ├── navbar.php       # Main navigation menu
│   └── footer.php       # Footer and scripts
├── views/
│   ├── auth/            # Login and registration pages
│   ├── dashboard/       # User dashboards
│   ├── resources/       # Resource directory
│   └── ...              # Other feature pages
├── assets/
│   ├── css/             # Stylesheets and themes
│   ├── js/              # JavaScript functionality
│   └── images/          # Static images
├── database/
│   ├── schema.sql       # Database structure
│   └── demo_data.sql    # Sample data for testing
└── index.php            # Main entry point and router
```

### Routing System

The application uses simple GET parameter routing:
- `?page=home` - Homepage
- `?page=login` - Login page
- `?page=dashboard` - User dashboard
- `?page=resources` - Resource directory

### Key Components

- **Authentication**: Session-based with role checking
- **Database**: PDO with prepared statements
- **Frontend**: Bootstrap 5 with custom themes
- **JavaScript**: Vanilla JS with AJAX functionality

## Demo Accounts

### Available Test Accounts

All demo accounts use the password: `password123`

| Role | Email | Description |
|------|-------|-------------|
| Admin | `admin@jokeburg.ca` | System administrator with full access |
| Outreach Worker | `worker1@jokeburg.ca` | Sarah Johnson - Field outreach worker |
| Outreach Worker | `worker2@jokeburg.ca` | Michael Chen - Case manager |
| Service Provider | `provider1@jokeburg.ca` | Dr. Emily Martinez - Healthcare provider |
| Client | `client1@example.ca` | Alex Thompson - Client with housing goals |
| Client | `client2@example.ca` | Jordan Williams - Client in temporary shelter |
| Client | `client3@example.ca` | Sam Brown - Client with stable housing |

### Password Reset Instructions

For demo purposes, passwords can be reset via phpMyAdmin:

1. Open phpMyAdmin and select `jokeburg_db`
2. Browse the `users` table
3. Find the user by email
4. Edit the `password_hash` field
5. Generate new hash: `password_hash('new_password', PASSWORD_DEFAULT)`
6. Or use demo hash: `$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi` (= "password123")

### Changing Default Passwords

To change passwords in production:
1. Use the application's profile settings (when implemented)
2. Or update via phpMyAdmin as described above
3. Always use `password_hash()` function for security

## AJAX Endpoints

The application uses JavaScript's `fetch()` API for AJAX requests. Main helper function in `assets/js/main.js`:

### AJAX Helper Function

```javascript
function makeRequest(url, options = {}) {
    const defaults = {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
        }
    };
    
    const config = { ...defaults, ...options };
    
    return fetch(url, config)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .catch(error => {
            console.error('Request failed:', error);
            showNotification('An error occurred. Please try again.', 'danger');
            throw error;
        });
}
```

### Current Endpoints (Available in Node.js backend)

| Method | Endpoint | Description | Parameters |
|--------|----------|-------------|------------|
| POST | `/api/auth/login` | User authentication | `email`, `password` |
| POST | `/api/auth/register` | User registration | `email`, `password`, `role` |
| GET | `/api/auth/me` | Get current user | - |
| GET | `/api/resources` | Get community resources | - |
| POST | `/api/resources` | Add new resource | Resource data |
| PUT | `/api/resources/:id` | Update resource | Resource data |

### Sample AJAX Request

```javascript
// Login example
makeRequest('/api/auth/login', {
    method: 'POST',
    body: JSON.stringify({
        email: 'admin@jokeburg.ca',
        password: 'password123'
    })
})
.then(data => {
    console.log('Login successful:', data);
    showNotification('Welcome back!', 'success');
})
.catch(error => {
    console.error('Login failed:', error);
});
```

### CSRF Protection

For production deployment:
- Implement CSRF tokens in forms
- Validate tokens on server-side
- Include token in AJAX headers

### Authentication Requirements

- Most endpoints require valid session
- Role-based access control enforced
- Session timeout after inactivity

## Error Logging & Troubleshooting

### Enable PHP Error Logging

#### 1. Configure php.ini

```ini
; Enable error logging
log_errors = On
error_log = /path/to/php-errors.log

; For development - display errors
display_errors = On
display_startup_errors = On

; For production - hide errors from users
display_errors = Off
display_startup_errors = Off
```

#### 2. Application-Level Logging

Add to `config/app.php`:

```php
// Enable error reporting for development
if ($_ENV['APP_ENV'] === 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

// Custom error handler
function logError($message, $context = []) {
    $log_message = date('Y-m-d H:i:s') . " - " . $message;
    if (!empty($context)) {
        $log_message .= " - Context: " . json_encode($context);
    }
    error_log($log_message);
}
```

### Database Error Handling

Example with try/catch:

```php
try {
    $database = new Database();
    $db = $database->getConnection();
    
    $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    
} catch(PDOException $e) {
    logError("Database error: " . $e->getMessage());
    showAlert("Database connection failed. Please try again later.", "danger");
}
```

### Common Issues & Fixes

#### 1. Database Connection Failed

**Symptoms**: "Connection error" on page load
**Solutions**:
- Check MySQL service is running: `sudo service mysql start`
- Verify credentials in `config/database.php`
- Ensure database `jokeburg_db` exists
- Check PHP MySQL extension: `php -m | grep mysql`

#### 2. Permission Denied Errors

**Symptoms**: 403 errors, file access issues
**Solutions**:
```bash
# Set proper permissions
chmod 755 php-app/
chmod 644 php-app/*.php
chmod 755 php-app/assets/
```

#### 3. Session Issues

**Symptoms**: Login doesn't persist, frequent logouts
**Solutions**:
- Check session directory permissions
- Verify session settings in php.ini
- Clear browser cookies and cache

#### 4. CORS Errors (if using separate frontend)

**Symptoms**: "CORS policy" errors in console
**Solutions**:
```php
// Add to header of API endpoints
header("Access-Control-Allow-Origin: http://localhost:3000");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
```

### Sample Error Log Entry

```
2024-01-15 14:30:25 - Database error: SQLSTATE[42S02]: Base table or view not found: 1146 Table 'jokeburg_db.users' doesn't exist
2024-01-15 14:30:25 - Context: {"page": "login", "user_ip": "127.0.0.1"}
```

## Security & Validation

### Input Validation & Sanitization

#### Form Validation Example

```php
function validateEmail($email) {
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function sanitizeInput($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

// Usage
$email = validateEmail($_POST['email']);
$name = sanitizeInput($_POST['name']);
```

#### JavaScript Validation

```javascript
function validateForm(form) {
    const email = form.querySelector('#email').value;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
    if (!emailRegex.test(email)) {
        showNotification('Please enter a valid email address', 'danger');
        return false;
    }
    
    return true;
}
```

### Database Security

#### Prepared Statements (Already Implemented)

```php
// Secure - using prepared statements
$stmt = $db->prepare("SELECT * FROM users WHERE email = ? AND role = ?");
$stmt->execute([$email, $role]);

// NEVER do this - SQL injection vulnerable
$query = "SELECT * FROM users WHERE email = '$email'";
```

### Session Security

#### Current Implementation

```php
// In config/app.php
session_start();

// Session timeout (30 minutes)
if (isset($_SESSION['last_activity']) && 
    (time() - $_SESSION['last_activity'] > 1800)) {
    session_unset();
    session_destroy();
    redirectTo('?page=login');
}
$_SESSION['last_activity'] = time();
```

### Password Security

```php
// Hash passwords (already implemented in demo_data.sql)
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Verify passwords
if (password_verify($password, $stored_hash)) {
    // Password is correct
}
```

## Responsive UI Testing

### Supported Breakpoints

The application uses Bootstrap 5 responsive grid system:

- **Extra Small (xs)**: < 576px (Mobile phones)
- **Small (sm)**: ≥ 576px (Large phones)
- **Medium (md)**: ≥ 768px (Tablets)
- **Large (lg)**: ≥ 992px (Desktops)
- **Extra Large (xl)**: ≥ 1200px (Large desktops)

### Testing Procedure

#### 1. Browser Developer Tools

```javascript
// Test different screen sizes
// Chrome DevTools -> Toggle device toolbar (Ctrl+Shift+M)
```

Recommended test devices:
- iPhone 12 Pro (390 × 844)
- iPad (768 × 1024)
- Desktop (1920 × 1080)

#### 2. Manual Testing Checklist

**Mobile (≤ 576px)**:
- [ ] Navigation collapses to hamburger menu
- [ ] Forms stack vertically
- [ ] Tables become horizontally scrollable
- [ ] Buttons are finger-friendly (min 44px)
- [ ] Text remains readable (min 16px)

**Tablet (768px - 991px)**:
- [ ] Two-column layouts work properly
- [ ] Cards arrange in responsive grid
- [ ] Sidebar collapses appropriately

**Desktop (≥ 992px)**:
- [ ] Full navigation menu visible
- [ ] Multi-column layouts display correctly
- [ ] Hover effects work properly

### CSS Utilities Used

```css
/* Responsive utilities in main.css */
.mobile-only { display: block; }
.desktop-only { display: none; }

@media (min-width: 768px) {
    .mobile-only { display: none; }
    .desktop-only { display: block; }
}
```

### Testing Tools

- **Browser DevTools**: Built-in responsive testing
- **BrowserStack**: Cross-browser testing (optional)
- **Responsive Design Mode**: Firefox developer tools

## QA Checklist

### Pre-Deployment Testing

#### 1. Authentication & Authorization
- [ ] Login with admin account works
- [ ] Login with worker account works
- [ ] Login with client account works
- [ ] Invalid credentials are rejected
- [ ] Session timeout works correctly
- [ ] Role-based page access enforced
- [ ] Logout functionality works

#### 2. Database Operations
- [ ] Database connection successful
- [ ] All demo data imported correctly
- [ ] User data displays properly
- [ ] No SQL errors in logs

#### 3. AJAX Functionality
- [ ] Notifications display correctly
- [ ] Error handling works for failed requests
- [ ] Loading states show appropriately
- [ ] Forms submit without page refresh

#### 4. Responsive Design
- [ ] Mobile navigation works (hamburger menu)
- [ ] Forms are usable on mobile devices
- [ ] Tables are readable on small screens
- [ ] Images scale appropriately
- [ ] Text remains readable at all sizes

#### 5. Error Handling
- [ ] 404 page displays for invalid routes
- [ ] Database errors show user-friendly messages
- [ ] PHP errors are logged (not displayed to users)
- [ ] JavaScript errors don't break the page

#### 6. Security
- [ ] Passwords are hashed in database
- [ ] Sessions expire after timeout
- [ ] Input is sanitized and validated
- [ ] SQL injection protection works
- [ ] XSS protection in place

### Manual Testing Script

```bash
# 1. Fresh installation test
cd /tmp
git clone https://github.com/acesonder/JOKEBURG.git
cd JOKEBURG/php-app

# 2. Database setup test
# - Import schema.sql via phpMyAdmin
# - Import demo_data.sql via phpMyAdmin

# 3. Application test
php -S localhost:8000

# 4. Open browser and test:
# - http://localhost:8000
# - Login with admin@jokeburg.ca / password123
# - Navigate through all major pages
# - Test mobile view (DevTools responsive mode)
# - Check browser console for errors
```

### Verification Checklist

- [ ] **README instructions are accurate and complete**
- [ ] **All code blocks are copy-paste runnable**
- [ ] **Demo accounts work as documented**
- [ ] **Database imports successfully via phpMyAdmin**
- [ ] **Application runs without external dependencies**
- [ ] **Error logging is configured and working**
- [ ] **Responsive design verified on multiple screen sizes**
- [ ] **AJAX features work without errors**
- [ ] **Security measures are properly implemented**

---

## Support & Contributing

For issues or contributions, please:
1. Check the troubleshooting section above
2. Review error logs for specific issues
3. Submit detailed bug reports with:
   - PHP version
   - MySQL version
   - Browser and version
   - Steps to reproduce
   - Error messages or logs

---

**JOKEBURG** - Cobourg Community Success Platform  
*Empowering our community through technology and compassion*