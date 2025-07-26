<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Hapus kolom nik jika ada
            if (Schema::hasColumn('users', 'nik')) {
                $table->dropColumn('nik');
            }
            // Tambahkan kolom nama_usaha setelah kolom name
            if (!Schema::hasColumn('users', 'nama_usaha')) {
                $table->string('nama_usaha')->after('name');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Kebalikan dari proses di atas
            if (Schema::hasColumn('users', 'nama_usaha')) {
                $table->dropColumn('nama_usaha');
            }
            if (!Schema::hasColumn('users', 'nik')) {
                $table->char('nik', 16)->unique()->after('name');
            }
        });
    }
};
