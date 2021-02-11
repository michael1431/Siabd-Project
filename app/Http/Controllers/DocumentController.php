<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = New Document;
        $title->student_id = $request->student_id;
        $title->document_title = $request->document_title;

        $title->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $s_id)
    {
        // return $request->all();
        $doc = Document::findOrfail($id);
        if ($request->hasFile('file_location')) {
            $file = $request->file('file_location');
            $filename = 'file_location'.$s_id.'-'.time() . '.' . $request->file('file_location')->extension();
            $filePath = 'files/documents/';
            $file->move($filePath, $filename);
            $doc->file_location=$filePath.$filename;
        }

        $status = $doc->save();
        if($status){

            return redirect()->back();
        }
        else{
            return 'Not';
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
}
