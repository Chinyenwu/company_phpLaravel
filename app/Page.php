<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
	protected $fillable = [
        'class',
        'editer',
        'title',
        'context',
        'edit_time'  
        ];
}
