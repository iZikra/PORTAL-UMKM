import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0',
        port: 5173,
        // Tambahkan konfigurasi HMR (Hot Module Replacement)
        // untuk memberitahu Vite alamat IP yang benar saat diakses dari perangkat lain.
        hmr: {
            host: '192.168.18.19',
        },
    },
});
