<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Photealbum;
use App\Phote;

class PhotealbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photealbums = Photealbum::paginate(10);
        return view('photealbums.index', compact('photealbums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('photealbums.create');
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
            'title'=>'required'
        ]);

        $photealbum = new Photealbum([
            'class' => $request->get('class'),
            'title' => $request->get('title'),
            'context' => $request->get('context') 
        ]);
        $photealbum->save();
        return redirect('/photealbums')->with('success', 'Photealbum saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$photes = Phote::paginate(10);
        //搜尋
        $photealbum = Photealbum::find($id);
        $photes = Phote::where('belong', '=', $photealbum->title)->paginate(10);
        return view('photes.index', compact('photes','photealbum'));
    }


    /*public function storephote(Request $request, $id)
    {
        $photealbum = Photealbum::find($id);

        $phote = new Phote([
            'belong' => $photealbum->$id,
            'name' => $request->file('file')->getClientOriginalName(),
            'file' => Storage::putFileAs('phote'.'/'.$photealbum->$class.'/'.$photealbum->$title, $request->file('file'),$request->file('file')->getClientOriginalName())
        ]);

        $phote->save();
        return redirect('/photealbums/show')->with('success', 'Phote saved!');
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photealbum = Photealbum::find($id);
        return view('photealbums.edit', compact('photealbum'));    
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
            'title'=>'required'
        ]);

        $photealbum = Photealbum::find($id);
        $photealbum->class =  $request->get('class');
        $photealbum->title = $request->get('title');
        $photealbum->context = $request->get('context');
        $photealbum->save();

        return redirect('/photealbums')->with('success', 'Photealbum updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photealbum = Photealbum::find($id);
        $photealbum->delete();
        return redirect('/photealbums')->with('success', 'Photealbum deleted!');  
    }

    /*public function destroyphote($id)
    {
        $phote = Phote::find($id);
        Storage::delete($phote->file);
        $photealbum->delete();
        return redirect('/photealbums')->with('success', 'Phote deleted!');  
    }*/
}
