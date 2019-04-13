<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'penulis_id','judul','url','kategori','publish','dilihat','data'
    ];
    protected $casts = [
        'data' => 'array'
    ];

    public function penulis(){
        return $this->belongsTo(Penulis::class, 'penulis_id', 'id');
    }
}
