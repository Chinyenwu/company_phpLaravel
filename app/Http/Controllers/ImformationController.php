<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Imformation;

class ImformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imformations = Imformation::paginate(10);
        //$imformations = Imformation::where('title', 'like', '%'.$Search.'%')::paginate(10);
        return view('imformations.index', compact('imformations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('imformations.create');
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
            'title'=>'required',
            'class'=>'required',
        ]);

        $imformation = new Imformation([
            'class' => $request->get('class'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
            'title' => $request->get('title'),
            'second_title' => $request->get('second_title'),
            'website' => $request->get('website'),
            'person' => $request->get('person'),
            'context' => $request->get('context'),
            'file' => Storage::putFileAs('information'.'/'.$request->get('class'), $request->file('file') ,$request->file('file')->getClientOriginalName())
        ]);
        $imformation->save();
        return redirect('/imformations')->with('success', 'Imformation saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( )
    {
        /*$imformations = Imformation::where('title', 'like', '%'.$search.'%')
                        ->orderBy('id')
                        ->paginate(10); 
        return view('imformations.index', compact('imformations'));*///搜尋
        $imformation = Imformation::find($id);
        return Storage::download($imformation->file_path);
        /*$imformations = Imformation::paginate(10);
        return view('imformations.index', compact('imformations'));*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imformation = Imformation::find($id);
        return view('imformations.edit', compact('imformation'));  
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
            'title'=>'required',
            'class'=>'required',
        ]);
            $imformation = Imformation::find($id);
            $imformation->class = $request->get('class');
            $imformation->start_date = $request->get('start_date');
            $imformation->end_date = $request->get('end_date');
            $imformation->title = $request->get('title');
            $imformation->second_title = $request->get('second_title');
            $imformation->website = $request->get('website');
            $imformation->person = $request->get('person');
            $imformation->context = $request->get('context');
            $imformation->file = Storage::putFile('information'.'/'.$request->get('class'), $request->file('file'),$request->file('file')->getClientOriginalName());
            $imformation->save();

        return redirect('/imformations')->with('success', 'Imformation update!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imformation = Imformation::find($id);
        Storage::delete($imformation->file);
        $imformation->delete();
        return redirect('/imformations')->with('success', 'Imformation deleted!');
    }



}
