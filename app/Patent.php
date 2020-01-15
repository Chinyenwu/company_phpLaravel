<?php

namespace App;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Patent extends Model
{
    protected $fillable = [
        'name',
        'country',
        'owner',
        'year',
        'type',
        'number',
        'publish_schedule',
        'publish_date',
        'start_date',
        'end_date',
        'file',
        'file_path',
        'website',
        'language',
        'remark',
        'person'        
    ];
}

