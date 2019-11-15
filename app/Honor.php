<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Honor extends Model
{
    protected $fillable = [
        'name',
        'agency',
        'country',
        'year',
        'type',
        'file',
        'file_path',
        'website',
        'remark'       
    ];
}

