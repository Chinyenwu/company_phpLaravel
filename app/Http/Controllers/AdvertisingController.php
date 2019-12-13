<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Advertising;

class AdvertisingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advertisings = Advertising::paginate(10);
        return view('advertisings.index', compact('advertisings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('advertisings.create');
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
            'title'=>'required'
        ]);

        $advertising = new Advertising([
            'title' => $request->get('title'),
            'interval' => $request->get('interval'),
            'speed' => $request->get('speed'),
            'height' => $request->get('height'),
            'width' => $request->get('width'),
            'effect' => $request->get('effect') 
        ]);
        $advertising->save();
        return redirect('/advertisings')->with('success', 'Advertising saved!');
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
        $advertising = Advertising::find($id);
        return view('advertisings.edit', compact('advertising'));  
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
            'title'=>'required'
        ]);

        $advertising = Advertising::find($id);
        $advertising->title =  $request->get('title');
        $advertising->interval = $request->get('interval');
        $advertising->speed = $request->get('speed');
        $advertising->height =  $request->get('height');
        $advertising->width = $request->get('width');
        $advertising->effect = $request->get('effect');
        $advertising->save();

        return redirect('/advertisings')->with('success', 'Advertising updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advertising = Advertising::find($id);
        $advertising->delete();
        return redirect('/advertisings')->with('success', 'Advertising deleted!'); 
    }
}
