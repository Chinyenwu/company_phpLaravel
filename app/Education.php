<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = [
        'name',
        'country',
        'department',
        'degree',
        'start_date',
        'end_date',
        'website',
        'remark'       
    ];
}
