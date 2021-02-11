<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentList extends Model
{
    protected $fillable = ['user_id','program_id','phone_home','student_code','f_name','f_profession','f_contact','m_name','m_profession','m_contact','passport_no','ssc','hsc','hons','masters','others','additional_skill','additional_skill_score','nid','b_reg_no','present_address','permanent_address','status','created_by','created_at'];

    protected $casts = [
        'ssc' => 'array',
        'hsc' => 'array',
        'hons' => 'array',
        'masters' => 'array',
        'others' => 'array',
    ];
    
    public function detail(){
        return $this->belongsTo('App\User','user_id');
    }
    public function documents(){
        return $this->hasMany('App\Document','student_id');
    }
    public function counselor(){
        return $this->belongsTo('App\User','counselor_id');
    }
    public function program(){
        return $this->belongsTo('App\Program','program_id');
    }
    
    public function user(){
        return $this->belongsTo('App\User','updated_by');
    }
}
