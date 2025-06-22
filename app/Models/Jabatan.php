<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $fillable = [
        'nama_jabatan',
        'tunjangan',
    ];
    
    public function pegawais()
{
    return $this->hasMany(Pegawai::class);
}

}
