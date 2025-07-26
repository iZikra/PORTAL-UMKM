<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Faq; // <-- Jangan lupa import model Faq

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Faq::create([
            'pertanyaan' => 'Bagaimana cara mengajukan pengaduan?',
            'jawaban' => 'Anda harus mendaftar atau login terlebih dahulu, kemudian klik tombol "Buat Pengaduan Baru" di dashboard Anda dan isi formulir yang tersedia.'
        ]);

        Faq::create([
            'pertanyaan' => 'Berapa lama pengaduan saya akan diproses?',
            'jawaban' => 'Pengaduan Anda akan ditinjau oleh tim kami dalam waktu 1-3 hari kerja. Anda dapat melacak statusnya melalui halaman "Lacak Pengaduan".'
        ]);

        Faq::create([
            'pertanyaan' => 'Apakah layanan konsultasi ini berbayar?',
            'jawaban' => 'Tidak, semua layanan pengaduan dan konsultasi di portal ini gratis untuk seluruh UMKM/IKM yang terdaftar.'
        ]);
    }
}