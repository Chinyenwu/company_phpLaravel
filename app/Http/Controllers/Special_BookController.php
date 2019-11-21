<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Special_book;

class Special_BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $special_books = Special_book::paginate(10);
        return view('person_lists/special_books.index', compact('special_books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('person_lists/special_books.create');
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

        $special_book = new Special_book([
            'name' => $request->get('name'),
            'chapter' => $request->get('chapter'),
            'main_editer' => $request->get('main_editer'),
            'publish_club' => $request->get('publish_club'),
            'publish_position' => $request->get('publish_position'),
            'all_editer' => $request->get('all_editer'),
            'year' => $request->get('year'),
            'date' => $request->get('date'),
            'page' => $request->get('page'),
            'editer_number' => $request->get('editer_number'),
            'editer_type' => $request->get('editer_type'),
            'ISSN' => $request->get('ISSN'),
            'ISI_Number' => $request->get('ISI_Number'),
            'file' => $request->get('file'),
            'file_path' => $request->get('file_path'),
            'website' => $request->get('website'),
            'language' => $request->get('language'),
            'project_name' => $request->get('project_name'),
            'remark' => $request->get('remark')
        ]);
        $special_book->save();
        return redirect('/person_lists/special_books')->with('success', 'Special_book saved!');
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
        $special_book = Special_book::find($id);
        return view('person_lists/special_books.edit', compact('special_book'));
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
            $special_book = Special_book::find($id);
            $special_book->name = $request->get('name');
            $special_book->chapter = $request->get('chapter');
            $special_book->main_editer = $request->get('main_editer');
            $special_book->publish_club = $request->get('publish_club');
            $special_book->publish_position = $request->get('publish_position');
            $special_book->all_editer = $request->get('all_editer');
            $special_book->year = $request->get('year');
            $special_book->date = $request->get('date');
            $special_book->page = $request->get('page');
            $special_book->editer_number = $request->get('editer_number');
            $special_book->editer_type = $request->get('editer_type');
            $special_book->ISSN = $request->get('ISSN');
            $special_book->ISI_Number = $request->get('ISI_Number');
            $special_book->file = $request->get('file');
            $special_book->file_path = $request->get('file_path');
            $special_book->website = $request->get('website');
            $special_book->language = $request->get('language');
            $special_book->project_name = $request->get('project_name');
            $special_book->remark = $request->get('remark'); 
            $special_book->save();

        return redirect('/person_lists/special_books')->with('success', 'Special_book update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $special_book = Special_book::find($id);
        $special_book->delete();
        return redirect('/person_lists/special_books')->with('success', 'Special_book deleted!');
    }
}
