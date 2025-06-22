<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawais'; 

    protected $fillable = [
        'nip', 'nama', 'jabatan_id', 'unit_kerja_id', 'gaji', 'user_id',
    ];
    public function jabatan()
{
    return $this->belongsTo(Jabatan::class);
}

// app/Models/Pegawai.php

public function absensis()
{
    return $this->hasMany(\App\Models\Absensi::class);
}


public function unitKerja()
{
    return $this->belongsTo(UnitKerja::class);
}

// public function absensi()
// {
//     return $this->hasMany(Absensi::class);
// }

public function cuti()
{
    return $this->hasMany(Cuti::class);
}
}
