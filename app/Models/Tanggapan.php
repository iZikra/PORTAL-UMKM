<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// PASTIKAN NAMA CLASS DI SINI ADALAH 'Tanggapan'
class Tanggapan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pengaduan_id',
        'user_id',
        'tanggapan',
    ];

    /**
     * Mendapatkan pengaduan yang memiliki tanggapan ini.
     */
    public function pengaduan()
    {
        return $this->belongsTo(Pengaduan::class);
    }

    /**
     * Mendapatkan user (admin/petugas) yang memberikan tanggapan.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
