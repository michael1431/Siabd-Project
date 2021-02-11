<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CostType;
use Session;

class CostTypeController extends Controller
{
    public function index()
    {
        $types = CostType::whereStatus(1)->orderBy('id','DESC')->get();
        return view('cost-type.create',compact('types'));
    }

    public function edit($id)
    {
        $acc_type=CostType::find($id);
        $types = CostType::whereStatus(1)->orderBy('id','DESC')->get();
        
        return view('cost-type.edit',compact('types','acc_type'));
    }


    public function store(Request $request)
    {
        //dd($request->all());
        $this->validate($request,[
            'name'=>'required|unique:cost_types'
        ]);
        CostType::create($request->all());
        session()->flash('message','Accounts Head Add successfully');
        Session::flash('type', 'success'); 
        return redirect()->route('account.head.index');
    }

    public function update($id,Request $request)
    {
        $cost=CostType::find($id);
        $cost->update($request->all());
        session()->flash('message','Accounts Head Updated successfully');
        Session::flash('type', 'success'); 
        return redirect()->route('account.head.index');
    }
    public function delete($id,Request $request)
    {
        $cost=CostType::find($id);
        $cost->status=0;
        $cost->update();
        session()->flash('message','Accounts Head Deleted successfully');
        Session::flash('type', 'success'); 
        return redirect()->route('account.head.index');
    }
}
