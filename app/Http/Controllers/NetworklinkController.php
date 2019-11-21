<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NetworklinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $networklinks = Networklink::all();
        return view('networklinks.index', compact('networklinks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('networklinks.create');
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
            'networklink_class'=>'required',
            'title'=>'required'
        ]);

        $contact = new Contact([
            'networklink_class' => $request->get('networklink_class'),
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'link' => $request->get('link'),
            'way' => $request->get('way')
        ]);
        $contact->save();
        return redirect('/networklinks')->with('success', 'Contact saved!');
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
        $networklink = Networklink::find($id);
        return view('networklinks.edit', compact('networklink'));   
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
            'networklink_class'=>'required',
            'title'=>'required'
        ]);

        $networklink = Networklink::find($id);
        $networklink->networklink_class =  $request->get('networklink_class');
        $networklink->title = $request->get('title');
        $networklink->content = $request->get('content');
        $networklink->link = $request->get('link');
        $networklink->way = $request->get('way');
        $networklink->save();

        return redirect('/networklinks')->with('success', 'Networklink updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $networklink = Networklink::find($id);
        $networklink->delete();
        return redirect('/networklinks')->with('success', 'Networklink deleted!');
    }
}
