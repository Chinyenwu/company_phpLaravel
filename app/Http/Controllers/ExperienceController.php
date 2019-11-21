<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Experience;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiences = Experience::paginate(10);
        return view('person_lists/experiences.index', compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('person_lists/experiences.create');
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
            'angency_name'=>'required'
        ]);

        $experience = new Experience([
            'angency_name' => $request->get('angency_name'),
            'angency' => $request->get('angency'),
            'job_name' => $request->get('job_name'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
            'website' => $request->get('website'),
            'remark' => $request->get('remark')
        ]);
        $experience->save();
        return redirect('/person_lists/experiences')->with('success', 'Experience saved!');
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
        $experience = Experience::find($id);
        return view('person_lists/experiences.edit', compact('experience'));
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
            'angency_name'=>'required',
        ]);
            $experience = Experience::find($id);
            $experience->angency_name = $request->get('angency_name');
            $experience->angency = $request->get('angency');
            $experience->job_name = $request->get('job_name');
            $experience->start_date = $request->get('start_date');
            $experience->end_date = $request->get('end_date');
            $experience->website = $request->get('website');
            $experience->remark = $request->get('remark'); 
            $experience->save();

        return redirect('/person_lists/experiences')->with('success', 'Experience update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experience = Experience::find($id);
        $experience->delete();
        return redirect('/person_lists/experiences')->with('success', 'Experience deleted!');
    }
}
