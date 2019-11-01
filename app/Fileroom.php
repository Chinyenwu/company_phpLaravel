<?php

namespace App;

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
