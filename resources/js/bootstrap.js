import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Import Alpine dan Plugin Collapse
import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse'; // <-- TAMBAHKAN INI

// Daftarkan plugin ke Alpine
Alpine.plugin(collapse); // <-- TAMBAHKAN INI

// Jalankan Alpine
window.Alpine = Alpine;
Alpine.start();