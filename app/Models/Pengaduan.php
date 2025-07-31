<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'kode_unik',
        'judul',
        'kategori',
        'deskripsi',
        'status',
        'nama_usaha',
        'nama_pelaku_usaha',
        'bukti',
        'alamat_usaha',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Mendapatkan user yang memiliki pengaduan.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Mendapatkan semua tanggapan untuk pengaduan ini.
     * INI ADALAH METHOD YANG HILANG.
     */
    public function tanggapans()
    {
        // hasMany() mendefinisikan bahwa satu Pengaduan bisa memiliki banyak Tanggapan.
        return $this->hasMany(Tanggapan::class)->latest(); // Tampilkan yang terbaru dulu
    }
}
