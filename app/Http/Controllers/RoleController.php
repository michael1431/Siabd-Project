<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use Illuminate\Support\Facades\Route;
use DB;
use Illuminate\Support\Str;
use Session;

class RoleController extends Controller
{
    public function index()
    {
        // $routeName=[];
        // $allRoutes = Route::getRoutes();
        // //dd($allRoutes->nameList);
        // foreach($allRoutes as $key=>$route){
        //     if($route->getName()){
        //          $routeName[$key]['name']=$route->getName();
        //          $name=str_replace('.',' ',$route->getName());
        //          $group=explode(" ",$name);
        //          $routeName[$key]['lebel']=$name;
        //          $routeName[$key]['label_group']=$group[0];
        //     }   
        // }
        // //dd($routeName);
        // DB::table('permissions')->insert($routeName);

        $permissions=Permission::all();
        $roles=Role::all();
        return view('users.view-role',compact('roles','permissions'));
    }
    public function create()
    {
        $permission_groups=Permission::all()->groupBy('label_group');
        return view('users.add-role',compact('permission_groups'));
    }
    
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|unique:roles',
        ]);
        $role=new Role;
        $role->name=$request->name;
        $role->save();

        $role->permissions()->attach($request->asignpermission);
        Session::flash('message', 'Role sucessfully added and Now please Permission in that Role!'); 
        Session::flash('type', 'success'); 
        return redirect()->route('user.role.index');
    }

    public function edit($id)
    {
        $permission_groups=Permission::all()->groupBy('label_group');
        $role=Role::with('permissions')->find($id);
        $roles=Role::all();
        //return $role->permissions->toArray();
        return view('users.edit-role',compact('roles','role','permission_groups'));
    }
    public function update(Request $request,$id)
    {
        $role=Role::with('permissions')->find($id);
        $role->name=$request->name;
        $role->permissions()->sync($request->asignpermission);
        $role->update();
        Session::flash('message', 'Role sucessfully Updated With Permissions!'); 
        Session::flash('type', 'success'); 
        return redirect()->route('user.role.index');
    }

}
