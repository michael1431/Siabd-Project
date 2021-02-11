<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param $per
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //dd($request->user());
        if(Auth::check()){
            $route_name=$request->route()->getName();
                $role = $request->user()->role;
                // foreach($roles as $role){
                    foreach($role->permissions as $permission){
                        if($permission->name === $route_name){
                            return $next($request);
                        }
                    }
                // }

                return $next($request);
            //abort(403);
        }

    }
}