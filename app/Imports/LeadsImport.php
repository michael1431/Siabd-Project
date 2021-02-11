<?php

namespace App\Imports;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use App\Leads;
use App\User;
use App\Program;
use App\StudentList;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToCollection;

class LeadsImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {

        foreach($collection as $key=>$value){

            //User::insert(['name'=>$value[0],'phone'=>$value[1]?$value[1]:'Null','email'=>$value[2]?$value[2]:'Null','created_at'=>Carbon::now()]);
            if($key>0){
                //dd($value[0]);
                //Leads::insert(['user_id'=>Auth::user()->id,'name'=>$value[0],'phone'=>$value[1]?$value[1]:'Null','email'=>$value[2]?$value[2]:'Null','remarks'=>$value[3]?$value[3]:'Null','created_at'=>Carbon::now()]);\
                
                //Code by Maikel
                if(!isset(User::where('phone',$value[1])->first()->id) && !isset(User::where('email',$value[2])->first()->id)){
                    $user = User::create(['name'=>$value[0],'phone'=>$value[1]?$value[1]:'Null','email'=>$value[2]?$value[2]:'Null','role_id'=>2]);
                    //$program = Program::create();
                    StudentList::create(['user_id'=>$user->id,'status'=>'new_leads']);
                }else{
                    session()->flash('error', 'User created already');
                }
                
                
            }
        }
    }
}
