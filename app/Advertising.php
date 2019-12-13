<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertising extends Model
{
    protected $fillable = [
    	'title',
        'interval',
        'speed',
        'height',
        'width',
        'effect'      
    ];
}
