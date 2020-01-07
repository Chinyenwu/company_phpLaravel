<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Keyword;

class SetupController extends Controller
{
    public function index()
    {
        return view('setup');
    }
    
    public function show(){
        
    }
}
