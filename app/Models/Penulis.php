<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Penulis extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nama', 'username', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function berita()
    {
        return $this->hasMany(Berita::class, 'penulis_id', 'id');
    }

    public function foto()
    {
        return $this->hasMany(Foto::class, 'penulis_id', 'id');
    }

    public function vidio()
    {
        return $this->hasMany(Vidio::class, 'penulis_id', 'id');
    }
}
