<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tanggapans', function (Blueprint $table) {
            $table->id();
            // Kunci untuk menghubungkan ke tabel 'pengaduans'
            // onDelete('cascade') berarti jika pengaduan dihapus, tanggapannya juga ikut terhapus.
            $table->foreignId('pengaduan_id')->constrained()->onDelete('cascade');
            
            // Kunci untuk menghubungkan ke tabel 'users' (siapa yang menanggapi)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // Kolom untuk menyimpan isi dari tanggapan
            $table->text('tanggapan');
            
            // Kolom waktu 'created_at' dan 'updated_at'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tanggapans');
    }
};
