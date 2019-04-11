<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'penulis_id','judul','gambar','berita','dilihat','kategori','publish','data'
    ];

    protected $hidden = [
        'data'
    ];

    protected $casts = [
        'data'=> 'array'
    ];

    public function penulis(){
        return $this->belongsTo(Penulis::class, 'penulis_id', 'id');
    }

}
