<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imformation extends Model
{
	protected $fillable = [
        'class',
        'start_date',
        'end_date',
        'title',
        'second_title',
        'website',
        'person',
        'context'  
        ];
}
