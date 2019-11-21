<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Activity;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::paginate(10);
        return view('person_lists/activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('person_lists/activities.create');
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

        $activity = new Activity([
            'name' => $request->get('name'),
            'title' => $request->get('title'),
            'agency' => $request->get('agency'),
            'job_title' => $request->get('job_title'),
            'publish_agency' => $request->get('publish_agency'),
            'brief' => $request->get('brief'),
            'year' => $request->get('year'),
            'type' => $request->get('type'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
            'file' => $request->get('file'),
            'file_path' => $request->get('file_path'),
            'website' => $request->get('website'),
            'position' => $request->get('position'),
            'remark' => $request->get('remark')
        ]);
        $activity->save();
        return redirect('/person_lists/activities')->with('success', 'Activity saved!');
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
        $activity = Activity::find($id);
        return view('person_lists/activities.edit', compact('activity')); 
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
            $activity = Activity::find($id);
            $activity->name = $request->get('name');
            $activity->title = $request->get('title');
            $activity->agency = $request->get('agency');
            $activity->job_title = $request->get('job_title');
            $activity->publish_agency = $request->get('publish_agency');
            $activity->brief = $request->get('brief');
            $activity->year = $request->get('year');
            $activity->type = $request->get('type');
            $activity->start_date = $request->get('start_date');
            $activity->end_date = $request->get('end_date');
            $activity->file = $request->get('file');
            $activity->file_path = $request->get('file_path');
            $activity->website = $request->get('website');
            $activity->position = $request->get('position');
            $activity->remark = $request->get('remark'); 
            $activity->save();

        return redirect('/person_lists/activities')->with('success', 'Activity update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity = Activity::find($id);
        $activity->delete();
        return redirect('/person_lists/activities')->with('success', 'Activity deleted!');
    }
}
