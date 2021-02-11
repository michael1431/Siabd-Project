<?php
use App\Role;

function checkPermission($role_id,$permission_id){
    $role=Role::find($role_id);
    
    foreach($role->permissions as $permission){
        if($permission->id==$permission_id){
            return true;
        }
    }
    return false;
}
function hasPermission($role_id,$permission_id){
    foreach(Auth::user()->role->permissions as $permission){
        if($permission->name==$page_name){
            return true;
        }
    }
    return false;
}
