<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Reserch;

class ReserchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reserches = Reserch::paginate(10);
        return view('person_lists/reserches.index', compact('reserches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('person_lists/reserches.create');
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

        $reserch = new Reserch([
            'name' => $request->get('name'),
            'brief' => $request->get('brief'),
            'all_editer' => $request->get('all_editer'),
            'year' => $request->get('year'),
            'type' => $request->get('type'),
            'start_date' => $request->get('start_date'),
            'file' => $request->get('file'),
            'file_path' => $request->get('file_path'),
            'website' => $request->get('website'),
            'language' => $request->get('language'),
            'remark' => $request->get('remark')
        ]);
        $reserch->save();
        return redirect('/person_lists/reserches')->with('success', 'Reserch saved!');
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
        $reserch = Reserch::find($id);
        return view('person_lists/reserches.edit', compact('reserch'));
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
            $reserch = Reserch::find($id);
            $reserch->name = $request->get('name');
            $reserch->brief = $request->get('brief');
            $reserch->all_editer = $request->get('all_editer');
            $reserch->year = $request->get('year');
            $reserch->type = $request->get('type');
            $reserch->start_date = $request->get('start_date');
            $reserch->file = $request->get('file');
            $reserch->file_path = $request->get('file_path');
            $reserch->website = $request->get('website');
            $reserch->remark = $request->get('remark'); 
            $reserch->save();

        return redirect('/person_lists/reserchs')->with('success', 'Reserch update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserch = Reserch::find($id);
        $reserch->delete();
        return redirect('/person_lists/reserches')->with('success', 'Reserch deleted!');
    }
}
