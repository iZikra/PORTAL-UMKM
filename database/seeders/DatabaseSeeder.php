<?php
namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // ... kode lain yang mungkin sudah ada

        $this->call([
            FaqSeeder::class, // <-- Tambahkan baris ini
        ]);
    }
}