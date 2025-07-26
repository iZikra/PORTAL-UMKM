<x-layouts.app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Bagian Kartu Statistik --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
                <!-- Total Pengaduan -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Total Pengaduan</h3>
                    <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $totalPengaduan }}</p>
                </div>
                <!-- Pengaduan Baru -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-blue-600 dark:text-blue-400">Pengaduan Baru</h3>
                    <p class="mt-2 text-3xl font-bold text-blue-600 dark:text-blue-400">{{ $pengaduanBaru }}</p>
                </div>
                <!-- Pengaduan Diproses -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-yellow-600 dark:text-yellow-400">Diproses</h3>
                    <p class="mt-2 text-3xl font-bold text-yellow-600 dark:text-yellow-400">{{ $pengaduanDiproses }}</p>
                </div>
                <!-- Pengaduan Selesai -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-green-600 dark:text-green-400">Selesai</h3>
                    <p class="mt-2 text-3xl font-bold text-green-600 dark:text-green-400">{{ $pengaduanSelesai }}</p>
                </div>
                {{-- KARTU BARU: Pengaduan Ditolak --}}
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-red-600 dark:text-red-400">Ditolak</h3>
                    <p class="mt-2 text-3xl font-bold text-red-600 dark:text-red-400">{{ $pengaduanDitolak }}</p>
                </div>
            </div>

            {{-- Tombol Aksi Cepat --}}
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium mb-4">Aksi Cepat</h3>
                    <a href="{{ route('admin.pengaduan.index') }}" class="inline-block bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3 px-6 rounded-lg text-sm">
                        Buka Halaman Kelola Pengaduan &rarr;
                    </a>
                </div>
            </div>

            {{-- Bagian Grafik --}}
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium mb-4">Pengaduan Berdasarkan Kategori</h3>
                    <div class="max-w-xl mx-auto">
                         <canvas id="kategoriChart"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- Script untuk Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('kategoriChart').getContext('2d');
            const chartLabels = @json($chartLabels);
            const chartData = @json($chartData);

            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: chartLabels,
                    datasets: [{
                        label: 'Jumlah Pengaduan',
                        data: chartData,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 206, 86, 0.7)',
                            'rgba(75, 192, 192, 0.7)',
                            'rgba(153, 102, 255, 0.7)',
                            'rgba(255, 159, 64, 0.7)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Distribusi Kategori Pengaduan'
                        }
                    }
                }
            });
        });
    </script>
</x-layouts.app>
