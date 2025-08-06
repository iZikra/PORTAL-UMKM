<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KnowledgeBase extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * PERBAIKAN: Menambahkan kolom yang diizinkan untuk diisi secara massal.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'category',
        'content',
    ];
}
