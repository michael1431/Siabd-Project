<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;
use Storage;
use Session;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::whereStatus(1)->orderBy('id','DESC')->get();
        return view('subject.create',compact('subjects'));
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
        $this->validate($request,[
            'name'=>'required|unique:subjects'
        ]);
        Subject::create([
            'name'=>$request->name,
            'status'=>1,
        ]);
        session()->flash('message','Subjects Add successfully');
        Session::flash('type', 'success'); 
        return redirect()->route('setting.subject.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $subject)
    {
        $this->validate($request,[
            'name'=>'unique:subjects'
        ]);
        $subject = Subject::findOrfail($subject);
           $subject-> name = $request->name;
           $status = $subject->update();
           if($status){
            session()->flash('message','Subjects Updated successfully');
            Session::flash('type', 'success'); 
            return redirect()->route('setting.subject.index');
           }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
