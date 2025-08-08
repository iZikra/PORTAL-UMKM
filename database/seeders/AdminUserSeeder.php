<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama_pemilik' => 'Admin Utama',
            'nama_usaha' => 'Kantor Admin',
            'email' => 'zikraahady@gmail.com',
            'password' => Hash::make('iniadminbre'), // Ganti 'password' dengan password yang aman
            'role' => 'admin',
            'kabupaten_kota' => 'Pekanbaru', // Sesuaikan jika perlu
            'sektor_usaha' => 'Lainnya', // Sesuaikan jika perlu
            'email_verified_at' => now(), // Langsung verifikasi email
        ]);
    }
}
