<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\Country;
use App\University;
use App\Subject;
use App\DegreeType;
use Session;
class ProgramController extends Controller
{
    public function eligibilityCheck(Request $request)
    {
        //dd($request->all());
        $programmes=Program::where([['country_id',$request->country],['university_id',$request->university],['subject_id',$request->subject]])->get();
        //dd($eligibilityCheckResult);
        if(count($programmes)>0){
            Session::flash('message', 'Congratulation!'); 
            Session::flash('type', 'success'); 
        }else{
            Session::flash('message', 'Sorry! There is no Degree avalaible For you !'); 
            Session::flash('type', 'danger'); 
        }
        
        
        return view('eligibility_test_result',compact('programmes'));
    }
    public function countryList()
    {
        $countries=Program::all()->groupBy('country');
        return view('administrative.country-index',compact('countries'));
    }

    public function getUniversity()
    {
        $universities=University::where('country_id',Request('country_id'))->get();
        $returnData="<option value=''>".'Choose...'."</option>";
        foreach($universities as $university){
            $returnData.="<option value='".$university->id."'>".$university->name."</option>";
        }
        return $returnData;
    }

    public function getSubject()
    {
        $programs=Program::where('university_id',Request('university_id'))->get()->groupBy('subject_id');
        $returnData="<option value=''>".'Choose...'."</option>";
        foreach($programs as $key=>$program){
            $returnData.="<option value='".$key."'>".$program->first()->subject->name."</option>";
        }
        return $returnData;
    }
    public function getProgram()
    {
        $programs=Program::where([['university_id',Request('university_id')],['subject_id',Request('subject_id')]])->get();
        $returnData="<option value=''>".'Choose...'."</option>";
        foreach($programs as $key=>$program){
            $returnData.="<option value='".$program->id."'>".$program->degree."</option>";
        }
        return $returnData;
    }

    public function offers(Request $request)
    {
       $countries=Country::all();
       $programmes=[];
       $universities=[];
       if($request->country){
            $countries=[];
            $universities=University::where('country_id',$request->country)->get();
       }
       if($request->university){
            $countries=[];
            $universities=[];
            $programmes=Program::where('university_id',$request->university)->paginate(10);
       }
        
        
        // $subjects=Subject::all();
        // $types=DegreeType::all();
        return view('program.offers',compact('countries','universities','programmes'));
    }

    public function index()
    {
       $programmes=Program::paginate(15);
        $countries=Country::all();
        $universities=University::all();
        $subjects=Subject::all();
        $types=DegreeType::all();
        return view('program.create',compact('countries','universities','subjects','types','programmes'));
    }
    public function store(Request $request)
    {
        Program::create($request->all());
        Session::flash('message', "Prodrame Added successfully!");
        Session::flash('type', 'success');
        return \Redirect::back();
    }
    
    public function edit($id)
    {
        
        $programme=Program::findOrfail($id);
        $countries=Country::all();
        $universities=University::all();
        $subjects=Subject::all();
        $types=DegreeType::all();
        return view('program.edit',compact('countries','universities','subjects','types','programme'));
    }

    
    public function update(Request $request, $id)
    {
        $programme=Program::findOrfail($id);

        $programme->update($request->all());
        
        Session::flash('message', "Prodrame Updated successfully!");
        Session::flash('type', 'success');
        return \Redirect::back();
    }

    public function updateSubjct(){
        $programe_subjects=Program::all()->groupBy('subject_id');
        foreach($programe_subjects as $subject_name=>$subject_array){

            $programs= Program::where('subject_id',$subject_name)->get();
            $subject=Subject::where('name',$subject_name)->first();
            if($subject){
                foreach($programs as $pro){
                    $pro->subject_id=$subject->id;
                    $pro->update();
                }
            }else{
                $nsubject=new Subject;
                $nsubject->name=$subject_name;
                $nsubject->save();
               // $programs= Program::where('subject_id',$subject_name)->get();
                foreach($programs as $pro){
                    $pro->subject_id=$nsubject->id;
                    $pro->update();
                }

            }
        }
    }
    public function updateType(){
        $programes=Program::all();
        foreach($programes as $key=>$program){
            $substr=substr($program->degree,0,1);
            
           
            $degree_type=DegreeType::where('name',$substr)->first();
            if($degree_type){
               
                    $program->degree_type_id=$degree_type->id;
                    $program->update();
               
            }else{
                $ndegree_type=new DegreeType;
                $ndegree_type->name=$substr;
                $ndegree_type->status=1;
                $ndegree_type->save();
               
                    $program->degree_type_id=$ndegree_type->id;
                    $program->update();
               

            }
        }
    }
    public function subjectList()
    {
        $universities=Program::all()->groupBy('university');
        $subjects=Program::all()->groupBy('subject');
        $degrees=Program::all();
        
        return view('administrative.subject-index',compact('subjects'));
    }
    public function universityList()
    {
        $universities=Program::all()->groupBy('university');
        
        return view('administrative.university-index',compact('universities'));
    }
    public function typeList()
    {
        $types=DegreeType::all();
        
        return view('administrative.type-index',compact('types'));
    } 
    
    public function degreeTypeUpdate(Request $request, $id){
        // return $request->all();
        $type = DegreeType::findOrfail($id);
        $type-> name = $request->name;
        $status = $type->update();
        if($status){
        session()->flash('message','Degree Type Updated successfully');
        Session::flash('type', 'success'); 
        return redirect()->back();
        }
    }
}
