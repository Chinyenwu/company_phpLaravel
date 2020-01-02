<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SetupController extends Controller
{
    public function index()
    {
        return view('setup');
    }

    public function websiteinformation(){
    	return view('setup/website_information');
    }

    public function keyword(){
    	return view('setup/keyword');
    }

    public function prefer(){
    	return view('setup/prefer');
    }

    public function setupchange(){
    	return view('setup/setupchange');
    }

}
