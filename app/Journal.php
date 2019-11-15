<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $fillable = [
        'speech_name',
        'journal_name',
        'all_editer',
        'year',
        'level',
        'date',
        'book_number',
        'journal_number',
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
        'remark'       
    ];
}
