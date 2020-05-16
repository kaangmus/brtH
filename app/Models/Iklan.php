<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Iklan extends Model
{
    protected $fillable = [
        'spase','foto','link','start_date','end_date','publish'
    ];
    
}
