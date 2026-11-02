/* ============================================================
   VIBES SPACE — script.js
   ============================================================ */

document.addEventListener('DOMContentLoaded', function () {

    const navToggle = document.getElementById('navToggle');
    const navMenu = document.getElementById('navMenu');
    const navLinks = document.querySelectorAll('.nav-link');

    if (navToggle && navMenu) {
        navToggle.addEventListener('click', function () {
            navMenu.classList.toggle('open');
        });
    }

    if (navMenu) {
        navLinks.forEach(function (link) {
            link.addEventListener('click', function () {
                navMenu.classList.remove('open');
                navLinks.forEach(l => l.classList.remove('active'));
                link.classList.add('active');
            });
        });
        document.addEventListener('click', function (e) {
            if (navToggle && navMenu && !navMenu.contains(e.target) && !navToggle.contains(e.target)) {
                navMenu.classList.remove('open');
            }
        });
    }

    const sections = document.querySelectorAll('section[id]');
    if (sections.length && navLinks.length) {
        window.addEventListener('scroll', function () {
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop - 120;
                if (window.scrollY >= sectionTop) current = section.getAttribute('id');
            });
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === '#' + current) link.classList.add('active');
            });
        }, { passive: true });
    }

    window.addEventListener('resize', function () {
        if (window.innerWidth > 768) {
            const sidebar = document.getElementById('adminSidebar');
            const overlay = document.getElementById('sidebarOverlay');
            if (sidebar) sidebar.classList.remove('open');
            if (overlay) overlay.classList.remove('show');
            document.body.classList.remove('sidebar-open');
        }
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.modal-overlay, .modal-detail-overlay, .modal-overlay-custom').forEach(m => {
                m.classList.remove('show');
                if (m.style) m.style.display = 'none';
            });
            document.body.style.overflow = '';
        }
    });

});

function toggleSidebar() {
    const sidebar = document.getElementById('adminSidebar');
    const overlay = document.getElementById('sidebarOverlay');
    if (!sidebar) return;
    sidebar.classList.toggle('open');
    if (overlay) overlay.classList.toggle('show');
    document.body.classList.toggle('sidebar-open', sidebar.classList.contains('open'));
}
window.toggleSidebar = toggleSidebar;