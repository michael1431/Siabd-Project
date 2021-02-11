@extends('layouts.new_master')
@section('title','Assessment Form')
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card" style="border:1px solid #ea1b23">
                <div class="card-header" style="background-color: #ea1b23">
                    <h4 class="text-white">Student Assessment Form</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('visitor.store')}}" enctype="multipart/form-data">
                        @csrf
                        {{-- <h4 class="card-title">Student Assessment Form</h4>                               --}}
                        <div class="form-body">
                            <fieldset style="border: 1px groove #ea1b23 !important;padding: 0 1.4em 1.4em 1.4em !important; margin: 0 0 2em 0 !important;-webkit-box-shadow:  0px 0px 0px 0px #000;box-shadow:  0px 0px 0px 0px #000;">
                                <legend style="width:inherit;padding:0 10px;border-bottom:none;">Personal Information</legend>

                                <div class="form-group row">
                                    <div class="col-md-1"></div>
                                    <label class="col-md-2 text-dark">Full Name</label>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" id="" required>
                                        {{-- <input type="hidden" name="program_id" value="{{$program_id}}"> --}}
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-1"></div>
                                </div>

                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="col-md-2 text-dark">Guardian Name</label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="guardian" id="" required>
                                    </div>
                                </div>
                                <label class="col-md-2 text-dark">Phone(Guardian)</label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="guardian_phone" id="" required>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="col-md-2 text-dark">Phone(Student)</label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone" id="" required>
                                    </div>
                                </div>
                                <label class="col-md-2 text-dark">Email</label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="">
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="col-md-2 text-dark">Country</label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select name="country" class="custom-select mr-sm-2" id="country" required>
                                            <option selected="">Choose...</option>
                                            @forelse ($countries as $country)
                                                <option value="{{$country->id}}">{{strtoupper($country->name)}}</option>
                                            @empty
                                                
                                            @endforelse
                                            
                                        </select>
                                    </div>
                                </div>
                                <label class="col-md-2 text-dark">Subject</label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                       <input type="text" name="subject" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="col-md-2 text-dark">University</label>
                                <div class="col-md-3">
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
                                <label class="col-md-2 text-dark">Degree Type</label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select name="degree" class="custom-select mr-sm-2" id="degree" required>
                                        @forelse ($degreeTypes as $degreeType)
                                            <option value="{{$degreeType->id}}">{{$degreeType->name}}</option>
                                        @empty
                                            
                                        @endforelse
                                    </select>
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
                                            <label class="text-dark col-md-2">GPA</label> 
                                            <label class="text-dark col-md-2">YEAR</label> 
                                            <label class="text-dark col-md-3">Institution</label> 
                                        </div>
                                        <div class="form-group row">
                                            <label class="text-dark col-md-2">SSC</label>
                                            
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" name="ssc[group]" placeholder="Group/Major">
                                               
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" class="form-control" name="ssc[gpa]" max="5" step=".01">
                                            </div>  
                                            <div class="col-md-2">
                                                <input type="number" class="form-control" name="ssc[year]" placeholder="2010">
                                            </div> 
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" name="ssc[institution]" placeholder="IinstituteNname">
                                            </div>                                               
                                            
                                        </div>
                                        <div class="form-group row">
                                            <label class="text-dark col-md-2">HSC</label>
                                            
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" name="hsc[group]" placeholder="Group/Major">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" class="form-control" name="hsc[gpa]" max="5" step=".01">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" class="form-control" name="hsc[year]" placeholder="2010">
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" name="hsc[institution]" placeholder="institute name">
                                            </div>                                               
                                            
                                            
                                               
                                        </div>
                                        <div class="form-group row">
                                            <label class="text-dark col-md-2">Hon's</label>
                                            
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" name="hons[group]" placeholder="Group/Major">
                                              
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" class="form-control" name="hons[gpa]" max="5" step=".01">
                                            </div> 
                                            <div class="col-md-2">
                                                <input type="number" class="form-control" name="hons[year]" placeholder="2010">
                                            </div>  
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" name="hons[institution]" placeholder="institute name">
                                            </div>                                               
                                               
                                        </div>
                                        <div class="form-group row">
                                            <label class="text-dark col-md-2">Masters</label>
                                            
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" name="masters[group]" requried  placeholder="Group/Major">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" class="form-control" name="masters[gpa]" max="5" step=".01">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" class="form-control" name="masters[year]" placeholder="2010">
                                            </div>                                               
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" name="masters[institution]" placeholder="Institute Name">
                                            </div>                                               
                                                                                          
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-2">
                                                <input type="text" class="form-control" name="others[title]" requried  placeholder="Other Examination">
                                            </div>
                                            
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" name="others[group]" requried  placeholder="Group/Major">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" class="form-control" name="others[gpa]" max="5" step=".01">
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" class="form-control" name="others[year]" placeholder="2010">
                                            </div>                                               
                                            <div class="col-md-3">
                                                <input type="text" class="form-control" name="others[institution]" placeholder="Institute Name">
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
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <input type="number" class="form-control" name="additional_skill_score" max="9" step=".01">
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
