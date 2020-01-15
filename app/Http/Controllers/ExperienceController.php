<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Experience;
use App\User;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->get('id');
        $user = User::find($id);
        $experiences = Experience::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/experiences.index', compact(['experiences','user']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->get('id');
        $user = User::find($id);
        return view('person_lists/experiences.create',compact('user'));
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
            'remark' => $request->get('remark'),
            'person' => $request->get('person')
        ]);
        $experience->save();
        $user = User::where('name',$request->get('person')) -> first();
        $experiences = Experience::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/experiences.index', compact(['experiences','user']));
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

        $user = User::where('name',$experience->person) -> first();
        $experiences = Experience::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/experiences.index', compact(['experiences','user']));

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
        $user = User::where('name',$experience->person) -> first();
        $experiences = Experience::where('person', 'like', "%".$user->name."%")->paginate(10);
        return view('person_lists/experiences.index', compact(['experiences','user']));
    }
}
