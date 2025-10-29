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
        // Kita akan periksa 'nama_pemilik_usaha' sebagai gantinya
        if (!Schema::hasColumn('users', 'nama_pemilik_usaha')) {
            Schema::table('users', function (Blueprint $table) {
                // Menambahkan kolom dari file migrasi LAMA
                $table->string('nama_pemilik_usaha')->nullable()->after('name');
                $table->string('nama_usaha')->nullable()->after('nama_pemilik_usaha');
                
                // Menambahkan semua kolom dari file migrasi BARU
                $table->string('nib', 13)->unique()->nullable()->after('nama_usaha');
                $table->string('sektor_usaha')->nullable()->after('nib');
                $table->string('no_telp', 15)->nullable()->after('sektor_usaha');
                $table->text('alamat_jalan')->nullable()->after('no_telp');
                $table->string('alamat_kelurahan')->nullable()->after('alamat_jalan');
                $table->string('alamat_kecamatan')->nullable()->after('alamat_kelurahan');
                
                // Menggunakan 'alamat_kota' dan menghapus 'kota' yang duplikat
                $table->string('alamat_kota')->nullable()->after('alamat_kecamatan');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('users', 'nama_pemilik_usaha')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn([
                    'nama_pemilik_usaha',
                    'nama_usaha',
                    'nib',
                    'sektor_usaha',
                    'no_telp',
                    'alamat_jalan',
                    'alamat_kelurahan',
                    'alamat_kecamatan',
                    'alamat_kota'
                ]);
            });
        }
    }
};
