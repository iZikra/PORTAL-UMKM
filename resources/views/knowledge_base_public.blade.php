<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Basis Pengetahuan - Portal Layanan Pengaduan UMKM</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Menambahkan script AlpineJS Collapse untuk animasi --}}
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="antialiased bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200">
    <div class="min-h-screen">
        {{-- Menggunakan komponen navigasi yang sama dengan halaman utama --}}
        @include('components.layouts.navigation')

        <main>
            <div class="py-12">
                <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 lg:p-8 text-gray-900 dark:text-gray-100">

                            <div class="mb-10 text-center">
                                <h3 class="text-3xl font-bold text-gray-900 dark:text-white">Pusat Bantuan UMKM</h3>
                                <p class="mt-3 text-lg text-gray-600 dark:text-gray-400">Temukan panduan, tips, dan solusi untuk pertanyaan umum seputar UMKM.</p>
                            </div>

                            {{-- Wrapper Alpine.js untuk state management accordion --}}
                            <div x-data="{ open: null }" class="space-y-4">
                                {{-- Menggabungkan semua artikel (statis dan dinamis) ke dalam satu loop untuk tampilan accordion --}}
                                @php
                                    $allArticles = [
                                        // Konten Statis
                                        ['id' => 's1', 'kategori' => 'Perizinan & Legalitas', 'judul' => 'Langkah Mudah Mengurus NIB untuk Usaha Mikro', 'konten' => "Nomor Induk Berusaha (NIB) adalah identitas resmi yang wajib dimiliki oleh setiap pelaku usaha di Indonesia.\n\n**Bagaimana cara mengurusnya?**\n1. Siapkan Dokumen: Pastikan Anda memiliki KTP dan NPWP pribadi yang valid.\n2. Kunjungi Situs OSS: Proses pendaftaran dilakukan sepenuhnya online melalui situs resmi Online Single Submission (OSS) di oss.go.id.\n3. Buat Akun: Klik \"Daftar\" dan ikuti proses pembuatan akun dengan memasukkan data diri sesuai KTP. Lakukan aktivasi melalui email.\n4. Isi Formulir Pendaftaran: Setelah login, isi semua data yang diperlukan, seperti data usaha, bidang usaha (KBLI), dan lokasi.\n5. NIB Terbit: Setelah semua data terisi dengan benar, sistem akan secara otomatis menerbitkan NIB yang bisa langsung Anda unduh."],
                                        ['id' => 's2', 'kategori' => 'Permodalan & Keuangan', 'judul' => '3 Cara Mendapatkan Modal Awal untuk UMKM', 'konten' => "Berikut adalah tiga sumber permodalan yang paling umum dan bisa Anda coba:\n\n**Kredit Usaha Rakyat (KUR)**: Program pinjaman bersubsidi dari pemerintah dengan bunga sangat rendah (sekitar 6% per tahun).\n\n**Lembaga Keuangan Mikro (LKM)**: Seperti koperasi simpan pinjam atau BPR yang menawarkan pinjaman dengan plafon lebih kecil dan proses yang lebih fleksibel.\n\n**PNM Mekaar**: Dikhususkan untuk perempuan pelaku usaha mikro, memberikan pinjaman modal tanpa agunan dengan sistem kelompok."],
                                        ['id' => 's3', 'kategori' => 'Pemasaran & Penjualan', 'judul' => 'Tips Pemasaran Digital Murah untuk UMKM Pemula', 'konten' => "Manfaatkan platform online untuk menjangkau lebih banyak pelanggan dengan biaya minimal.\n\n**Optimalkan Media Sosial**: Buat akun bisnis di Instagram, Facebook, atau TikTok. Unggah foto produk yang menarik dan aktif berinteraksi.\n\n**Daftar di Google Business Profile**: Daftarkan lokasi usaha Anda di Google Maps secara gratis untuk meningkatkan visibilitas.\n\n**Gunakan WhatsApp Business**: Pisahkan nomor pribadi dengan nomor bisnis dan gunakan fitur katalog untuk terlihat profesional.\n\n**Bergabung dengan Marketplace**: Manfaatkan platform seperti Tokopedia, Shopee, atau Bukalapak untuk menjual produk Anda."],
                                    ];

                                    // Menggabungkan artikel dinamis dari database
                                    foreach ($articles as $article) {
                                        $allArticles[] = ['id' => 'd' . $article->id, 'kategori' => $article->category . ' (Dari Admin)', 'judul' => $article->title, 'konten' => $article->content];
                                    }
                                @endphp

                                @forelse ($allArticles as $item)
                                    <div class="border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                                        <button @click="open = (open === '{{ $item['id'] }}' ? null : '{{ $item['id'] }}')" class="w-full flex justify-between items-center p-5 text-left font-semibold text-gray-800 dark:text-gray-200 transition-colors duration-200 hover:bg-gray-50 dark:hover:bg-gray-700/50">
                                            <span>{{ $item['judul'] }}</span>
                                            <svg :class="{'rotate-180': open === '{{ $item['id'] }}'}" class="w-5 h-5 text-gray-500 transform transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                        </button>
                                        
                                        <div x-show="open === '{{ $item['id'] }}'" x-collapse.duration.500ms>
                                            <div class="p-5 pt-0">
                                                <p class="text-sm font-semibold text-indigo-600 mb-2">{{ $item['kategori'] }}</p>
                                                <div class="text-gray-600 dark:text-gray-400 prose dark:prose-invert max-w-none">
                                                    {!! nl2br(e($item['konten'])) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center py-16 border-2 border-dashed border-gray-300 dark:border-gray-700 rounded-lg">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                          <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.79 4 4s-1.79 4-4 4-4-1.79-4-4a4.01 4.01 0 011.02-2.625z" />
                                          <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 100-18 9 9 0 000 18z" />
                                        </svg>
                                        <h3 class="mt-2 text-sm font-semibold text-gray-900 dark:text-white">Belum ada artikel</h3>
                                        <p class="mt-1 text-sm text-gray-500">Silakan periksa kembali nanti.</p>
                                    </div>
                                @endforelse
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>