<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $fillable = ['name','country_id','logo_image','status'];
    
    public function country(){
        return $this->belongsTo('App\Country','country_id');
    }
}
