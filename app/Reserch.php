<?php

namespace App;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Reserch extends Model
{
    protected $fillable = [
        'name',
        'brief',
        'all_editer',
        'year',
        'type',
        'start_date',
        'file',
        'file_path',
        'website',
        'language',
        'remark'       
    ];
}

