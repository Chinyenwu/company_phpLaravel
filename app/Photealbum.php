<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photealbum extends Model
{
    protected $fillable = [
        'class',
        'title',
        'context'      
    ];
}
