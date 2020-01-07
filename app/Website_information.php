<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Website_information extends Model
{
    protected $fillable = [
         'title','website_head', 'website_tail'
    ];
}
