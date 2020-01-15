<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    protected $fillable = [
    	'name',
        'advertising',
        'imformation',
        'fileroom',
        'photealbum',
        'page',
        'networklink',
        'auth',
        'register',
        'positions',
        'setup',
        'menus',
        'website_information',
        'keyword',
        'setupchange'        
    ];
}
