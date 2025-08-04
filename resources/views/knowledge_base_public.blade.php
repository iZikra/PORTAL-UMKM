<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Basis Pengetahuan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- PERBAIKAN: Padding diubah agar lebih pas di mobile --}}
                <div class="p-4 sm:p-6 md:p-8 text-gray-900">
                    <h3 class="text-2xl font-bold mb-2">Pusat Bantuan UMKM</h3>
                    <p class="mb-8 text-gray-600">Temukan panduan, tips, dan solusi untuk pertanyaan umum seputar UMKM.</p>

                    <div class="space-y-6">
                        {{-- ARTIKEL-ARTIKEL YANG SUDAH ADA --}}

                        <div class="p-4 sm:p-6 bg-gray-50 rounded-lg shadow-sm border border-gray-200">
                            <p class="text-sm font-semibold text-indigo-600 mb-1">Perizinan & Legalitas</p>
                            <h4 class="text-xl font-bold text-gray-800">Langkah Mudah Mengurus NIB untuk Usaha Mikro</h4>
                            <div class="mt-3 text-gray-700 leading-relaxed">
                                Nomor Induk Berusaha (NIB) adalah identitas resmi yang wajib dimiliki oleh setiap pelaku usaha di Indonesia.
                                <br><br>
                                **Bagaimana cara mengurusnya?**<br>
                                1. Siapkan Dokumen: Pastikan Anda memiliki KTP dan NPWP pribadi yang valid.<br>
                                2. Kunjungi Situs OSS: Proses pendaftaran dilakukan sepenuhnya online melalui situs resmi Online Single Submission (OSS) di oss.go.id.<br>
                                3. Buat Akun: Klik "Daftar" dan ikuti proses pembuatan akun dengan memasukkan data diri sesuai KTP. Lakukan aktivasi melalui email.<br>
                                4. Isi Formulir Pendaftaran: Setelah login, isi semua data yang diperlukan, seperti data usaha, bidang usaha (KBLI), dan lokasi.<br>
                                5. NIB Terbit: Setelah semua data terisi dengan benar, sistem akan secara otomatis menerbitkan NIB yang bisa langsung Anda unduh.
                            </div>
                        </div>

                        <div class="p-4 sm:p-6 bg-gray-50 rounded-lg shadow-sm border border-gray-200">
                           <p class="text-sm font-semibold text-indigo-600 mb-1">Permodalan & Keuangan</p>
                            <h4 class="text-xl font-bold text-gray-800">3 Cara Mendapatkan Modal Awal untuk UMKM</h4>
                            <div class="mt-3 text-gray-700 leading-relaxed">
                                Berikut adalah tiga sumber permodalan yang paling umum dan bisa Anda coba:<br><br>
                                **Kredit Usaha Rakyat (KUR)**: Program pinjaman bersubsidi dari pemerintah dengan bunga sangat rendah (sekitar 6% per tahun).<br><br>
                                **Lembaga Keuangan Mikro (LKM)**: Seperti koperasi simpan pinjam atau BPR yang menawarkan pinjaman dengan plafon lebih kecil dan proses yang lebih fleksibel.<br><br>
                                **PNM Mekaar**: Dikhususkan untuk perempuan pelaku usaha mikro, memberikan pinjaman modal tanpa agunan dengan sistem kelompok.
                            </div>
                        </div>

                        <div class="p-4 sm:p-6 bg-gray-50 rounded-lg shadow-sm border border-gray-200">
                            <p class="text-sm font-semibold text-indigo-600 mb-1">Pemasaran & Penjualan</p>
                            <h4 class="text-xl font-bold text-gray-800">Tips Pemasaran Digital Murah untuk UMKM Pemula</h4>
                            <div class="mt-3 text-gray-700 leading-relaxed">
                                Manfaatkan platform online untuk menjangkau lebih banyak pelanggan dengan biaya minimal.<br><br>
                                **Optimalkan Media Sosial**: Buat akun bisnis di Instagram, Facebook, atau TikTok. Unggah foto produk yang menarik dan aktif berinteraksi.<br><br>
                                **Daftar di Google Business Profile**: Daftarkan lokasi usaha Anda di Google Maps secara gratis untuk meningkatkan visibilitas.<br><br>
                                **Gunakan WhatsApp Business**: Pisahkan nomor pribadi dengan nomor bisnis dan gunakan fitur katalog untuk terlihat profesional.<br><br>
                                **Bergabung dengan Marketplace**: Manfaatkan platform seperti Tokopedia, Shopee, atau Bukalapak untuk menjual produk Anda.
                            </div>
                        </div>

                        <div class="p-4 sm:p-6 bg-gray-50 rounded-lg shadow-sm border border-gray-200">
                            <p class="text-sm font-semibold text-indigo-600 mb-1">Keuangan & Akuntansi</p>
                            <h4 class="text-xl font-bold text-gray-800">Wajib Tahu! 3 Fondasi Keuangan untuk UMKM Sehat</h4>
                            <div class="mt-3 text-gray-700 leading-relaxed">
                                Manajemen keuangan yang baik adalah jantung dari bisnis yang sehat. Mulailah dengan tiga kebiasaan sederhana ini:<br><br>
                                1. **Pisahkan Rekening Pribadi dan Bisnis**: Ini adalah aturan nomor satu. Jangan pernah mencampur uang usaha dengan uang pribadi.<br><br>
                                2. **Lakukan Pencatatan Harian (Bookkeeping)**: Catat semua transaksi setiap hari, sekecil apa pun, menggunakan buku atau spreadsheet.<br><br>
                                3. **Hitung Harga Pokok Penjualan (HPP) dengan Benar**: Ketahui modal pasti untuk satu produk sebelum menentukan harga jual.
                            </div>
                        </div>

                        <div class="p-4 sm:p-6 bg-gray-50 rounded-lg shadow-sm border border-gray-200">
                           <p class="text-sm font-semibold text-indigo-600 mb-1">Layanan & Pelanggan</p>
                            <h4 class="text-xl font-bold text-gray-800">Cara Mengubah Keluhan Pelanggan Menjadi Keuntungan</h4>
                            <div class="mt-3 text-gray-700 leading-relaxed">
                                Setiap keluhan adalah kesempatan emas. Gunakan metode **S-M-S (Simpati, Solusi, Senyum)**:<br><br>
                                1. **Tunjukkan SIMPATI**: Dengarkan, ucapkan terima kasih, dan minta maaf atas ketidaknyamanannya.<br><br>
                                2. **Tawarkan SOLUSI**: Berikan solusi nyata seperti penggantian produk, refund, atau diskon. Ini menunjukkan Anda bertanggung jawab.<br><br>
                                3. **Akhiri dengan SENYUM**: Pastikan pelanggan puas dengan penanganan Anda untuk membangun loyalitas.
                            </div>
                        </div>

                        <div class="p-4 sm:p-6 bg-gray-50 rounded-lg shadow-sm border border-gray-200">
                            <p class="text-sm font-semibold text-indigo-600 mb-1">Operasional & Manajemen</p>
                            <h4 class="text-xl font-bold text-gray-800">Stok Aman, Hati Tenang: Tips Mengelola Persediaan Barang</h4>
                            <div class="mt-3 text-gray-700 leading-relaxed">
                                Manajemen stok yang buruk bisa menyebabkan kerugian. Coba tips berikut:<br><br>
                                1. **Gunakan Sistem "First-In, First-Out" (FIFO)**: Barang yang pertama masuk adalah yang pertama dijual, terutama untuk produk makanan.<br><br>
                                2. **Buat Kartu Stok Sederhana**: Catat barang masuk dan keluar untuk setiap produk agar sisa stok selalu terpantau.<br><br>
                                3. **Tentukan Stok Minimum**: Tetapkan jumlah minimum untuk setiap produk sebagai sinyal untuk melakukan pemesanan ulang (restock).
                            </div>
                        </div>

                        {{-- KODE DINAMIS UNTUK MENAMPILKAN ARTIKEL DARI DATABASE --}}
                        @forelse ($articles as $article)
                            <div class="p-4 sm:p-6 bg-yellow-50 rounded-lg shadow-sm border border-yellow-300">
                                @if ($article->category)
                                    <p class="text-sm font-semibold text-yellow-800 mb-1">{{ $article->category }} (Dari Admin)</p>
                                @endif
                                <h4 class="text-xl font-bold text-gray-800">{{ $article->title }}</h4>
                                <div class="mt-3 text-gray-700 leading-relaxed">
                                    {!! nl2br(e($article->content)) !!}
                                </div>
                            </div>
                        @empty
                            {{-- Pesan ini hanya akan muncul jika tidak ada artikel tambahan dari admin --}}
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>