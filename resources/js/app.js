import './bootstrap';
import '../css/app.css';
import './custom.js';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const container = document.querySelector('.dashboard-container');
const openBtn = document.querySelector('.open-btn');
const closeBtn = document.querySelector('.close-btn');

openBtn.addEventListener('click', () => {
    container.classList.add('active');
});

closeBtn.addEventListener('click', () => {
    container.classList.remove('active');
});