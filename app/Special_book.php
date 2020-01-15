<?php

namespace App;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Special_book extends Model
{
    protected $fillable = [
        'name',
        'chapter',
        'main_editer',
        'publish_club',
        'publish_position',
        'all_editer',
        'year',
        'date',
        'page',
        'editer_number',
        'editer_type',
        'ISSN',
        'ISI_Number',
        'file',
        'file_path',
        'website',
        'language',
        'project_name',
        'remark',
        'person'        
    ];
}

