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
        // Periksa dulu apakah kolomnya sudah ada atau belum, untuk menghindari error
        if (!Schema::hasColumn('pengaduans', 'nik')) {
            Schema::table('pengaduans', function (Blueprint $table) {
                // Ini adalah baris yang menambahkan kolom 'nik'
                $table->char('nik', 16)->after('id'); // Menambahkan kolom NIK setelah kolom ID
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Periksa dulu apakah kolomnya ada sebelum mencoba menghapusnya
        if (Schema::hasColumn('pengaduans', 'nik')) {
            Schema::table('pengaduans', function (Blueprint $table) {
                $table->dropColumn('nik');
            });
        }
    }
};
