<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    protected $fillable = [
        'pegawai_id',    
        'tanggal_mulai',
        'tanggal_akhir',
        'alasan',
    ]; 
    public function pegawai()
{
    return $this->belongsTo(Pegawai::class);
}
}
