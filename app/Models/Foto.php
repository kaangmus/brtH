<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $fillable = [
        'penulis_id','foto','kategori','publish'
    ];

    public function penulis(){
        return $this->belongsTo(Penulis::class, 'penulis_id', 'id');
    }

}
