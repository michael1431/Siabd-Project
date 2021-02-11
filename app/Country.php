<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name','flag_image','status'];

    public function universities(){
        return $this->hasMany('App\University');
    }
}
