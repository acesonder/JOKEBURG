/**
 * JOKEBURG Theme System JavaScript
 * Dynamic theme switching with smooth transitions
 */

class ThemeManager {
    constructor() {
        this.currentTheme = this.getCurrentTheme();
        this.themes = [
            {
                id: 'theme-cobourg-blue',
                name: 'Cobourg Blue',
                description: 'Professional and trustworthy',
                primary: '#0066cc',
                preview: '#0066cc'
            },
            {
                id: 'theme-forest-green',
                name: 'Forest Green',
                description: 'Natural and calming',
                primary: '#28a745',
                preview: '#28a745'
            },
            {
                id: 'theme-sunset-orange',
                name: 'Sunset Orange',
                description: 'Warm and energetic',
                primary: '#fd7e14',
                preview: '#fd7e14'
            },
            {
                id: 'theme-deep-purple',
                name: 'Deep Purple',
                description: 'Creative and inspiring',
                primary: '#6f42c1',
                preview: '#6f42c1'
            },
            {
                id: 'theme-crimson-red',
                name: 'Crimson Red',
                description: 'Bold and confident',
                primary: '#dc3545',
                preview: '#dc3545'
            },
            {
                id: 'theme-ocean-teal',
                name: 'Ocean Teal',
                description: 'Fresh and modern',
                primary: '#17a2b8',
                preview: '#17a2b8'
            },
            {
                id: 'theme-midnight-dark',
                name: 'Midnight Dark',
                description: 'Sleek and professional',
                primary: '#6c757d',
                preview: '#343a40'
            },
            {
                id: 'theme-sunrise-yellow',
                name: 'Sunrise Yellow',
                description: 'Bright and optimistic',
                primary: '#ffc107',
                preview: '#ffc107'
            },
            {
                id: 'theme-lavender-soft',
                name: 'Lavender Soft',
                description: 'Gentle and peaceful',
                primary: '#b19cd9',
                preview: '#e6e6fa'
            },
            {
                id: 'theme-earth-brown',
                name: 'Earth Brown',
                description: 'Grounded and stable',
                primary: '#8b4513',
                preview: '#8b4513'
            }
        ];
        
        this.init();
    }
    
    init() {
        this.setupThemeModal();
        this.setupThemeToggler();
        this.applyStoredTheme();
        
        console.log('Theme Manager initialized with theme:', this.currentTheme);
    }
    
    getCurrentTheme() {
        // Check localStorage first
        const stored = localStorage.getItem('jokeburg_theme');
        if (stored) return stored;
        
        // Check body class
        const bodyClasses = document.body.className.split(' ');
        const themeClass = bodyClasses.find(cls => cls.startsWith('theme-'));
        return themeClass || 'theme-cobourg-blue';
    }
    
    setupThemeModal() {
        const themeModal = document.getElementById('themeModal');
        if (!themeModal) return;
        
        const modalBody = themeModal.querySelector('.modal-body .row');
        if (!modalBody) return;
        
        // Clear existing content
        modalBody.innerHTML = '';
        
        // Generate theme options
        this.themes.forEach(theme => {
            const themeOption = this.createThemeOption(theme);
            modalBody.appendChild(themeOption);
        });
        
        // Setup apply button
        const applyBtn = document.getElementById('applyTheme');
        if (applyBtn) {
            applyBtn.addEventListener('click', () => this.applySelectedTheme());
        }
        
        // Mark current theme as selected
        this.updateSelectedTheme();
    }
    
    createThemeOption(theme) {
        const col = document.createElement('div');
        col.className = 'col-md-6 col-lg-4';
        
        col.innerHTML = `
            <div class="theme-option" data-theme="${theme.id}">
                <div class="theme-preview" style="background: ${theme.preview};">
                    <div class="theme-preview-content">
                        <div class="preview-header" style="background: linear-gradient(135deg, ${theme.primary}, ${this.darkenColor(theme.primary, 20)});"></div>
                        <div class="preview-body">
                            <div class="preview-card"></div>
                            <div class="preview-buttons">
                                <div class="preview-btn-primary" style="background: ${theme.primary};"></div>
                                <div class="preview-btn-secondary"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <h6 class="mt-2 fw-bold">${theme.name}</h6>
                <p class="text-muted small mb-0">${theme.description}</p>
                <div class="theme-check" style="display: none;">
                    <i class="bi bi-check-circle-fill text-success"></i>
                </div>
            </div>
        `;
        
        // Add click handler
        const themeOption = col.querySelector('.theme-option');
        themeOption.addEventListener('click', () => this.selectTheme(theme.id));
        
        return col;
    }
    
    setupThemeToggler() {
        // Quick theme cycle button
        const themeTogglers = document.querySelectorAll('[data-bs-toggle="modal"][data-bs-target="#themeModal"]');
        
        themeTogglers.forEach(toggler => {
            // Add double-click for quick cycle
            let clickCount = 0;
            toggler.addEventListener('click', () => {
                clickCount++;
                setTimeout(() => {
                    if (clickCount === 2) {
                        this.cycleTheme();
                    }
                    clickCount = 0;
                }, 300);
            });
        });
    }
    
    selectTheme(themeId) {
        // Remove selection from all options
        document.querySelectorAll('.theme-option').forEach(option => {
            option.classList.remove('active');
            option.querySelector('.theme-check').style.display = 'none';
        });
        
        // Select the clicked theme
        const selectedOption = document.querySelector(`[data-theme="${themeId}"]`);
        if (selectedOption) {
            selectedOption.classList.add('active');
            selectedOption.querySelector('.theme-check').style.display = 'block';
            
            // Add selection animation
            animateElement(selectedOption, 'animate-pulse');
        }
        
        this.selectedTheme = themeId;
    }
    
    applySelectedTheme() {
        if (this.selectedTheme && this.selectedTheme !== this.currentTheme) {
            this.changeTheme(this.selectedTheme);
            
            // Close modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('themeModal'));
            if (modal) modal.hide();
            
            // Show success message
            showNotification(`Theme changed to ${this.getThemeName(this.selectedTheme)}!`, 'success');
        }
    }
    
    changeTheme(newThemeId) {
        const oldTheme = this.currentTheme;
        
        // Add transition class
        document.body.classList.add('theme-transition');
        
        // Apply new theme
        setTimeout(() => {
            // Remove old theme class
            if (oldTheme) {
                document.body.classList.remove(oldTheme);
                document.documentElement.classList.remove(oldTheme);
            }
            
            // Add new theme class
            document.body.classList.add(newThemeId);
            document.documentElement.classList.add(newThemeId);
            
            // Update current theme
            this.currentTheme = newThemeId;
            
            // Store in localStorage
            localStorage.setItem('jokeburg_theme', newThemeId);
            
            // Update meta theme color
            this.updateMetaThemeColor();
            
            // Trigger theme change event
            this.dispatchThemeChangeEvent(oldTheme, newThemeId);
            
            // Remove transition class
            setTimeout(() => {
                document.body.classList.remove('theme-transition');
            }, 500);
            
        }, 50);
    }
    
    cycleTheme() {
        const currentIndex = this.themes.findIndex(theme => theme.id === this.currentTheme);
        const nextIndex = (currentIndex + 1) % this.themes.length;
        const nextTheme = this.themes[nextIndex];
        
        this.changeTheme(nextTheme.id);
        showNotification(`Switched to ${nextTheme.name}`, 'info', 2000);
    }
    
    applyStoredTheme() {
        const storedTheme = localStorage.getItem('jokeburg_theme');
        if (storedTheme && storedTheme !== this.currentTheme) {
            this.changeTheme(storedTheme);
        }
    }
    
    updateSelectedTheme() {
        this.selectTheme(this.currentTheme);
    }
    
    updateMetaThemeColor() {
        const theme = this.themes.find(t => t.id === this.currentTheme);
        if (theme) {
            let metaThemeColor = document.querySelector('meta[name="theme-color"]');
            if (!metaThemeColor) {
                metaThemeColor = document.createElement('meta');
                metaThemeColor.name = 'theme-color';
                document.head.appendChild(metaThemeColor);
            }
            metaThemeColor.content = theme.primary;
        }
    }
    
    dispatchThemeChangeEvent(oldTheme, newTheme) {
        const event = new CustomEvent('themeChanged', {
            detail: { oldTheme, newTheme }
        });
        document.dispatchEvent(event);
    }
    
    getThemeName(themeId) {
        const theme = this.themes.find(t => t.id === themeId);
        return theme ? theme.name : themeId;
    }
    
    darkenColor(color, percent) {
        const num = parseInt(color.replace("#", ""), 16);
        const amt = Math.round(2.55 * percent);
        const R = (num >> 16) - amt;
        const G = (num >> 8 & 0x00FF) - amt;
        const B = (num & 0x0000FF) - amt;
        return "#" + (0x1000000 + (R < 255 ? R < 1 ? 0 : R : 255) * 0x10000 +
            (G < 255 ? G < 1 ? 0 : G : 255) * 0x100 +
            (B < 255 ? B < 1 ? 0 : B : 255)).toString(16).slice(1);
    }
    
    lightenColor(color, percent) {
        const num = parseInt(color.replace("#", ""), 16);
        const amt = Math.round(2.55 * percent);
        const R = (num >> 16) + amt;
        const G = (num >> 8 & 0x00FF) + amt;
        const B = (num & 0x0000FF) + amt;
        return "#" + (0x1000000 + (R < 255 ? R < 1 ? 0 : R : 255) * 0x10000 +
            (G < 255 ? G < 1 ? 0 : G : 255) * 0x100 +
            (B < 255 ? B < 1 ? 0 : B : 255)).toString(16).slice(1);
    }
    
    // Public API methods
    getCurrentThemeInfo() {
        return this.themes.find(theme => theme.id === this.currentTheme);
    }
    
    getAllThemes() {
        return [...this.themes];
    }
    
    setTheme(themeId) {
        if (this.themes.find(theme => theme.id === themeId)) {
            this.changeTheme(themeId);
            return true;
        }
        return false;
    }
    
    resetToDefault() {
        this.changeTheme('theme-cobourg-blue');
    }
}

// Auto-detect system theme preference
function detectSystemTheme() {
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        return 'theme-midnight-dark';
    }
    return 'theme-cobourg-blue';
}

// Initialize theme manager when DOM is ready
let themeManager;

document.addEventListener('DOMContentLoaded', function() {
    themeManager = new ThemeManager();
    
    // Listen for system theme changes
    if (window.matchMedia) {
        const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
        mediaQuery.addEventListener('change', function() {
            if (!localStorage.getItem('jokeburg_theme')) {
                // Only auto-switch if user hasn't manually selected a theme
                const newTheme = detectSystemTheme();
                themeManager.setTheme(newTheme);
            }
        });
    }
    
    // Add keyboard shortcut for theme cycling (Ctrl+Shift+T)
    document.addEventListener('keydown', function(e) {
        if (e.ctrlKey && e.shiftKey && e.code === 'KeyT') {
            e.preventDefault();
            themeManager.cycleTheme();
        }
    });
});

// Add CSS for theme preview styles
const themePreviewStyles = `
    <style>
    .theme-preview {
        position: relative;
        width: 100%;
        height: 80px;
        border-radius: 8px;
        overflow: hidden;
        margin-bottom: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }
    
    .theme-preview-content {
        width: 100%;
        height: 100%;
        position: relative;
    }
    
    .preview-header {
        height: 25px;
        width: 100%;
    }
    
    .preview-body {
        padding: 8px;
        background: #fff;
        height: calc(100% - 25px);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    
    .preview-card {
        height: 20px;
        background: #f8f9fa;
        border-radius: 3px;
        margin-bottom: 4px;
    }
    
    .preview-buttons {
        display: flex;
        gap: 4px;
    }
    
    .preview-btn-primary {
        height: 12px;
        width: 30px;
        border-radius: 2px;
    }
    
    .preview-btn-secondary {
        height: 12px;
        width: 30px;
        border-radius: 2px;
        background: #6c757d;
    }
    
    .theme-option {
        cursor: pointer;
        text-align: center;
        padding: 16px;
        border-radius: 12px;
        transition: all 0.3s ease;
        border: 2px solid transparent;
        position: relative;
    }
    
    .theme-option:hover {
        background: #f8f9fa;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    
    .theme-option.active {
        border-color: var(--primary-color);
        background: rgba(var(--primary-color), 0.1);
    }
    
    .theme-check {
        position: absolute;
        top: 8px;
        right: 8px;
        font-size: 1.2rem;
    }
    
    .theme-midnight-dark .preview-body {
        background: #2c3034;
    }
    
    .theme-midnight-dark .preview-card {
        background: #495057;
    }
    </style>
`;

// Inject preview styles
document.head.insertAdjacentHTML('beforeend', themePreviewStyles);

// Export for use in other modules
if (typeof module !== 'undefined' && module.exports) {
    module.exports = ThemeManager;
}