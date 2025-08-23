<?php
$page_title = "Responsive Test";
include 'includes/header.php';
include 'includes/navbar.php';
?>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <h1 class="h2 mb-4">Responsive UI Test Page</h1>
            
            <!-- Responsive Test Cards -->
            <div class="row g-3 mb-4">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Desktop/Mobile Test</h5>
                            <p class="card-text">
                                <span class="desktop-only text-success">✓ Desktop view detected</span>
                                <span class="mobile-only text-primary">📱 Mobile view detected</span>
                            </p>
                            <button class="btn btn-primary">Test Button</button>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Form Test</h5>
                            <form>
                                <div class="mb-3">
                                    <label for="testEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="testEmail" placeholder="test@example.com">
                                </div>
                                <div class="mb-3">
                                    <label for="testSelect" class="form-label">Select Option</label>
                                    <select class="form-select" id="testSelect">
                                        <option selected>Choose...</option>
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success w-100">Submit Test</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Navigation Test</h5>
                            <p class="card-text">Check that the navigation menu:</p>
                            <ul class="list-unstyled">
                                <li>✓ <span class="desktop-only">Shows full menu</span><span class="mobile-only">Collapses to hamburger</span></li>
                                <li>✓ Links are touch-friendly</li>
                                <li>✓ Brand logo is visible</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Responsive Table Test -->
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="card-title mb-0">Table Responsiveness Test</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Sarah Johnson</td>
                                    <td>Outreach Worker</td>
                                    <td>worker1@jokeburg.ca</td>
                                    <td>(905) 123-0002</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">Edit</button>
                                        <button class="btn btn-sm btn-outline-secondary">View</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Michael Chen</td>
                                    <td>Case Manager</td>
                                    <td>worker2@jokeburg.ca</td>
                                    <td>(905) 123-0003</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-primary">Edit</button>
                                        <button class="btn btn-sm btn-outline-secondary">View</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Breakpoint Information -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Current Breakpoint Information</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <p class="mb-2"><strong>Bootstrap 5 Breakpoints:</strong></p>
                            <ul class="list-unstyled">
                                <li class="d-block d-sm-none text-primary">📱 <strong>Extra Small (xs)</strong>: &lt; 576px - Current</li>
                                <li class="d-none d-sm-block d-md-none text-info">📱 <strong>Small (sm)</strong>: ≥ 576px - Current</li>
                                <li class="d-none d-md-block d-lg-none text-warning">📟 <strong>Medium (md)</strong>: ≥ 768px - Current</li>
                                <li class="d-none d-lg-block d-xl-none text-success">💻 <strong>Large (lg)</strong>: ≥ 992px - Current</li>
                                <li class="d-none d-xl-block text-primary">🖥️ <strong>Extra Large (xl)</strong>: ≥ 1200px - Current</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Test AJAX functionality
function testAjaxNotification() {
    showNotification('AJAX test successful! 🎉', 'success');
}

// Add test button for notifications
document.addEventListener('DOMContentLoaded', function() {
    const testButton = document.createElement('button');
    testButton.className = 'btn btn-info position-fixed';
    testButton.style.cssText = 'bottom: 20px; right: 20px; z-index: 1050;';
    testButton.innerHTML = '🧪 Test Notification';
    testButton.onclick = testAjaxNotification;
    document.body.appendChild(testButton);
});
</script>

<?php include 'includes/footer.php'; ?>