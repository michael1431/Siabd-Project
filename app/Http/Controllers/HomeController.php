<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\Country;
use App\DegreeType;
use App\University;
use App\Subject;
use Auth;
use App\StudentList;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //dd('heloo');
        $countries=Country::all();
        $universities=University::all();
        $subjects=Subject::all();
        $degrees=DegreeType::all();
        //dd($countries);
        return view('home',compact('countries','universities','subjects','degrees'));
    }
    public function check()
    {
        //dd('heloo');
        $countries=Country::all();
        $universities=University::all();
        $subjects=Subject::all();
        $degrees=DegreeType::all();
       
        return view('home',compact('countries','universities','subjects','degrees'));
    }
    
    public function dashboard()
    {
        $data = [];
        if(Auth::user()->role_id==2){
            // return redirect()->route('home');
        }
        if(Auth::user()->role_id==1){
            $data['new_lead']=StudentList::where('status','new_leads')->get()->count();
            
            $data['scheduled']=StudentList::where('status','scheduled')->get()->count();  
            $data['not_interested']=StudentList::where('status','not_interested')->get()->count();  
            $data['not_answered']=StudentList::where('status','not_answered')->get()->count();  
            $data['interested']=StudentList::where('status','interested')->get()->count();  
        }
        if(Auth::user()->role_id==3){
            $data['new_lead']=StudentList::where([['status','new_leads'],['counselor_id',Auth::user()->id]])->get()->count();
            
            $data['scheduled']=StudentList::where([['status','scheduled'],['counselor_id',Auth::user()->id]])->get()->count();  
            $data['not_interested']=StudentList::where([['status','not_interested'],['counselor_id',Auth::user()->id]])->get()->count();  
            $data['not_answered']=StudentList::where([['status','not_answered'],['counselor_id',Auth::user()->id]])->get()->count();  
            $data['interested']=StudentList::where([['status','interested'],['counselor_id',Auth::user()->id]])->get()->count();  
        }
       
        return view('dashboard.index2',compact('data'));
        // return view('dashboard.index',compact('data'));
    }
}
