<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Imformation;

class ImformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imformations = Imformation::paginate(10);
        return view('imformations.index', compact('imformations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('imformations.create');
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
        ]);

        $imformation = new Imformation([
            'class' => $request->get('class'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
            'title' => $request->get('title'),
            'second_title' => $request->get('second_title'),
            'website' => $request->get('website'),
            'person' => $request->get('person'),
            'context' => $request->get('context')

        ]);
        $imformation->save();
        return redirect('/imformations')->with('success', 'Imformation saved!');
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
        $imformation = Imformation::find($id);
        return view('imformations.edit', compact('imformation'));  
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
        ]);
            $imformation = Imformation::find($id);
            $imformation->class = $request->get('class');
            $imformation->start_date = $request->get('start_date');
            $imformation->end_date = $request->get('end_date');
            $imformation->title = $request->get('title');
            $imformation->second_title = $request->get('second_title');
            $imformation->website = $request->get('website');
            $imformation->person = $request->get('person');
            $imformation->context = $request->get('context');
            $imformation->save();

        return redirect('/imformations')->with('success', 'Imformation update!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imformation = Imformation::find($id);
        $imformation->delete();

        return redirect('/imformations')->with('success', 'Imformation deleted!');
    }



}
