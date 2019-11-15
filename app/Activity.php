<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'name',
        'title',
        'agency',
        'job_title',
        'publish_agency',
        'brief',
        'year',
        'type',
        'start_date',
        'end_date',
        'file',
        'file_path',
        'website',
        'position',
        'remark'       
    ];
}
