<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'album','deskripsi','reporter_id','slug','kategori','publish','status'
    ];
    
    public function reporter(){
        return $this->belongsTo(Reporter::class, 'reporter_id', 'id');
    }
    public function foto()
    {
        return $this->hasMany(Foto::class, 'album_id', 'id');
    }
}
