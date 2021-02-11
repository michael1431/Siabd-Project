@extends('layouts.new_master')
@section('title','Application Form')
@push('css')
<style>
    label,.custom-select{
        font-weight: bold;
        color: black;
    }
</style>
@endpush
@section('content')
<div class="container-fluid">

     
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card" style="border:1px solid #ea1b23">
                <div class="card-header" style="background-color: #ea1b23">
                    <h4 class="text-white">Student Application Form</h4>
                </div>
                <div class="card-body">
 
                    @if(Request('program_id'))
                        <form method="post" action="{{route('studentlist.store')}}" enctype="multipart/form-data">
                            @csrf
                            {{-- <h4 class="card-title">Student Application Form</h4>                               --}}
                            <div class="form-body">
                                <fieldset style="border: 1px groove #ea1b23 !important;padding: 0 1.4em 1.4em 1.4em !important; margin: 0 0 2em 0 !important;-webkit-box-shadow:  0px 0px 0px 0px #000;box-shadow:  0px 0px 0px 0px #000;">
                                    <legend style="width:inherit;padding:0 10px;border-bottom:none;">Personal Information</legend>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="col-md-2 text-dark">Full Name</label>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" @if(Auth::user()->role->id == '2') value="{{Auth::user()->name}}" @endif id="">
                                        <input type="hidden" name="program_id" value="{{$program_id}}">
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="col-md-2 text-dark">Phone</label>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" 
                                            @if(Auth::user()->role->id == '2') value="{{Auth::user()->phone}}"@endif
                                            class="form-control" name="phone" id="">
                                        </div>
                                    </div>
                                    <label class="col-md-2 text-dark">Email</label>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="email"
                                            @if(Auth::user()->role->id == '2') value="{{Auth::user()->email}}"@endif
                                            class="form-control" name="email" id="">
                                        </div>
                                    </div> 
                                    <div class="col-md-1"></div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="col-md-2 text-dark">Father's Name</label>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control"
                                            @if(Auth::user()->role->id == '2') value="{{Auth::user()->studentList ? Auth::user()->studentList->f_name : ''}}"@endif
                                            name="f_name" id="">
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="col-md-2 text-dark">Father's Profession</label>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="f_profession" 
                                            @if(Auth::user()->role->id == '2') value="{{Auth::user()->studentList ? Auth::user()->studentList->f_profession : ''}}"@endif
                                            id="">
                                        </div>
                                    </div>
                                    <label class="col-md-2 text-dark">Father's Contact</label>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="f_contact"
                                            @if(Auth::user()->role->id == '2') value="{{Auth::user()->studentList ? Auth::user()->studentList->f_contact : ''}}"@endif id="">
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="col-md-2 text-dark">Mother's Name</label>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="m_name" 
                                            @if(Auth::user()->role->id == '2') value="{{Auth::user()->studentList ? Auth::user()->studentList->m_name : ''}}"@endif id="">
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                                {{-- <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="col-md-2 text-dark">Mother's Profession</label>
                                    <div class="col-md-3">
                                        <div class="form-group"> 
                                            <input type="text" class="form-control" name="m_profession" 
                                            @if(Auth::user()->role->id == '2') value="{{Auth::user()->studentList ? Auth::user()->studentList->m_profession : ''}}"@endif id="">
                                        </div>
                                    </div>
                                    <label class="col-md-2 text-dark">Mother's Contact</label>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="m_contact" 
                                            @if(Auth::user()->role->id == '2') value="{{Auth::user()->studentList ? Auth::user()->studentList->m_contact : ''}}"@endif id="">
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div> --}}
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="col-md-2 text-dark">Passport No</label>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="passport_no" 
                                            @if(Auth::user()->role->id == '2') value="{{Auth::user()->studentList ? Auth::user()->studentList->passport_no : ''}}"@endif id="">
                                        </div>
                                    </div>
                                    <label class="col-md-2 text-dark">NID No</label>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="nid" 
                                            @if(Auth::user()->role->id == '2') value="{{Auth::user()->studentList ? Auth::user()->studentList->nid : ''}}"@endif id="">
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="col-md-2 text-dark">BIR No</label>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="b_reg_no" 
                                            @if(Auth::user()->role->id == '2') value="{{Auth::user()->studentList ? Auth::user()->studentList->b_reg_no : ''}}"@endif id="">
                                        </div>
                                    </div>
                                    <label class="col-md-2 text-dark">Home Phone</label>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="phone_home"
                                            @if(Auth::user()->role->id == '2') value="{{Auth::user()->studentList ? Auth::user()->studentList->phone_home : ''}}"@endif 
                                            id="">
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5">
                                        <label class="text-dark">Present Address</label>
                                        <div class="form-group">
                                        <textarea name="present_address" id="" class="form-control" rows="10"> 
                                            @if(Auth::user()->role->id == '2') {{Auth::user()->studentList ? Auth::user()->studentList->present_address : ''}}@endif 
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label class="text-dark">Parmenent Address</label>
                                        <div class="form-group">
                                            <textarea name="permanent_address" id="" class="form-control" rows="10">
                                                @if(Auth::user()->role->id == '2'){{Auth::user()->studentList ? Auth::user()->studentList->permanent_address : ''}}@endif 
                                                </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                </div>
                                </fieldset>

                                <fieldset style="border: 1px groove #ea1b23 !important;padding: 0 1.4em 1.4em 1.4em !important; margin: 0 0 2em 0 !important;-webkit-box-shadow:  0px 0px 0px 0px #000;box-shadow:  0px 0px 0px 0px #000;">
                                    <legend style="width:inherit;padding:0 10px;border-bottom:none;">Educational Competence</legend>
                                        <div class="form-body">
                                            <div class="form-group row">
                                                <label class="text-dark col-md-2">Examination</label>
                                                <label class="text-dark col-md-3">Group/Major</label>
                                                <label class="text-dark col-md-1">GPA</label> 
                                                <label class="text-dark col-md-1">YEAR</label> 
                                                {{-- <label class="text-dark col-md-2">Institution</label>  --}}
                                                <label class="text-dark col-md-2">File</label> 
                                            </div>
                                            <div class="form-group row">
                                                <label class="text-dark col-md-2">SSC</label>
                                                
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" name="ssc[group]" placeholder="Group">
                                                    {{-- <div class="form-group">
                                                        <select name="ssc_group" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                            <option selected="">Choose...</option>
                                                            <option value="1">Science</option>
                                                            <option value="2">Business Studies</option>
                                                            <option value="3">Humanities</option>
                                                            <option value="4">General</option>
                                                            <option value="5">Other</option>
                                                        </select>
                                                    </div> --}}
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="number" class="form-control" name="ssc[gpa]" placeholder="GPA"  max="5" step=".01">
                                                </div>  
                                                <div class="col-md-1">
                                                    <input type="number" class="form-control" name="ssc[year]" placeholder="2010">
                                                </div> 
                                                {{-- <div class="col-md-2">
                                                    <input type="text" class="form-control" name="ssc[institution]" placeholder="IinstituteNname">
                                                </div>                                                --}}
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">MarkSheet</span>
                                                            </div>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" name="ssc_image">
                                                                <label class="custom-file-label">Upload</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>   
                                            </div>
                                            <div class="form-group row">
                                                <label class="text-dark col-md-2">HSC</label>
                                                
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" name="hsc[group]" placeholder="Group">
                                                    {{-- <div class="form-group">
                                                        <select name="hsc_group" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                            <option selected="">Choose...</option>
                                                            <option value="1">Science</option>
                                                            <option value="2">Business Studies</option>
                                                            <option value="3">Humanities</option>
                                                            <option value="4">General</option>
                                                            <option value="5">Other</option>
                                                        </select>
                                                    </div> --}}
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="number" class="form-control" name="hsc[gpa]" placeholder="GPA" max="5" step=".01">
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="number" class="form-control" name="hsc[year]" placeholder="2010">
                                                </div>
                                                {{-- <div class="col-md-2">
                                                    <input type="text" class="form-control" name="hsc[institution]" placeholder="Institute name">
                                                </div>                                                --}}
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">MarkSheet</span>
                                                            </div>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" name="hsc_image">
                                                                <label class="custom-file-label">Upload</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>  
                                                
                                                
                                            </div>
                                            <div class="form-group row">
                                                <label class="text-dark col-md-2">Hon's</label>
                                                
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" name="hons[group]"  placeholder="Major">
                                                
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="number" class="form-control" name="hons[gpa]" placeholder="CGPA" max="5" step=".01">
                                                </div> 
                                                <div class="col-md-1">
                                                    <input type="number" class="form-control" name="hons[year]" placeholder="2010">
                                                </div>  
                                                {{-- <div class="col-md-2">
                                                    <input type="text" class="form-control" name="hons[institution]" placeholder="Institute name">
                                                </div>                                                --}}
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">MarkSheet</span>
                                                            </div>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" name="hons_image">
                                                                <label class="custom-file-label">Upload</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>   
                                            </div>
                                            <div class="form-group row">
                                                <label class="text-dark col-md-2">Masters</label>
                                                
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" name="masters[group]"  requried  placeholder="Major">
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="number" class="form-control" name="masters[gpa]" placeholder="CGPA" max="5" step=".01">
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="number" class="form-control" name="masters[year]" placeholder="2010">
                                                </div>                                               
                                                {{-- <div class="col-md-2">
                                                    <input type="text" class="form-control" name="masters[institution]" placeholder="Institute Name">
                                                </div>                                                --}}
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">MarkSheet</span>
                                                            </div>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" name="masters_image">
                                                                <label class="custom-file-label">Upload</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                               
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-2">
                                                    <input type="text" class="form-control" name="others[title]" requried  placeholder="Other Examination">
                                                </div>
                                                
                                                <div class="col-md-3">
                                                    <input type="text" class="form-control" name="others[group]" requried  placeholder="Group/Major">
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="number" class="form-control" name="others[gpa]" placeholder="GRADE" max="5" step=".01">
                                                </div>
                                                <div class="col-md-1">
                                                    <input type="number" class="form-control" name="others[year]" placeholder="2010">
                                                </div>                                               
                                                {{-- <div class="col-md-2">
                                                    <input type="text" class="form-control" name="others[institution]" placeholder="Institute Name">
                                                </div> --}}
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text">MarkSheet</span>
                                                            </div>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" name="others_image">
                                                                <label class="custom-file-label">Upload</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                                               
                                            </div>
                                        </div>
                                </fieldset>
                                <fieldset style="border: 1px groove #ea1b23 !important;padding: 0 1.4em 1.4em 1.4em !important; margin: 0 0 2em 0 !important;-webkit-box-shadow:  0px 0px 0px 0px #000;box-shadow:  0px 0px 0px 0px #000;">
                                    <legend style="width:inherit;padding:0 10px;border-bottom:none;">Others Competence</legend>
                                <div class="form-body">
                                
                                    <div class="form-group row">
                                        <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" id="customControlValidation1TOFEL" name="additional_skill" value="TOFEL">
                                                    <label class="custom-control-label" for="customControlValidation1TOFEL">TOFEL</label>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" id="customControlValidation2GRE" name="additional_skill" value="GRE">
                                                    <label class="custom-control-label" for="customControlValidation2GRE">GRE</label>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <div class="form-check form-check-inline">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input" id="customControlValidation2IELTS" name="additional_skill" value="IELTS">
                                                        <label class="custom-control-label" for="customControlValidation2IELTS">IELTS</label>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input" id="customControlValidation2GRE" name="additional_skill" value="GMAT">
                                                    <label class="custom-control-label" for="customControlValidation2GMAT">GMAT</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <input type="number" class="form-control" name="additional_skill_score" placeholder="GRADE" max="9" step=".01">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">MarkSheet</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="additional_skill_image">
                                                    <label class="custom-file-label">Upload</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </fieldset>
                                                                    
                        

                            </div>
                            <div class="form-actions">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-danger" style="background-color: #ea1b23">Submit</button>
                                </div>
                            </div>
                        </form>
                    @endif
                    @if(!Request('program_id'))
                        @if(count($programmes)<=0)
                            <form method="get" action="{{route('studentlist.create')}}" enctype="multipart/form-data">
                                
                                @csrf
                                <div class="form-body">
                                    <fieldset style="border: 1px groove #ea1b23 !important;padding: 0 1.4em 1.4em 1.4em !important; margin: 0 0 2em 0 !important;-webkit-box-shadow:  0px 0px 0px 0px #000;box-shadow:  0px 0px 0px 0px #000;">
                                        <legend style="width:inherit;padding:0 10px;border-bottom:none;">Program Information</legend>
                                        
                                        <div class="form-body">
                                            <div class="form-group row">
                                                <label class="col-md-2">Select Country </label>
                                                
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <select name="country" class="custom-select mr-sm-2" id="country">
                                                            <option selected="">Choose...</option>
                                                            @forelse ($countries as $country)
                                                                <option value="{{$country->id}}">{{strtoupper($country->name)}}</option>
                                                            @empty
                                                                
                                                            @endforelse
                                                            
                                                        </select>
                                                        <input type="hidden" name="search" value="1">
                                                    </div>
                                                </div>
                                                <label class="col-md-2">Select DegreeType </label>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <select name="degree" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                            <option selected="">Choose...</option>
                                                            @forelse ($degrees as $degree)
                                                                <option value="{{$degree->id}}">{{$degree->name}}</option>
                                                            @empty

                                                            @endforelse
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-md-2">Select University </label>
                                                
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <select name="university" class="custom-select mr-sm-2" id="university">
                                                            <option selected="">Choose...</option>
                                                            @forelse ($universities as $university)
                                                                <option value="{{$university->id}}">{{$university->name}}</option>
                                                            @empty
                                                                
                                                            @endforelse
                                                        </select>
                                                    </div>
                                                </div>
                                                <label class="col-md-2">Select Subject </label>

                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <select name="subject" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                            <option selected="">Choose...</option>
                                                            @forelse ($subjects as $subject)
                                                                <option value="{{$subject->id}}">{{$subject->name}}</option>
                                                            @empty

                                                            @endforelse
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-danger" style="background-color: #ea1b23">Next</button>
                                                {{-- <button type="submit" class="btn btn-info">Next</button> --}}
                                            {{-- <button type="submit" class="nav-link">
                                                    <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                                    <span class="d-none d-lg-block">Next</span>
                                            </button> --}}
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </form>
                        @endif
                    @endif
                    @if(count($programmes)>0)
                        <fieldset style="border: 1px groove #ea1b23 !important;padding: 0 1.4em 1.4em 1.4em !important; margin: 0 0 2em 0 !important;-webkit-box-shadow:    0px 0px 0px 0px #000;box-shadow:  0px 0px 0px 0px #000;">
                            <legend style="width:inherit;padding:0 10px;border-bottom:none;">Program List</legend>
                            <div class="table-responsive">
                                <table id="multi_col_order"
                                    class="table table-striped table-bordered display no-wrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Code</th>
                                            <th>Degree</th>
                                            <th>University</th>
                                            <th>Country</th>
                                            <th>Tuition Fee</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($programmes as $key=>$programme)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$programme->program_id}}</td>
                                            <td>{{$programme->degree}}</td>
                                            <td>{{$programme->university->name}}</td>
                                            <td>{{$programme->country->name}}</td>
                                            <td>{{$programme->tuition_fee}}</td>
                                            <td><a class="btn btn-danger" style="background-color: #ea1b23" href="{{route('studentlist.create',['program_id'=>$programme->id])}}">Apply</a></td>
                                        </tr> 
                                        @empty
                                            
                                        @endforelse
                                        
                                        
                                    </tbody>
                                </table>
                            </div>
                        </fieldset>
                
                        
                    @endif
                    

        


                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row-->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>
@endsection
