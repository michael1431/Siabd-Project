<?php

namespace App\Http\Controllers;

use App\DefaultUploadTitle;
use Illuminate\Http\Request;
use Session;

class DefaultUploadTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $defaultUploadTitles = DefaultUploadTitle::orderBy('id','DESC')->get();
        return view('default_upload_title.create',compact('defaultUploadTitles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|unique:default_upload_titles'
        ]);
        DefaultUploadTitle::create($request->all());
        session()->flash('message','Defaults Documents title Add successfully');
        Session::flash('type', 'success'); 
        return redirect()->route('setting.defaultUploadTitle.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DefaultUploadTitle  $defaultUploadTitle
     * @return \Illuminate\Http\Response
     */
    public function show(DefaultUploadTitle $defaultUploadTitle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DefaultUploadTitle  $defaultUploadTitle
     * @return \Illuminate\Http\Response
     */
    public function edit(DefaultUploadTitle $defaultUploadTitle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DefaultUploadTitle  $defaultUploadTitle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $titles = DefaultUploadTitle::findOrfail($id);
        $titles-> title = $request->title;
        $status = $titles->update();
        if($status){
        session()->flash('message','Title Updated successfully');
        Session::flash('type', 'success'); 
        return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DefaultUploadTitle  $defaultUploadTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy(DefaultUploadTitle $defaultUploadTitle)
    {
        //
    }
}
