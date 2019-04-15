<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'reporter_id','judul','url','kategori','publish','dilihat','data'
    ];
    protected $casts = [
        'data' => 'array'
    ];

    public function reporter(){
        return $this->belongsTo(Reporter::class, 'reporter_id', 'id');
    }
}
