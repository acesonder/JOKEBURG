<?php
$page_title = "Community Resources";

// Sample resources data (would normally come from database)
$resources = [
    [
        'id' => 1,
        'name' => 'Transition House Emergency Shelter',
        'description' => 'Emergency shelter services, meals, and support for individuals experiencing homelessness in Cobourg',
        'category' => 'shelter',
        'phone' => '(905) 377-0378',
        'website' => 'https://transitionhouse.ca',
        'email' => 'info@transitionhouse.ca',
        'address' => '123 Victoria St, Cobourg, ON K9A 2G9',
        'hours' => 'Mon-Sun: 24 hours',
        'services' => ['Emergency shelter', 'Meals', 'Case management', 'Referrals'],
        'featured' => true
    ],
    [
        'id' => 2,
        'name' => 'Northumberland Hills Hospital Community Mental Health',
        'description' => 'Mental health counseling and addiction support services',
        'category' => 'mental-health',
        'phone' => '(905) 377-9891',
        'website' => 'https://nhh.ca',
        'email' => 'mentalhealth@nhh.ca',
        'address' => '1000 DePalma Dr, Cobourg, ON K9A 5W6',
        'hours' => 'Mon-Fri: 8:30 AM - 4:30 PM',
        'services' => ['Individual counseling', 'Group therapy', 'Crisis intervention', 'Psychiatric services'],
        'featured' => true
    ],
    [
        'id' => 3,
        'name' => 'Fourcast Addiction Services',
        'description' => 'Comprehensive addiction treatment and recovery support',
        'category' => 'addiction',
        'phone' => '(905) 377-9111',
        'website' => 'https://fourcast.ca',
        'email' => 'help@fourcast.ca',
        'address' => '200 Strathy Rd, Cobourg, ON K9A 0A2',
        'hours' => 'Mon-Fri: 9:00 AM - 5:00 PM',
        'services' => ['Counseling', 'Detox support', 'Methadone program', 'Peer support'],
        'featured' => false
    ],
    [
        'id' => 4,
        'name' => 'Salvation Army Cobourg',
        'description' => 'Food bank, emergency supplies, and community support programs',
        'category' => 'food-assistance',
        'phone' => '(905) 373-9440',
        'website' => 'https://salvationarmy.ca',
        'email' => 'cobourg@salvationarmy.ca',
        'address' => '16 Spring St, Cobourg, ON K9A 1Z9',
        'hours' => 'Mon-Fri: 9:00 AM - 4:00 PM',
        'services' => ['Food bank', 'Emergency supplies', 'Utility assistance', 'Community programs'],
        'featured' => false
    ],
    [
        'id' => 5,
        'name' => 'Green Wood Coalition',
        'description' => 'Street outreach, harm reduction, and peer support services',
        'category' => 'outreach',
        'phone' => '(905) 885-8700',
        'website' => 'https://greenwoodcoalition.com',
        'email' => 'outreach@greenwoodcoalition.com',
        'address' => 'Mobile services throughout Cobourg',
        'hours' => 'Mon-Sun: Variable hours',
        'services' => ['Harm reduction supplies', 'Peer support', 'Mobile outreach', 'Crisis support'],
        'featured' => true
    ]
];

$categories = [
    'shelter' => ['name' => 'Shelter & Housing', 'icon' => 'house-door', 'color' => 'primary'],
    'mental-health' => ['name' => 'Mental Health', 'icon' => 'heart', 'color' => 'success'],
    'addiction' => ['name' => 'Addiction Support', 'icon' => 'shield-check', 'color' => 'warning'],
    'food-assistance' => ['name' => 'Food Assistance', 'icon' => 'gift', 'color' => 'info'],
    'outreach' => ['name' => 'Outreach Services', 'icon' => 'people', 'color' => 'danger'],
    'healthcare' => ['name' => 'Healthcare', 'icon' => 'hospital', 'color' => 'secondary']
];
?>

<div class="container-fluid px-4">
    <!-- Hero Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card bg-gradient text-white border-0 shadow-lg" style="background: linear-gradient(135deg, var(--success-color) 0%, #1e7e34 100%);" data-aos="fade-down">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <h1 class="h2 fw-bold mb-2">
                                <i class="bi bi-bookmark-star me-3"></i>Community Resources
                            </h1>
                            <p class="mb-3 opacity-90">
                                Discover comprehensive support services available in Cobourg. Find the right help for housing, 
                                mental health, addiction, food assistance, and more.
                            </p>
                            <div class="d-flex gap-2">
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#addResourceModal">
                                    <i class="bi bi-plus-circle me-1"></i>Add Resource
                                </button>
                                <button class="btn btn-outline-light btn-sm" data-bs-toggle="modal" data-bs-target="#resourceMapModal">
                                    <i class="bi bi-geo-alt me-1"></i>View Map
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-4 text-end d-none d-lg-block">
                            <div class="position-relative">
                                <i class="bi bi-bookmark-star display-1 animate-float opacity-25"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow" data-aos="fade-up">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <h5 class="fw-bold mb-3">Filter Resources</h5>
                            <div class="d-flex flex-wrap gap-2" id="categoryFilters">
                                <button class="btn btn-outline-primary active" data-category="all">
                                    <i class="bi bi-grid me-1"></i>All Services
                                </button>
                                <?php foreach($categories as $key => $cat): ?>
                                <button class="btn btn-outline-<?php echo $cat['color']; ?>" data-category="<?php echo $key; ?>">
                                    <i class="bi bi-<?php echo $cat['icon']; ?> me-1"></i><?php echo $cat['name']; ?>
                                </button>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search resources..." id="searchInput">
                                <button class="btn btn-primary" type="button">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Resources -->
    <div class="row mb-4">
        <div class="col-12">
            <h4 class="fw-bold mb-3" data-aos="fade-up">
                <i class="bi bi-star-fill text-warning me-2"></i>Featured Resources
            </h4>
        </div>
        <?php foreach($resources as $index => $resource): ?>
            <?php if($resource['featured']): ?>
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="<?php echo $index * 100; ?>">
                <div class="card border-0 shadow-lg h-100 card-hover-lift resource-card" data-category="<?php echo $resource['category']; ?>">
                    <div class="card-header bg-<?php echo $categories[$resource['category']]['color']; ?> text-white">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-<?php echo $categories[$resource['category']]['icon']; ?> fs-4 me-2"></i>
                            <span class="badge bg-white bg-opacity-25">Featured</span>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-2"><?php echo sanitizeOutput($resource['name']); ?></h5>
                        <p class="text-muted mb-3"><?php echo sanitizeOutput($resource['description']); ?></p>
                        
                        <div class="mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-telephone text-primary me-2"></i>
                                <a href="tel:<?php echo $resource['phone']; ?>" class="text-decoration-none">
                                    <?php echo sanitizeOutput($resource['phone']); ?>
                                </a>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-clock text-info me-2"></i>
                                <small class="text-muted"><?php echo sanitizeOutput($resource['hours']); ?></small>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <?php foreach(array_slice($resource['services'], 0, 3) as $service): ?>
                            <span class="badge bg-light text-dark me-1 mb-1"><?php echo sanitizeOutput($service); ?></span>
                            <?php endforeach; ?>
                            <?php if(count($resource['services']) > 3): ?>
                            <span class="badge bg-secondary">+<?php echo count($resource['services']) - 3; ?> more</span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-footer bg-light border-0">
                        <div class="d-flex gap-2">
                            <button class="btn btn-primary btn-sm flex-fill" 
                                    onclick="showResourceDetails(<?php echo htmlspecialchars(json_encode($resource)); ?>)">
                                <i class="bi bi-eye me-1"></i>View Details
                            </button>
                            <button class="btn btn-outline-primary btn-sm" 
                                    onclick="shareResource(<?php echo $resource['id']; ?>)">
                                <i class="bi bi-share"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <!-- All Resources -->
    <div class="row">
        <div class="col-12">
            <h4 class="fw-bold mb-3" data-aos="fade-up">
                <i class="bi bi-list-ul text-primary me-2"></i>All Resources
            </h4>
        </div>
        
        <div class="col-12" data-aos="fade-up">
            <div class="card border-0 shadow">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th>Resource</th>
                                    <th>Category</th>
                                    <th>Contact</th>
                                    <th>Hours</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="resourcesTable">
                                <?php foreach($resources as $resource): ?>
                                <tr class="resource-row" data-category="<?php echo $resource['category']; ?>">
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-<?php echo $categories[$resource['category']]['color']; ?> bg-opacity-10 rounded p-2 me-3">
                                                <i class="bi bi-<?php echo $categories[$resource['category']]['icon']; ?> text-<?php echo $categories[$resource['category']]['color']; ?>"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-1"><?php echo sanitizeOutput($resource['name']); ?></h6>
                                                <small class="text-muted"><?php echo sanitizeOutput(substr($resource['description'], 0, 80)); ?>...</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-<?php echo $categories[$resource['category']]['color']; ?>">
                                            <?php echo $categories[$resource['category']]['name']; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div>
                                            <a href="tel:<?php echo $resource['phone']; ?>" class="text-decoration-none d-block">
                                                <i class="bi bi-telephone me-1"></i><?php echo sanitizeOutput($resource['phone']); ?>
                                            </a>
                                            <a href="mailto:<?php echo $resource['email']; ?>" class="text-decoration-none small text-muted">
                                                <i class="bi bi-envelope me-1"></i><?php echo sanitizeOutput($resource['email']); ?>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <small class="text-muted"><?php echo sanitizeOutput($resource['hours']); ?></small>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <button class="btn btn-outline-primary" 
                                                    onclick="showResourceDetails(<?php echo htmlspecialchars(json_encode($resource)); ?>)">
                                                <i class="bi bi-eye"></i>
                                            </button>
                                            <button class="btn btn-outline-secondary" 
                                                    onclick="shareResource(<?php echo $resource['id']; ?>)">
                                                <i class="bi bi-share"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Resource Details Modal -->
<div class="modal fade modal-zoom" id="resourceDetailsModal" tabindex="-1" aria-labelledby="resourceDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resourceDetailsModalLabel">
                    <i class="bi bi-bookmark-star me-2"></i>Resource Details
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="resourceDetailsContent">
                <!-- Content will be populated by JavaScript -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="contactResourceBtn">
                    <i class="bi bi-telephone me-2"></i>Contact Resource
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Resource Map Modal -->
<div class="modal fade modal-slide-up" id="resourceMapModal" tabindex="-1" aria-labelledby="resourceMapModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resourceMapModalLabel">
                    <i class="bi bi-geo-alt me-2"></i>Resource Map
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div id="resourceMap" style="height: 500px; background: #f8f9fa; display: flex; align-items: center; justify-content: center;">
                    <div class="text-center">
                        <i class="bi bi-geo-alt display-1 text-muted mb-3"></i>
                        <h4 class="text-muted">Interactive Map</h4>
                        <p class="text-muted">Map integration would be implemented here with services like Google Maps or OpenStreetMap</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Filter functionality
    const filterButtons = document.querySelectorAll('#categoryFilters button');
    const resourceCards = document.querySelectorAll('.resource-card');
    const resourceRows = document.querySelectorAll('.resource-row');
    const searchInput = document.getElementById('searchInput');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            const category = this.dataset.category;
            filterResources(category);
        });
    });
    
    // Search functionality
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        
        resourceCards.forEach(card => {
            const text = card.textContent.toLowerCase();
            card.style.display = text.includes(searchTerm) ? 'block' : 'none';
        });
        
        resourceRows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchTerm) ? 'table-row' : 'none';
        });
    });
    
    function filterResources(category) {
        resourceCards.forEach(card => {
            if (category === 'all' || card.dataset.category === category) {
                card.style.display = 'block';
                animateElement(card, 'animate-fade-in-up');
            } else {
                card.style.display = 'none';
            }
        });
        
        resourceRows.forEach(row => {
            if (category === 'all' || row.dataset.category === category) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });
    }
});

function showResourceDetails(resource) {
    const modal = new bootstrap.Modal(document.getElementById('resourceDetailsModal'));
    const content = document.getElementById('resourceDetailsContent');
    const contactBtn = document.getElementById('contactResourceBtn');
    
    // Populate modal content
    content.innerHTML = `
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-primary bg-opacity-10 rounded p-3 me-3">
                        <i class="bi bi-bookmark-star fs-3 text-primary"></i>
                    </div>
                    <div>
                        <h4 class="fw-bold mb-1">${resource.name}</h4>
                        <span class="badge bg-primary">${resource.category.replace('-', ' ').toUpperCase()}</span>
                    </div>
                </div>
                
                <p class="lead text-muted mb-4">${resource.description}</p>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <h6 class="fw-bold mb-3">Contact Information</h6>
                        <div class="contact-info">
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-telephone text-primary me-3"></i>
                                <a href="tel:${resource.phone}" class="text-decoration-none">${resource.phone}</a>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-envelope text-primary me-3"></i>
                                <a href="mailto:${resource.email}" class="text-decoration-none">${resource.email}</a>
                            </div>
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-globe text-primary me-3"></i>
                                <a href="${resource.website}" target="_blank" class="text-decoration-none">${resource.website}</a>
                            </div>
                            <div class="d-flex align-items-start mb-2">
                                <i class="bi bi-geo-alt text-primary me-3 mt-1"></i>
                                <span>${resource.address}</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <i class="bi bi-clock text-primary me-3"></i>
                                <span>${resource.hours}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-bold mb-3">Services Offered</h6>
                        <div class="services-list">
                            ${resource.services.map(service => `
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-check-circle text-success me-2"></i>
                                    <span>${service}</span>
                                </div>
                            `).join('')}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    // Update contact button
    contactBtn.onclick = function() {
        window.open(`tel:${resource.phone}`, '_self');
    };
    
    modal.show();
}

function shareResource(resourceId) {
    if (navigator.share) {
        navigator.share({
            title: 'JOKEBURG Resource',
            text: 'Check out this community resource',
            url: window.location.href + '#resource-' + resourceId
        });
    } else {
        // Fallback - copy to clipboard
        navigator.clipboard.writeText(window.location.href + '#resource-' + resourceId);
        showNotification('Resource link copied to clipboard!', 'success');
    }
}
</script>