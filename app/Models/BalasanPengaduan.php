<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BalasanPengaduan extends Model
{
    protected $fillable = ['pengaduan_id', 'user_id', 'isi_balasan'];
    public function user() { return $this->belongsTo(User::class); }
    public function pengaduan() { return $this->belongsTo(Pengaduan::class); }
}
