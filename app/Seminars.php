<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seminars extends Model
{
    protected $fillable = [
        'speech_name',
        'meeting_name',
        'position',
        'agency',
        'all_editer',
        'year',
        'type',
        'level',
        'start_date',
        'end_date',
        'publish_year',
        'editer_number',
        'editer_type',
        'ISSN',
        'ISI_Number',
        'file',
        'file_path',
        'website',
        'language',
        'project_name',
        'remark'       
    ];
}
