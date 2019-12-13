<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phote extends Model
{
    protected $fillable = [
        'belong',
        'name',
        'file'      
    ];
}
