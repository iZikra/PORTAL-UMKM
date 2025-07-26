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
    Schema::table('users', function (Blueprint $table) {
        // Cek dulu sebelum menambahkan setiap kolom
        if (!Schema::hasColumn('users', 'nib')) {
            $table->string('nib', 13)->unique()->after('nama_usaha')->comment('Nomor Induk Berusaha');
        }
        if (!Schema::hasColumn('users', 'sektor_usaha')) {
            $table->string('sektor_usaha')->after('nib');
        }
        if (!Schema::hasColumn('users', 'no_telp')) {
            $table->string('no_telp')->after('sektor_usaha');
        }
        if (!Schema::hasColumn('users', 'alamat_jalan')) {
            $table->string('alamat_jalan')->after('no_telp');
        }
        if (!Schema::hasColumn('users', 'alamat_kelurahan')) {
            $table->string('alamat_kelurahan')->after('alamat_jalan');
        }
        if (!Schema::hasColumn('users', 'alamat_kecamatan')) {
            $table->string('alamat_kecamatan')->after('alamat_kelurahan');
        }
        if (!Schema::hasColumn('users', 'alamat_kota')) {
            $table->string('alamat_kota')->after('alamat_kecamatan');
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'nib',
                'sektor_usaha',
                'no_telp',
                'alamat_jalan',
                'alamat_kelurahan',
                'alamat_kecamatan',
                'alamat_kota',
            ]);
        });
    }
};
