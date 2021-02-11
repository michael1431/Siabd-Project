<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\University;
use App\Subject;
use App\Program;
use App\DegreeType;
use App\Visitor;
use Session;
use App\User;

class VisitorController extends Controller
{
    public function visitorIndex()
    {
        $visitors=Visitor::all();
        return view('student.visitor_list',compact('visitors'));
    }
    public function visitorCreate()
    {
        $countries=Country::all();
        $universities=University::all();
        $degreeTypes=DegreeType::all();
        return view('student.visitor_create',compact('countries','universities','degreeTypes'));
    }
    public function visitorShow($id)
    {
        $visitor=Visitor::find($id);
        return view('student.visitor_details',compact('visitor'));
    }

    public function visitorStore(Request $request)
    {
        $ssc=$request->ssc;
        $hsc=$request->hsc;
        $hons=$request->hons;
        $masters=$request->masters;
        $others=$request->others;
        //dd($request->all());
        $visitor=new Visitor;
        $visitor->name=$request->name;
        $visitor->email=$request->email;
        $visitor->guardian=$request->guardian;
        $visitor->guardian_phone=$request->guardian_phone;
        $visitor->phone=$request->phone;
        $visitor->additional_skill=$request->additional_skill;
        $visitor->additional_skill_score=$request->additional_skill_score;
        $visitor->ssc=json_encode($ssc);
        $visitor->hsc=json_encode($hsc);
        $visitor->hons=json_encode($hons);
        $visitor->masters=json_encode($masters);
        $visitor->others=json_encode($others);
        $visitor->country_id=$request->country;
        $visitor->university_id=$request->university;
        $visitor->degree_type_id=$request->degree;
        $visitor->subject=$request->subject;
        $visitor->save();

        Session::flash('message', 'Data Stored Successfully!'); 
        Session::flash('type', 'success');
        return redirect()->route('visitor.create');

        //return redirect()->back();
    }
 
    public function change_status(){
     
        $status=Request('status');
        $visitor_id=Request('visitor_id');
        //dd($program_id);
        $visitor_list=Visitor::find($visitor_id);
        $visitor_list->status=$status;
        
        //$visitor_list->updated_by = Auth::user()->id;
        $visitor_list->update();
        Session::flash('message', 'Status Changed Successfully!'); 
        Session::flash('type', 'success'); 
        return 'test';

    // $status=$request->status;
    // $id=$request->visitor_id;
    // $visit_list=Visitor::find($id);
    // $visit_list->status=$status;
    
    // // $visit_list->updated_by = auth()->user()->id;
    // $visit_list->update();
    // Session::flash('message', 'Status Changed Successfully!'); 
    // Session::flash('type', 'success'); 
    // return 'test';
    }

    public function search_status($status){
        // return $status;
        $visitors = Visitor::where('status',$status)->get();
        
        return view('student.visitor_list',compact('visitors'));
    
    }

}