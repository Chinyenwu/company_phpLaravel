<?php

namespace App\Http\Controllers;

use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Photealbum;
use App\Phote;

class PhoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photes = Phote::paginate(10);
        return view('photes.index', compact('photes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('photes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $phote = new Phote([
            'belong' => $request->get('belong'),
            'name' => $request->file('file')->getClientOriginalName(),
            'file' => Storage::putFileAs('phote'.'/'.$request->get('belong'), $request->file('file'),$request->file('file')->getClientOriginalName())
        ]);

        $phote->save();
        return redirect('/photes')->with('success', 'Phote saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $phote = Phote::find($id);
        return Storage::download($phote->file);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phote = Phote::find($id);
        return view('phones.edit', compact('phote')); 
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
            $phote = Phote::find($id);
            $phote->belong = $request->get('belong');
            $phote->name = $request->file('file')->getClientOriginalName();
            $phote->file = Storage::putFileAs('phote'.'/'.$request->get('belong'), $request->file('file'),$request->file('file')->getClientOriginalName());
            $phote->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phote = Phote::find($id);
        Storage::delete($phote->file);
        $phote->delete();
        return redirect('/photes')->with('success', 'phote deleted!');
    }

}
