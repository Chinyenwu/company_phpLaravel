<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\User;
use App\Permission;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('auth.index', compact('users'));
    }

    public function search(Request $request)
    {
        //$imformations = Imformation::paginate(10);
        $search = $request->get('search');
        $users = User::where('name', 'like', "%".$search."%")->paginate(10);
        return view('auth.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @param
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->get('name');
        $user = User::where('name', 'like', $name )->first();
        $request->validate([
            'password' => [ 'max:255'],
            'comfirm_password' => [ 'max:255'],
        ]);

        $password =  $request->get('password');
        $comfirm_password =  $request->get('comfirm_password');
        
        if($comfirm_password == $password){
            $password =  $request->get('password');
            $user->password = Hash::make($password);
            $user->save();

            return redirect('member')->with('success', 'password update!');            
        }

        else{
            return redirect('auth/show')->with('fail', 'password not math');   
        }
        
        /*
        $request->validate([
            'password' => [ 'max:255'],
        ]);


            $user = User::find($name);
            $user->password = Hash::make($request->get('password'));
            $user->save();

            return redirect('member')->with('success', 'password update!');            
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('auth.changepassword');
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

    public function personlist(Request $request)
    {
        $id = $request->get('id');
        $user = User::find($id);
        return view('auth.personlist', compact('user')); 
    }
    /**
     * Update the specified resource in storage.
     *
     *   \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => [ 'max:255'],
            'last_name' => [ 'max:255'],
            'email' => [ 'email', 'max:255'],
            'staff_number' => [ 'max:255'],
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
        $user->fax = $request->get('fax');
        $user->cell_phone = $request->get('cell_phone');
        $user->gender = $request->get('gender');
        $user->birthday = $request->get('birthday');
        $user->contact_address = $request->get('contact_address');
        $user->permission = $request->get('permission');
        $user->class = $request->get('class');
        $user->position = $request->get('position');
        $user->save();

        return redirect('/auth/create')->with('success', 'member update!');
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
        $permission = Permission::where('name', 'like', $user->name )->first();
        $user->delete();
        $permission->delete();
        return redirect('/auth')->with('success', 'User deleted!');    
    }
}
