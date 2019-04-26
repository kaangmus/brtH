<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Reporter extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nama', 'username', 'password', 'status', 'foto'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function berita()
    {
        return $this->hasMany(Berita::class, 'reporter_id', 'id');
    }

    public function foto()
    {
        return $this->hasMany(Foto::class, 'reporter_id', 'id');
    }

    public function video()
    {
        return $this->hasMany(Video::class, 'reporter_id', 'id');
    }
    public function literasi()
    {
        return $this->hasMany(Literasi::class, 'reporter_id', 'id');
    }
}
