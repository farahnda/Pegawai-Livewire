<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $fillable = [
        'pegawai_id',   // 👉 wajib ditambahkan
        'status',
        'tanggal',      // kalau kamu pakai tanggal juga
        // tambahkan kolom lain jika ada
    ];

    public function pegawai()
{
    return $this->belongsTo(Pegawai::class);
}
}
