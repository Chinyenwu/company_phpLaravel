<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'angency_name',
        'angency',
        'job_name',
        'start_date',
        'end_date',
        'website',
        'remark'       
    ];
}
