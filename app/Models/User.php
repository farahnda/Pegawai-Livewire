<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Kalau mau override tabel:
    // protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


// App\Models\User.php
public function pegawai()
{
    return $this->hasOne(Pegawai::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}



}
