<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Patent;

class PatentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patents = Patent::paginate(10);
        return view('person_lists/patents.index', compact('patents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('person_lists/patents.create');
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

        $patent = new Patent([
            'name' => $request->get('name'),
            'country' => $request->get('country'),
            'owner' => $request->get('owner'),
            'year' => $request->get('year'),
            'type' => $request->get('type'),
            'number' => $request->get('number'),
            'publish_schedule' => $request->get('publish_schedule'),
            'publish_date' => $request->get('publish_date'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
            'file' => $request->get('file'),
            'file_path' => $request->get('file_path'),
            'website' => $request->get('website'),
            'language' => $request->get('language'),
            'remark' => $request->get('remark')
        ]);
        $patent->save();
        return redirect('/person_lists/patents')->with('success', 'Patent saved!');
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
        $patent = Patent::find($id);
        return view('person_lists/patents.edit', compact('patent'));
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
            $patent = Patent::find($id);
            $patent->name = $request->get('name');
            $patent->country = $request->get('country');
            $patent->owner = $request->get('owner');
            $patent->year = $request->get('year');
            $patent->type = $request->get('type');
            $patent->number = $request->get('number');
            $patent->publish_schedule = $request->get('publish_schedule');
            $patent->publish_date = $request->get('publish_date');      
            $patent->start_date = $request->get('start_date');
            $patent->end_date = $request->get('end_date');
            $patent->file = $request->get('file');
            $patent->file_path = $request->get('file_path');
            $patent->website = $request->get('website');
            $patent->language = $request->get('language');
            $patent->remark = $request->get('remark'); 
            $patent->save();

        return redirect('/person_lists/patents')->with('success', 'Patent update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patent = Patent::find($id);
        $patent->delete();
        return redirect('/person_lists/patents')->with('success', 'Patent deleted!');
    }
}
