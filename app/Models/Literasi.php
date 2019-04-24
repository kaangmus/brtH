<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Literasi extends Model
{
    protected $fillable = [
        'reporter_id','judul','gambar','artikel','dilihat','kategori','publish','data'
    ];

    protected $hidden = [
        'data'
    ];

    protected $casts = [
        'data'=> 'array'
    ];

    public function reporter(){
        return $this->belongsTo(Reporter::class, 'reporter_id', 'id');
    }
}