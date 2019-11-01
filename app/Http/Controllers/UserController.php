<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('auth.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('auth.edit', compact('user')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => [ 'max:255'],
            'last_name' => [ 'max:255'],
            'email' => [ 'email', 'max:255'],
            'staff_number' => [ 'max:255','unique:users'],
            'contact_phone' => [ 'max:255'],
            'fax' => [ 'max:255'],
            'cell_phone' => [ 'max:255'],
            'gender' => [ 'max:255'],
            'birthday' => [ 'max:255'],
            'contact_address' => [ 'max:255'],
            'class' => [ 'max:255'],
            'position' => [ 'max:255'],
        ]);

        $user = User::find($id);
        $user->first_name =  $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->staff_number = $request->get('staff_number');
        $user->contact_phone = $request->get('contact_phone');
        $user->gender = $request->get('gender');
        $user->birthday = $request->get('birthday');
        $user->contact_address = $request->get('contact_address');
        $user->class = $request->get('class');
        $user->position = $request->get('position');
        $user->save();

        return redirect('/auth')->with('success', 'member update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/auth')->with('success', 'User deleted!');
    
    }
}
