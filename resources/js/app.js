import './bootstrap';

import Alpine from 'alpinejs';

// [FIXED] Logika plugin dan animasi yang kompleks telah dihapus untuk stabilitas.
// Alpine.js sekarang diinisialisasi melalui file bootstrap.js Anda.

window.Alpine = Alpine;

Alpine.start();
