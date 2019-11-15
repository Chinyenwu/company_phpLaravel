<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('person_lists/projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('person_lists/projects.create');
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
            'project_name'=>'required'
        ]);

        $project = new Project([
            'project_name' => $request->get('project_name'),
            'job' => $request->get('job'),
            'join_people' => $request->get('join_people'),
            'mechanism' => $request->get('mechanism'),
            'year' => $request->get('year'),
            'type' => $request->get('type'),
            'start_date' => $request->get('start_date'),
            'file' => $request->get('file'),
            'file_path' => $request->get('file_path'),
            'website' => $request->get('website'),
            'remark' => $request->get('remark')
        ]);
        $project->save();
        return redirect('/person_lists/projects')->with('success', 'Project saved!');
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
        $project = Project::find($id);
        return view('person_lists/projects.edit', compact('project'));
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
            'project_name'=>'required',
        ]);
            $project = Project::find($id);
            $project->project_name = $request->get('project_name');
            $project->job = $request->get('job');
            $project->join_people = $request->get('join_people');
            $project->mechanism = $request->get('mechanism');
            $project->year = $request->get('year');
            $project->type = $request->get('type');
            $project->file = $request->get('file');
            $project->file_path = $request->get('file_path');
            $project->website = $request->get('website');
            $project->remark = $request->get('remark'); 
            $project->save();

        return redirect('/person_lists/projects')->with('success', 'Project update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect('/person_lists/projects')->with('success', 'Project deleted!');
    }
}
