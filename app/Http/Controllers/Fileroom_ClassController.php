<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Fileroom_Class;

class Fileroom_ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fileroom_classes = Fileroom_Class::paginate(10);

        return view('fileroom_classes.index', compact('fileroom_classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fileroom_classes.create');
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
            'class'=>'required',
        ]);

        $fileroom_classes = new Fileroom_Class([
            'class' => $request->get('class')
        ]);
        $fileroom_classes->save();
        return redirect('/fileroom_classes')->with('success', 'Class saved!');
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
        $fileroom_class = Fileroom_Class::find($id);
        return view('fileroom_classes.edit', compact('fileroom_class')); 
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
            'class'=>'required',
        ]);

        $fileroom_class = fileroom_Class::find($id);
        $fileroom_class->class =  $request->get('class');
        $fileroom_class->save();

        return redirect('/fileroom_classes')->with('success', 'fileroom_class updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fileroom_class = fileroom_Class::find($id);
        $fileroom_class->delete();

        return redirect('/fileroom_classes')->with('success', 'fileroom_class deleted!');
    }
}
