<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Honor;

class HonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $honors = Honor::all();
        return view('person_lists/honors.index', compact('honors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('person_lists/honors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);

        $honor = new Honor([
            'name' => $request->get('name'),
            'agency' => $request->get('agency'),
            'country' => $request->get('country'),
            'year' => $request->get('year'),
            'type' => $request->get('type'),
            'file' => $request->get('file'),
            'file_path' => $request->get('file_path'),
            'website' => $request->get('website'),
            'remark' => $request->get('remark')
        ]);
        $honor->save();
        return redirect('/person_lists/honors')->with('success', 'Honor saved!');
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
        $honor = Honor::find($id);
        return view('person_lists/honors.edit', compact('honor'));
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
            'name'=>'required',
        ]);
            $honor = Honor::find($id);
            $honor->name = $request->get('name');
            $honor->agency = $request->get('agency');
            $honor->country = $request->get('country');
            $honor->year = $request->get('year');
            $honor->type = $request->get('type');
            $honor->file = $request->get('file');
            $honor->file_path = $request->get('file_path');
            $honor->website = $request->get('website');
            $honor->remark = $request->get('remark'); 
            $honor->save();

        return redirect('/person_lists/honors')->with('success', 'Honor update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $honor = Honor::find($id);
        $honor->delete();
        return redirect('/person_lists/honors')->with('success', 'Honor deleted!');
    }
}
