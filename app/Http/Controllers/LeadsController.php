<?php

namespace App\Http\Controllers;
use App\Imports\LeadsImport;
use App\Leads;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class LeadsController extends Controller
{
    public  function  index(){
       $leads=Leads::orderBy('id','DESC')->get();
       return  view('Leads.index',compact('leads'));
    }
    public  function  store(Request $r){
        $path = $r->file('file');
        if(!isset($path)){
            return back()->with('Please upload excel file !');
        }
        $data = Excel::import(new LeadsImport,$path);
        return redirect()->back();

    }
    public  function delete($id){
        $leads=Leads::find($id)->delete();
        return redirect()->back();
    }

    public function update(Request $r, $id){
        Leads::find($id)->insert([
            'user_id'=>Auth::user()->id,
                'name'=>$r->name,
                'phone'=>$r->phone?$r->phone:'Null',
                'email'=>$r->email?$r->email:'Null',
                'remarks'=>$r->remarks?$r->remarks:'Null',
                'updated_at'=>Carbon::now()
            ]
        );
        return redirect()->back();

    }
}
