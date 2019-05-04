<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atribut extends Model
{
    protected $fillable = [
        'atribut','deskripsi'
    ];

    protected $hidden = [
        'data'
    ];

    protected $casts = [
        'data'=> 'array'
    ];

}
