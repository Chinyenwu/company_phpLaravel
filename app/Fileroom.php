<?php

namespace App;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Fileroom extends Model
{
	protected $fillable = [
        'class',
        'title',
        'filename',
        'file_path',
        'editer',
        'edit_time'  
        ];
}

