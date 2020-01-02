<?php

namespace App\Http\Controllers;

use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Adphote;
use App\Advertising;

class AdphoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adphotes = Adphote::paginate(10);
        return view('adphotes.index', compact('adphotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adphotes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $adphote = new Adphote([
            'belong' => $request->get('belong'),
            'name' => $request->file('file')->getClientOriginalName(),
            'file' => Storage::putFileAs('adphote'.'/'.$request->get('belong'), $request->file('file'),$request->file('file')->getClientOriginalName())
        ]);

        $adphote->save();
        return redirect('/adphotes')->with('success', 'adphote saved!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $adphote = Adphote::find($id);
        return Storage::download($adphote->file);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advertising = Advertising::find($id);
        return view('adphotes.edit', compact('advertising')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $advertising = Advertising::find($id);
        $adphote = new Adphote([
            'belong' => $request->get('belong'),
            'name' => $request->file('file')->getClientOriginalName(),
            'file' => Storage::putFileAs('adphote'.'/'.$request->get('belong'), $request->file('file'),$request->file('file')->getClientOriginalName())
        ]);

        $adphote->save();
        $adphotes = Adphote::where('belong', '=', $advertising->title)->paginate(10);
        return view('adphotes.index', compact('adphotes','advertising'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adphote = Adphote::find($id);
        $adphoteid = Advertising::where('title', '=', $adphote->belong)->firstOrFail();
        $advertising = Advertising::find($adphoteid->id);
        Storage::delete($adphote->file);
        $adphote->delete();
        $adphotes = Adphote::where('belong', '=', $advertising->title)->paginate(10);
        return view('adphotes.index', compact('adphotes','advertising'));
    }
}
