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
            // Menambahkan kolom baru setelah 'user_id'
            $table->string('nama_usaha')->after('user_id');
            $table->string('nama_pelaku_usaha')->after('nama_usaha');
            $table->text('alamat_usaha')->after('nama_pelaku_usaha');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengaduans', function (Blueprint $table) {
            $table->dropColumn(['nama_usaha', 'nama_pelaku_usaha', 'alamat_usaha']);
        });
    }
};
