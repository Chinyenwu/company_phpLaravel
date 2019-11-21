<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Education;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educations = Education::paginate(10);
        return view('person_lists/educations.index', compact('educations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('person_lists/educations.create');
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

        $education = new Education([
            'name' => $request->get('name'),
            'country' => $request->get('country'),
            'department' => $request->get('department'),
            'degree' => $request->get('degree'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
            'website' => $request->get('website'),
            'remark' => $request->get('remark')
        ]);
        $education->save();
        return redirect('/person_lists/educations')->with('success', 'Education saved!');
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
        $education = Education::find($id);
        return view('person_lists/educations.edit', compact('education')); 
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
            $education = Education::find($id);
            $education->name = $request->get('name');
            $education->country = $request->get('country');
            $education->department = $request->get('department');
            $education->degree = $request->get('degree');
            $education->start_date = $request->get('start_date');
            $education->end_date = $request->get('end_date');
            $education->website = $request->get('website');
            $education->remark = $request->get('remark'); 
            $education->save();

        return redirect('/person_lists/educations')->with('success', 'Education update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $education = Education::find($id);
        $education ->delete();
        return redirect('/person_lists/educations')->with('success', 'Education deleted!');
    }
}
