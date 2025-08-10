import './bootstrap';
// Fungsi untuk menerapkan animasi
const applyAnimation = () => {
    // Hapus kelas animasi lama jika ada (untuk re-trigger di Livewire)
    document.body.classList.remove('animate-page-fade-in');

    // Trik untuk memaksa browser me-render ulang sebelum menambahkan kelas baru
    void document.body.offsetWidth;

    // Tambahkan kelas untuk memicu animasi
    document.body.classList.add('animate-page-fade-in');
};

// Jalankan animasi saat halaman pertama kali dimuat (untuk login, register, dll)
document.addEventListener('DOMContentLoaded', applyAnimation);

// Jalankan lagi animasi setiap kali Livewire selesai menavigasi (untuk dashboard)
document.addEventListener('livewire:navigated', applyAnimation);