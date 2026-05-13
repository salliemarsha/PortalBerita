document.addEventListener('DOMContentLoaded', function () {
    const container = document.querySelector('.dashboard-container');
    const openBtn = document.querySelector('.open-btn');
    const closeBtn = document.querySelector('.close-btn');

    if (openBtn) {
        openBtn.addEventListener('click', () => {
            container.classList.add('active');
        });
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', () => {
            container.classList.remove('active');
        });
    }
});