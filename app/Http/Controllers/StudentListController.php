<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\StudentList;
use App\User;
use App\Role;
use App\Country;
use App\University;
use App\Subject;
use App\DegreeType;
use App\Document;
use App\Program;
use Session;

class StudentListController extends Controller
{
    public function studentListCreate(Request $request){
        $program_id=Request('program_id');
        //dd($program_id);
        $countries=Country::all();
        $universities=University::all();
        $subjects=Subject::all();
        $degrees=DegreeType::all();
        $studentlists=StudentList::all();
        $programmes=[];
 
        if(Request('search')){
            $programmes=Program::where([['country_id',$request->country],['university_id',$request->university],['subject_id',$request->subject]])->get();
        }



        return view('student.create',compact('program_id','countries','universities','subjects','degrees','programmes','studentlists'));
    }

    public function update_remarks(Request $request){
        $program_id=Request('program_id');
        //dd($program_id);
        $countries=Country::all();
        $universities=University::all();
        $subjects=Subject::all();
        $degrees=DegreeType::all();
        $studentlists=StudentList::all();
 

        return view('student.update&remarks',compact('program_id','countries','universities','subjects','degrees','studentlists'));
    }
    public function studentListShow($id){
        $student=StudentList::find($id);
        return view('student.details',compact('student'));
    }
    
    public function studentListEdit($id){
        $student=StudentList::find($id);

        $countries = Country::all();
        $programs = Program::get(['id','degree']);

        $universities=University::all();
        $subjects=Subject::all();

        return view('student.edit',compact('student','universities','subjects','countries','programs'));
    }
    public function todays_schedule(){
         $students=StudentList::whereDate('schedule', date('Y-m-d'))->get();
        return view('student.todays_schedule',compact('students'));
    }

    public function userList(){
        $users=User::where('role_id','!=',2)->get();
        if(Request('role')){
            $users=User::where('role_id','=',Request('role'))->get();
        }
        $roles=Role::where('id','!=','2')->get();
        return view('users.index-user',compact('users','roles'));
    }

    public function registerUser(Request $request){
        $this->validate($request, [
            'name'=>'required|string',
            'phone'=>'required|string|min:11|unique:users',
            'email'=>'required|string|email|unique:users',
            'password'=>'required|string|min:8|confirmed',
            'role'=>'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->role_id = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();
        Session::flash('message', 'User sucessfully Added!'); 
        Session::flash('type', 'success');
        return redirect()->back();
    }

    public function studentListStatus(){
        $status = Request('status');
        //dd($program_id);
        

        $where=[['status',$status]];
        if(Auth::user()->role_id==3){
            $where=[['status',$status],['counselor_id',Auth::user()->id]];
        }
        //dd($where);
        $student_lists=StudentList::where($where)->get();
        return view('student.status_list',compact('student_lists','status'));
    }

    public function studentAssignToCounselor(){
        $student_lists=StudentList::where('counselor_id',null)->get();
        $counselors=User::where('role_id','=',3)->get();;
        return view('student.assign_list',compact('student_lists','counselors'));
    }

    public function studentAssignToCounselorStore(Request $request){
        //dd($request->student_id);
       $students=$request->student_id;
       $counselor_id=$request->counselor;
       if($students){
        foreach($students as $student){
                $student_list=StudentList::find($student);
                $student_list->counselor_id=$counselor_id;
                
                $student_list->updated_by = Auth::user()->id;
                $student_list->update();
            }
            Session::flash('message', 'Student sucessfully asigned to Counselor!'); 
            Session::flash('type', 'success'); 
        }else{
            Session::flash('message', 'Student or Counselor Not selected'); 
            Session::flash('type', 'danger'); 
        }
        return redirect()->back();
    }

    public function studentListStatusChange(){
        $status=Request('status');
        $student_id=Request('student_id');
        //dd($program_id);
        $student_list=StudentList::find($student_id);
        $student_list->status=$status;
        
        $student_list->updated_by = Auth::user()->id;
        $student_list->update();
        Session::flash('message', 'Status Changed Successfully!'); 
        Session::flash('type', 'success'); 
        return 'test';
    }

    public function studentListRemarks(Request $request, $id){
        $student_list=StudentList::find($id);
        $student_list->remarks=$request->remarks;
        $student_list->schedule=$request->schedule;
        
        $student_list->updated_by = Auth::user()->id;
        $student_list->update();
        Session::flash('message', 'Remarks Added Successfully!'); 
        Session::flash('type', 'success'); 
        return redirect()->back();
    }

    public function studentListStore(Request $request){
        //dd($request->ssc_image);
        // return $request->all();

        $ssc=$request->ssc;
        $hsc=$request->hsc;
        $hons=$request->hons;
        $masters=$request->masters;
        $others=$request->others;
        $documents=[];
        $student_list_data=$request->except(['name','email','phone','ssc','hsc','hons','masters','others','ssc_image','hsc_image','hons_image','masters_image','others_image','additional_skill_image']);
        //$user_id=2;
        if(Auth::user()->role->name=='student'){
            $user_id=Auth::user()->id;
        }else{
            $user=new User;
            $user->name=$request->name;
            $user->email=$request->email;
            $user->phone=$request->phone;
            $user->role_id=2; //student
            $user->password=Hash::make('password');
            $user->save();
            $user_id=$user->id;
        }

        $student_applied=StudentList::where([['user_id',$user_id],['program_id',$request->program_id]])->get();
        //dd(count($student_applied));
        if(count($student_applied)){
            Session::flash('message', 'You Have Already Applied For This Program!'); 
            Session::flash('type', 'warning'); 
            return redirect()->back();
        }

       
        
        $student_list_data['student_code']=time();
        $student_list_data['ssc']=json_encode($ssc);
        $student_list_data['hsc']=json_encode($hsc);
        $student_list_data['hons']=json_encode($hons);
        $student_list_data['masters']=json_encode($masters);
        $student_list_data['others']=json_encode($others);
        $student_list_data['user_id']=$user_id;
        $student_list_data['created_by']=Auth::user()->id;
       // dd($student_list_data);
        $studentCreated=StudentList::create($student_list_data);

        //upload fie
        if ($request->hasFile('ssc_image')) {
            $file = $request->file('ssc_image');
            $filename = 'ssc-'.$user_id.'-'.time() . '.' . $request->file('ssc_image')->extension();
            $filePath = 'files/documents/';
            $file->move($filePath, $filename);
            $documents['ssc_image']=$filePath.$filename;
        }
        if ($request->hasFile('hsc_image')) {
            $file = $request->file('hsc_image');
            $filename = 'hsc-'.$user_id.'-'.time() . '.' . $request->file('hsc_image')->extension();
            $filePath = 'files/documents/';
            $file->move($filePath, $filename);
            $documents['hsc_image']=$filePath.$filename;
        }
        if ($request->hasFile('hons_image')) {
            $file = $request->file('hons_image');
            $filename = 'hons-'.$user_id.'-'.time() . '.' . $request->file('hons_image')->extension();
            $filePath = 'files/documents/';
            $file->move($filePath, $filename);
            $documents['hons_image']=$filePath.$filename;
        }
        if ($request->hasFile('masters_image')) {
            $file = $request->file('masters_image');
            $filename = 'masters-'.$user_id.'-'.time() . '.' . $request->file('masters_image')->extension();
            $filePath = 'files/documents/';
            $file->move($filePath, $filename);
            $documents['masters_image']=$filePath.$filename;
        }
        if ($request->hasFile('others_image')) {
            $file = $request->file('others_image');
            $filename = 'others-'.$user_id.'-'.time() . '.' . $request->file('others_image')->extension();
            $filePath = 'files/documents/';
            $file->move($filePath, $filename);
            $documents['others_image']=$filePath.$filename;
        }
        if ($request->hasFile('additional_skill_image')) {
            $file = $request->file('additional_skill_image');
            $filename = 'additional_skill_image-'.$user_id.'-'.time() . '.' . $request->file('additional_skill_image')->extension();
            $filePath = 'files/documents/';
            $file->move($filePath, $filename);
            $documents['additional_skill_image']=$filePath.$filename;
        }
        foreach($documents as $key=>$document){
            $document_data=new Document;
            $document_data->student_id=$studentCreated->id;
            $document_data->required_by=1;
            $document_data->uploaded_by=Auth::user()->id;
            $document_data->document_title=$key; 
            $document_data->file_location=$document;
            $document_data->save();
        }

        Session::flash('message', 'Application Successfully Submitted!'); 
        Session::flash('type', 'success'); 
        return redirect()->back();
    }

    // created By Rezaul Hoque
    public function  studentInfoUpdate(Request $request, $student_details_id){
//        dd($request->all());
        $user_details = StudentList::findOrFail($student_details_id);
        $user_id=Auth::user()->id;

        $user=User::findOrfail($user_details->user_id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->role_id=2; //student
        $user->password=Hash::make('password');
        $user->save();
        $user_id=$user->id;

//      user details insert
        $user_details->f_name=$request->f_name;
        $user_details->f_profession=$request->f_profession;
        $user_details->f_contact=$request->f_contact;
        $user_details->m_name=$request->m_name;
//        $user_details->m_profession=$request->f_name;
//        $user_details->m_contact=$request->f_name;
        $user_details->passport_no=$request->passport_no;
        $user_details->nid=$request->nid;
        $user_details->b_reg_no=$request->b_reg_no;
        $user_details->phone_home=$request->phone_home;
        $user_details->present_address=$request->present_address;
        $user_details->permanent_address=$request->permanent_address;
        $user_details->program_id=$request->degree;
        

        // Done by Maikel
        // Code for Country,Degree,University,Subject

        // $program = Program::findOrfail($user_details->program_id);
        // $program->country_id = $request->country;
        // $program->degree_type_id = $request->degree;
        // $program->university_id = $request->university;
        // $program->subject_id = $request->subject;
        // $program->save();

        

        // code for country and degree




        $ssc=$request->ssc;
        $hsc=$request->hsc;
        $hons=$request->hons;
        $masters=$request->masters;
        $others=$request->others;

        $user_details->ssc = json_encode($ssc);
        $user_details->hsc = json_encode($hsc);
        $user_details->hons = json_encode($hons);
        $user_details->masters = json_encode($masters);
        $user_details->others = json_encode($others);
        $user_details->user_id = $user_id;
        $user_details->created_by = Auth::user()->id;

        $user_details->additional_skill=$request->additional_skill;
        $user_details->additional_skill_score=$request->additional_skill_score;

        $user_details->save();


//        // dd($student_list_data);
//        $studentCreated=StudentList::updated($student_list_data);

        Session::flash('message', 'Application Updated !');
        Session::flash('type', 'success');
        return redirect()->route('studentlist.edit',$student_details_id);
    }


    public function studentListDelete($id){



        //  $data =DB::table('users')
        //             ->leftJoin('social_providers','users.id', '=','social_providers.user_id')
        //             ->where('users.id', $id); 
        // DB::table('social_providers')->where('user_id', $id)->delete();                           
        // $data->delete();
        // return redirect()->route('admin.socialrevolutionaries.index')->with('success', 'Data Deleted');



         $delete = StudentList::find($id);

         DB::table('users')->where('id', $id)->delete();
         DB::table('student_lists')->where('user_id', $id)->delete();

         $delete->delete();

         Session::flash('message', 'Student List Deleted Successfully!'); 
         Session::flash('type', 'success'); 

         return redirect()->back();

    }

    //currently not work this method
    public function studentListUpdate(Request $request, $id){
        //dd($request->ssc_image);
        // return $request->all();
        $ssc=$request->ssc;
        $hsc=$request->hsc;
        $hons=$request->hons;
        $masters=$request->masters;
        $others=$request->others;
        $documents=[];
        $student_list_data=$request->except(['name','email','phone','ssc','hsc','hons','masters','others','ssc_image','hsc_image','hons_image','masters_image','others_image','additional_skill_image']);
        $user_id=Auth::user()->id;
        // if(Auth::user()->role->name=='student'){
        //     $user_id=Auth::user()->id;
        // }else{
        //     $user=User::findOrfail($id);
        //     $user->name=$request->name;
        //     $user->email=$request->email;
        //     $user->phone=$request->phone;
        //     $user->role_id=2; //student
        //     $user->password=Hash::make('password');
        //     $user->save();
        //     $user_id=$user->id;
        // }

        // $student_applied=StudentList::where([['user_id',$user_id],['program_id',$request->program_id]])->get();
        //dd(count($student_applied));
        // if(count($student_applied)){
        //     Session::flash('message', 'You Have Already Applied For This Program!'); 
        //     Session::flash('type', 'warning'); 
        //     return redirect()->back();
        // }

       
        
        $student_list_data['student_code']=time();
        // $student_list_data['ssc']=json_encode($ssc);
        // $student_list_data['hsc']=json_encode($hsc);
        // $student_list_data['hons']=json_encode($hons);
        // $student_list_data['masters']=json_encode($masters);
        // $student_list_data['others']=json_encode($others);
        // $student_list_data['user_id']=$user_id;
        $student_list_data['created_by']=Auth::user()->id;
    //    dd($student_list_data);
        $studentCreated=StudentList::find($id)->update($student_list_data);

        // upload fie
        // if ($request->hasFile('ssc_image')) {
        //     $file = $request->file('ssc_image');
        //     $filename = 'ssc-'.$user_id.'-'.time() . '.' . $request->file('ssc_image')->extension();
        //     $filePath = 'files/documents/';
        //     $file->move($filePath, $filename);
        //     $documents['ssc_image']=$filePath.$filename;
        // }
        // if ($request->hasFile('hsc_image')) {
        //     $file = $request->file('hsc_image');
        //     $filename = 'hsc-'.$user_id.'-'.time() . '.' . $request->file('hsc_image')->extension();
        //     $filePath = 'files/documents/';
        //     $file->move($filePath, $filename);
        //     $documents['hsc_image']=$filePath.$filename;
        // }
        // if ($request->hasFile('hons_image')) {
        //     $file = $request->file('hons_image');
        //     $filename = 'hons-'.$user_id.'-'.time() . '.' . $request->file('hons_image')->extension();
        //     $filePath = 'files/documents/';
        //     $file->move($filePath, $filename);
        //     $documents['hons_image']=$filePath.$filename;
        // }
        // if ($request->hasFile('masters_image')) {
        //     $file = $request->file('masters_image');
        //     $filename = 'masters-'.$user_id.'-'.time() . '.' . $request->file('masters_image')->extension();
        //     $filePath = 'files/documents/';
        //     $file->move($filePath, $filename);
        //     $documents['masters_image']=$filePath.$filename;
        // }
        // if ($request->hasFile('others_image')) {
        //     $file = $request->file('others_image');
        //     $filename = 'others-'.$user_id.'-'.time() . '.' . $request->file('others_image')->extension();
        //     $filePath = 'files/documents/';
        //     $file->move($filePath, $filename);
        //     $documents['others_image']=$filePath.$filename;
        // }
        // if ($request->hasFile('additional_skill_image')) {
        //     $file = $request->file('additional_skill_image');
        //     $filename = 'additional_skill_image-'.$user_id.'-'.time() . '.' . $request->file('additional_skill_image')->extension();
        //     $filePath = 'files/documents/';
        //     $file->move($filePath, $filename);
        //     $documents['additional_skill_image']=$filePath.$filename;
        // }
        // foreach($documents as $key=>$document){
        //     $document_data=Document::find(Auth::user()->id);
        //     $document_data->student_id=$studentCreated->id;
        //     $document_data->required_by=1;
        //     $document_data->uploaded_by=Auth::user()->id;
        //     $document_data->document_title=$key;
        //     $document_data->file_location=$document;
        //     $document_data->save();
        // }

        Session::flash('message', 'Application Updated !'); 
        Session::flash('type', 'success'); 
        return redirect()->back();
    }

    public function report_menu()
    {
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
       
        return view('student.report_menu',compact('data'));
        // return view('dashboard.index',compact('data'));
    }
}
