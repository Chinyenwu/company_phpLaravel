<?php

namespace App;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'project_name',
        'job',
        'join_people',
        'mechanism',
        'year',
        'type',
        'start_date',
        'end_date',
        'file',
        'file_path',
        'website',
        'remark'       
    ];
}

