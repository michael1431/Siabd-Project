<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $casts = [
        'ssc' => 'array',
        'hsc' => 'array',
        'hons' => 'array',
        'masters' => 'array',
        'others' => 'array',
    ];
    public function country(){
        return $this->belongsTo('App\Country','country_id');
    }
    public function university(){
        return $this->belongsTo('App\University','university_id');
    }
    public function degreeType(){
        return $this->belongsTo('App\DegreeType','degree_type_id');
    }
}
