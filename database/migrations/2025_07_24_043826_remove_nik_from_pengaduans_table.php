<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            // Hapus kolom nik jika ada
            if (Schema::hasColumn('pengaduans', 'nik')) {
                $table->dropColumn('nik');
            }
        });
    }

    public function down(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            // Jika migrasi dibatalkan, tambahkan lagi kolom nik
            if (!Schema::hasColumn('pengaduans', 'nik')) {
                $table->char('nik', 16)->after('user_id');
            }
        });
    }
};
