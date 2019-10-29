<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Imformation_Class;

class Imformation_ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imformation_classes = Imformation_Class::all();

        return view('imformation_classes.index', compact('imformation_classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('imformation_classes.create');
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

        $imformation_classes = new Imformation_Class([
            'class' => $request->get('class')
        ]);
        $imformation_classes->save();
        return redirect('/imformation_classes')->with('success', 'Class saved!');
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
        $imformation_class = Imformation_Class::find($id);
        return view('imformation_classes.edit', compact('imformation_class')); 
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

        $imformation_class = imformation_Class::find($id);
        $imformation_class->class =  $request->get('class');
        $imformation_class->save();

        return redirect('/imformation_classes')->with('success', 'imformation_class updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imformation_class = imformation_Class::find($id);
        $imformation_class->delete();

        return redirect('/imformation_classes')->with('success', 'imformation_class deleted!');
    }
}
