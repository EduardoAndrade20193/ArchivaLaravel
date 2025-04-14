// Manejo del sidebar (colapsar/expandir)
document.addEventListener('DOMContentLoaded', () => {
    let sidebarExpanded = true;

    window.toggleSidebar = function () {
        const sidebar = document.getElementById('sidebar');
        const main = document.getElementById('main-content');
        const icon = document.getElementById('toggleIcon');

        sidebar.classList.toggle('w-16');
        sidebar.classList.toggle('w-64');
        main.classList.toggle('ml-16');
        main.classList.toggle('ml-64');
        icon.classList.toggle('rotate-180');

        document.querySelectorAll('.sidebar-text').forEach(el => {
            el.classList.toggle('hidden');
        });
    }
});
