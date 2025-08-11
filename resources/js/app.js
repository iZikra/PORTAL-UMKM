// Langkah 1: Impor bootstrap (yang berisi Alpine.js) seperti biasa.
import './bootstrap';

// Langkah 2: Bungkus semua logika animasi Anda di dalam event listener 'alpine:init'.
// Event ini hanya akan berjalan SETELAH Alpine.js siap.
document.addEventListener('alpine:init', () => {

    // Fungsi untuk menerapkan animasi
    const applyAnimation = () => {
        // Kita akan menargetkan tag <main> yang memiliki class animasi
        const mainContent = document.querySelector('main.content-fade-in');

        if (mainContent) {
            // Hapus kelas untuk me-reset animasi
            mainContent.classList.remove('content-fade-in');

            // Trik untuk memaksa browser me-render ulang
            void mainContent.offsetWidth;

            // Tambahkan kembali kelas untuk memicu animasi
            mainContent.classList.add('content-fade-in');
        }
    };

    // Jalankan animasi saat halaman pertama kali dimuat
    applyAnimation();

    // Jalankan lagi animasi setiap kali Livewire selesai menavigasi
    document.addEventListener('livewire:navigated', applyAnimation);
});