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
        Schema::table('pengaduans', function (Blueprint $table) {
            // Mengubah kolom status menjadi string dengan panjang 20
            // dan memberikan nilai default 'Baru'
            $table->string('status', 20)->default('Baru')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            // Jika migrasi dibatalkan, kembalikan ke tipe sebelumnya jika perlu
            // (Tindakan ini mungkin perlu disesuaikan tergantung tipe kolom asli Anda)
        });
    }
};
