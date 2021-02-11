<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = ['country_id','university_id','subject_id','degree_type_id','degree','base','code','tuition_fee'];

    public function country(){
        return $this->belongsTo('App\Country','country_id');
    }
    public function university(){
        return $this->belongsTo('App\University','university_id');
    }
    public function subject(){
        return $this->belongsTo('App\Subject','subject_id');
    }
    // public function degree_type(){
    //     return $this->belongsTo('App\Program','degree_type_id','id');
    // }
}
