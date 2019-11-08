<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Validator,Redirect,Response;
use App\User;

class MemberController extends Controller
{
    public function index()
    {
        return view('member');
    }
}
