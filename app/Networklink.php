<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Networklink extends Model
{
    protected $fillable = [
        'networklink_class',
        'title',
        'content',
        'link',
        'way',
        'editer'    
    ];
}
