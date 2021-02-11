<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name','flag_image','status'];
    public function permissions(){
        return $this->belongsToMany('App\Permission');
    }
    // public function user(){
    //     return $this->hasMany('App\User');
    // }
}
