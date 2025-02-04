// This main script is for each view on this project
var baseUrl = `/projet-final-S3-fevrier-2025-elevage`; // Should be the same as the one in config

$(document).ready(function () {
    setMainMarginTop();
    setupSmoothScroll();    
    toggleTheme();
});

function showModalMessage(message) {
    const messageModal = new bootstrap.Modal(document.getElementById('messageModal'));
    document.querySelector('#messageModal .modal-body p').textContent = message;
    messageModal.show();
}

/**
 * Add margin top because the header is fixed
 */
function setMainMarginTop() {
    const header = document.querySelector('header');
    const main = document.querySelector('main');

    if (header && main) {
        const headerHeight = header.offsetHeight;
        main.style.marginTop = `${headerHeight + 30}px`;
    }
}

function setupSmoothScroll() {
    const header = document.querySelector('header');
    const offset = header ? header.offsetHeight + 30 : 60;

    $('a[href^="#"]').on('click', function (event) {
        const target = $(this.getAttribute('href'));
        if (target.length) {
            event.preventDefault();
            $('html, body').animate(
                { scrollTop: target.offset().top - offset }, 
                500
            );
        }
    });
}

/**
 * Light and dark mode toggler
 */
function toggleTheme() {
    const $html = $('html');
    const $themeToggler = $('#themeToggler');

    // Load the theme from localStorage
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
        $html.attr('data-bs-theme', savedTheme);
        $themeToggler.attr('data-theme', savedTheme);
    }

    // Toggle theme and save to localStorage
    $themeToggler.on('click', function () {
        const currentTheme = $html.attr('data-bs-theme');
        const newTheme = currentTheme == 'light' ? 'dark' : 'light';
        $html.attr('data-bs-theme', newTheme);
        $themeToggler.attr('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
    });
}