<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // FAQ halaman Publik
        $this->call(FaqSeeder::class);

        $this->call(AdminUserSeeder::class);

        // Hapus data lama untuk menghindari duplikasi
        Faq::query()->delete();

        Faq::create([
            'pertanyaan' => 'Apa itu Portal UMKM?',
            'jawaban' => 'Portal UMKM adalah platform digital yang dirancang untuk membantu para pelaku Usaha Mikro, Kecil, dan Menengah (UMKM) dalam melaporkan kendala, mendapatkan informasi terbaru, serta mengakses basis pengetahuan untuk pengembangan usaha.'
        ]);

        Faq::create([
            'pertanyaan' => 'Siapa saja yang bisa mendaftar di portal ini?',
            'jawaban' => 'Semua pelaku UMKM yang memiliki usaha di wilayah Pekanbaru dan sekitarnya dapat mendaftar dan menggunakan layanan di portal ini. Anda hanya perlu memiliki NIB (Nomor Induk Berusaha) yang valid.'
        ]);

        Faq::create([
            'pertanyaan' => 'Apa itu NIB dan mengapa saya membutuhkannya untuk mendaftar?',
            'jawaban' => 'NIB (Nomor Induk Berusaha) adalah identitas pelaku usaha yang diterbitkan oleh pemerintah melalui sistem Online Single Submission (OSS). NIB diperlukan sebagai verifikasi bahwa Anda adalah pelaku usaha yang sah dan terdaftar.'
        ]);

        Faq::create([
            'pertanyaan' => 'Bagaimana cara mendapatkan NIB?',
            'jawaban' => 'Anda bisa mendapatkan NIB dengan mendaftarkan usaha Anda secara online melalui situs resmi OSS (oss.go.id). Prosesnya cepat dan tidak dipungut biaya.'
        ]);

        Faq::create([
            'pertanyaan' => 'Jenis pengaduan apa saja yang bisa saya laporkan?',
            'jawaban' => 'Anda dapat melaporkan berbagai jenis kendala yang dihadapi, seperti masalah permodalan, kesulitan pemasaran, kendala perizinan, masalah bahan baku, atau masalah teknis produksi.'
        ]);

        Faq::create([
            'pertanyaan' => 'Berapa lama pengaduan saya akan diproses?',
            'jawaban' => 'Setiap pengaduan yang masuk akan segera ditinjau oleh tim admin kami. Waktu respons bervariasi tergantung pada kompleksitas masalah, namun Anda dapat memantau status pengaduan Anda (Baru, Diproses, Selesai) melalui dashboard.'
        ]);

        Faq::create([
            'pertanyaan' => 'Apakah layanan di portal ini berbayar?',
            'jawaban' => 'Tidak. Semua layanan dasar seperti pendaftaran, pengajuan pengaduan, dan akses ke basis pengetahuan di portal ini sepenuhnya gratis untuk para pelaku UMKM.'
        ]);

        Faq::create([
            'pertanyaan' => 'Apa itu Basis Pengetahuan?',
            'jawaban' => 'Basis Pengetahuan adalah kumpulan artikel, panduan, dan informasi bermanfaat yang kami sediakan untuk membantu Anda mengembangkan usaha. Topiknya mencakup strategi bisnis, pemasaran digital, manajemen keuangan, dan banyak lagi.'
        ]);
    }
}
