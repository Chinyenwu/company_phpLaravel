<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Fileroom;

class FileroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filerooms = Fileroom::paginate(10);
        return view('filerooms.index', compact('filerooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('filerooms.create');
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
            'title'=>'required',
            'class'=>'required',
        ]);

        $fileroom = new fileroom([
            'class' => $request->get('class'),
            'title' => $request->get('title'),
            'filename' => $request->get('filename'),
            'file_path' => $request->get('file_path'),
            'editer' => $request->get('editer'),
            'edit_time' => $request->get('edit_time')

        ]);
        $fileroom->save();
        return redirect('/filerooms')->with('success', 'fileroom saved!');
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
        $fileroom = Fileroom::find($id);
        return view('filerooms.edit', compact('fileroom'));  
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
            'title'=>'required',
            'class'=>'required',
        ]);
            $fileroom = Fileroom::find($id);
            $fileroom->class = $request->get('class');
            $fileroom->title = $request->get('title');
            $fileroom->filename = $request->get('filename');
            $fileroom->file_path = $request->get('file_path');
            $fileroom->editer = $request->get('editer');
            $fileroom->edit_time = $request->get('edit_time');
            $fileroom->save();

        return redirect('/filerooms')->with('success', 'fileroom update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fileroom = Fileroom::find($id);
        $fileroom->delete();

        return redirect('/filerooms')->with('success', 'fileroom deleted!');
    }
}
