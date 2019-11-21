<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
use App\Journal;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $journals = Journal::paginate(10);
        return view('person_lists/journals.index', compact('journals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('person_lists/journals.create');
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
            'speech_name'=>'required'
        ]);

        $journal = new Journal([
            'speech_name' => $request->get('speech_name'),
            'journal_name' => $request->get('journal_name'),
            'all_editer' => $request->get('all_editer'),
            'year' => $request->get('year'),
            'level' => $request->get('level'),
            'date' => $request->get('date'),
            'book_number' => $request->get('book_number'),
            'journal_number' => $request->get('journal_number'),
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
        $journal->save();
        return redirect('/person_lists/journals')->with('success', 'Journal saved!');
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
        $journal = Journal::find($id);
        return view('person_lists/journals.edit', compact('journal'));
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
            'speech_name'=>'required',
        ]);
            $journal = Journal::find($id);
            $journal->speech_name = $request->get('speech_name');
            $journal->journal_name = $request->get('journal_name');
            $journal->all_editer = $request->get('all_editer');
            $journal->year = $request->get('year');
            $journal->level = $request->get('level');
            $journal->date = $request->get('date');
            $journal->book_number = $request->get('book_number');
            $journal->journal_number = $request->get('journal_number');
            $journal->page = $request->get('page');
            $journal->editer_number = $request->get('editer_number');
            $journal->editer_type = $request->get('editer_type');
            $journal->ISSN = $request->get('ISSN');
            $journal->ISI_Number = $request->get('ISI_Number');
            $journal->file = $request->get('file');
            $journal->file_path = $request->get('file_path');
            $journal->website = $request->get('website');
            $journal->language = $request->get('language');
            $journal->project_name = $request->get('project_name');
            $journal->remark = $request->get('remark'); 
            $journal->save();

        return redirect('/person_lists/journals')->with('success', 'Journal update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $journal = Journal::find($id);
        $journal->delete();
        return redirect('/person_lists/journals')->with('success', 'Journal deleted!');
    }
}
