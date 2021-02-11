@extends('layouts.new_master')
@section('title','Application Form')
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->

    <div class="text-primary" style="margin-bottom: 10px;">

      <a href="{{ url('/student_list_new?status=new_leads') }}" class="btn btn-success">Back</a>
    
    </div>

    <div class="row">
      <div class="col-xl-12">
          <div class="card" style="border:1px solid #ea1b23">
              <div class="card-header" style="background-color: #ea1b23">
                  <h4 class="text-white">Student Details</h4>
              </div>
              <div class="card-body">


                  <form method="post" action="{{route('studentlist.update',$student->id )}}" enctype="multipart/form-data">
                      @csrf
                      <h4 class="card-title">Update Info</h4>                              
                      <div class="form-body">
                          <fieldset style="border: 1px groove #ea1b23 !important;padding: 0 1.4em 1.4em 1.4em !important; margin: 0 0 2em 0 !important;-webkit-box-shadow:  0px 0px 0px 0px #000;box-shadow:  0px 0px 0px 0px #000;">
                              <legend style="width:inherit;padding:0 10px;border-bottom:none;">Personal Information</legend>
                          <div class="form-group row">
                              <div class="col-md-1"></div>
                              <label class="col-md-2 text-dark">Full Name</label>
                              <div class="col-md-8">
                                  <div class="form-group">
                                  <input type="text" class="form-control" name="name" id="" value="{{$student->detail->name}}" >
                                  </div>
                              </div>
                              <div class="col-md-1"></div>
                          </div>
                          <div class="form-group row">
                              <div class="col-md-1"></div>
                              <label class="col-md-2 text-dark">Phone</label>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <input type="text" class="form-control" name="phone" id="" value="{{$student->detail->phone}}" >
                                  </div>
                              </div>
                              <label class="col-md-2 text-dark">Email</label>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <input type="email" class="form-control" name="email" id="" value="{{$student->detail->email}}" >
                                  </div>
                              </div>
                              <div class="col-md-1"></div>
                          </div>

                          <div class="form-group row">
                              <div class="col-md-1"></div>
                              <label class="col-md-2 text-dark">Father's Name</label>
                              <div class="col-md-8">
                                  <div class="form-group">
                                      <input type="text" class="form-control" name="f_name" id="" value="{{$student->f_name}}" >
                                  </div>
                              </div>
                              <div class="col-md-1"></div>
                          </div>
                          <div class="form-group row">
                              <div class="col-md-1"></div>
                              <label class="col-md-2 text-dark">Father's Profession</label>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <input type="text" class="form-control" name="f_profession" id="" value="{{$student->f_profession}}" >
                                  </div>
                              </div>
                              <label class="col-md-2 text-dark">Father's Contact</label>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <input type="text" class="form-control" name="f_contact" id="" value="{{$student->f_contact}}" >
                                  </div>
                              </div>
                              <div class="col-md-1"></div>
                          </div>
                          <div class="form-group row">
                              <div class="col-md-1"></div>
                              <label class="col-md-2 text-dark">Mother's Name</label>
                              <div class="col-md-8">
                                  <div class="form-group">
                                      <input type="text" class="form-control" name="m_name" id="" value="{{$student->m_name}}" >
                                  </div>
                              </div>
                              <div class="col-md-1"></div>
                          </div>
                          {{-- <div class="form-group row">
                              <div class="col-md-1"></div>
                              <label class="col-md-2 text-dark">Mother's Profession</label>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <input type="text" class="form-control" name="m_profession" id="" value="{{$student->m_profession}}" >
                                  </div>
                              </div>
                              <label class="col-md-2 text-dark">Mother's Contact</label>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <input type="text" class="form-control" name="m_contact" id="" value="{{$student->m_contact}}" >
                                  </div>
                              </div>
                              <div class="col-md-1"></div>
                          </div> --}}
                          <div class="form-group row">
                              <div class="col-md-1"></div>
                              <label class="col-md-2 text-dark">Passport No</label>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <input type="text" class="form-control" name="passport_no" id="" value="{{$student->passport_no}}" >
                                  </div>
                              </div>
                              <label class="col-md-2 text-dark">NID No</label>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <input type="text" class="form-control" name="nid" id="" value="{{$student->nid}}" >
                                  </div>
                              </div>
                              <div class="col-md-1"></div>
                          </div>
                          <div class="form-group row">
                              <div class="col-md-1"></div>
                              <label class="col-md-2 text-dark">BIR No</label>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <input type="text" class="form-control" name="b_reg_no" id="" value="{{$student->b_reg_no}}" >
                                  </div>
                              </div>
                              <label class="col-md-2 text-dark">Home Phone</label>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <input type="text" class="form-control" name="phone_home" id="" value="{{$student->phone_home}}" >
                                  </div>
                              </div>
                              <div class="col-md-1"></div>
                          </div>
                          <div class="form-group row">
                              <div class="col-md-1"></div>
                              <div class="col-md-5">
                                  <label class="text-dark">Present Address</label>
                                  <div class="form-group">
                                     <textarea name="present_address" id="" class="form-control" rows="10">{{$student->present_address}}</textarea>
                                  </div>
                              </div>
                              <div class="col-md-5">
                                  <label class="text-dark">Parmenent Address</label>
                                  <div class="form-group">
                                      <textarea name="permanent_address" id="" class="form-control" rows="10">{{$student->permanent_address}}</textarea>
                                  </div>
                              </div>
                              <div class="col-md-1"></div>
                          </div>
                          </fieldset>


                          
                          <fieldset style="border: 1px groove #ea1b23 !important;padding: 0 1.4em 1.4em 1.4em !important; margin: 0 0 2em 0 !important;-webkit-box-shadow:  0px 0px 0px 0px #000;box-shadow:  0px 0px 0px 0px #000;">
                            <legend style="width:inherit;padding:0 10px;border-bottom:none;">University Information</legend>
                              
                          <div class="form-group row">


                               <label class="col-md-2">Select Country </label>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                   <select id ="country" name="country" class="custom-select mr-sm-2"
                                                        id="inlineFormCustomSelect">
                                                    <option selected="" value="">Choose...</option>

                                                     @forelse ($countries as $country)
                                                   <option value="{{$country->id}}" @if(isset($student->program->country) && ($student->program->country->id == $country->id)) selected @endif >{{strtoupper($country->name)}}
                                      
                                                {{--{{optional(optional($student->program)->university)->name}}--}}
                                                

                                                     </option>
                                                     @empty

                                                    @endforelse
                                     </select>
                                </div>
                            </div>

                               <label class="col-md-2">Select Degree </label>
                          
                            <div class="col-md-4">
                                <div class="form-group">
                                   <select name="degree" class="custom-select mr-sm-2"
                                                        id="degree">
                                                    <option selected="" value="">Choose...</option>

                                                     @foreach ($programs as $program)
{{-- @if(isset($student->program->country) && ($student->program->country->id == $country->id)) selected @endif  --}}
                                                   <option value="{{$program->id}}" @if(isset($student->program) && ($student->program->id == $program->id)) selected @endif >{{$program->degree}}</option>

                                                  {{--  <option value="{{$degree->id}}" @if(isset(@dd($student->program->degree_type)->id)) @if ($student->program->degree_type->id == $degree->id) selected @endif @endif> --}}

                                                     </option>

                                                     
                                            
                                                 @endforeach

                                     </select>
                                </div>
                            </div>


                            <label class="col-md-2">Select University </label>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="university" class="custom-select mr-sm-2" id="university">
                                        <option selected="" value="">Choose...</option>
                                         @forelse ($universities as $university)

                                            <option value="{{$university->id}}" @if(isset($student->program->university)) @if ($student->program->university->id == $university->id) selected @endif @endif>
                                                {{--{{optional(optional($student->program)->university)->name}}--}}
                                                
                                                 {{$university->name}}

                                            </option>

                                        @empty
                                            
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <label class="col-md-2">Select Subject </label>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="subject" class="custom-select mr-sm-2" id="subject">
                                        <option selected="" value="">Choose...</option>
                                        @forelse ($subjects as $subject)
                                            <option value="{{$subject->id}}" @if(isset($student->program->subject) && ($student->program->subject->id == $subject->id)) selected @endif>
                                                {{--{{optional(optional($student->program)->subject)->name}}--}}
                                                 {{$subject->name}}
                                            
                                            </option>
                                        @empty

                                        @endforelse
                                    </select>
                                </div>
                            </div>
                        </div>


                 </fieldset>

                        
                              

                          <fieldset style="border: 1px groove #ea1b23 !important;padding: 0 1.4em 1.4em 1.4em !important; margin: 0 0 2em 0 !important;-webkit-box-shadow:  0px 0px 0px 0px #000;box-shadow:  0px 0px 0px 0px #000;">
                              <legend style="width:inherit;padding:0 10px;border-bottom:none;">Educational Competence</legend>
                                
                  <div class="table-responsive">
                     
                      <table id="multi_col_order" class="table table-striped table-bordered display no-wrap"
                      style="width:100%">
                      <thead>
                          <tr>
                              <th>University</th>
                              <th>Subject</th>
                              <th>Examination</th>
                              {{-- <th>Institution</th> --}}
                              <th>Subject/Major</th>
                              <th>GPA</th>
                              <th>YEAR</th>
                          </tr>
                      </thead>
                      <tbody>
                          @php
                              $ssc=json_decode($student->ssc);
                              $hsc=json_decode($student->hsc);
                              $hons=json_decode($student->hons);
                              $masters=json_decode($student->masters);
                              $others=json_decode($student->others);
                          @endphp

                         

                         
                         <tr>
                            

                              <th>SSC</th>
                              {{-- <td>{{$ssc->institution}}</td> --}}
                              <td>
                                    <input type="text" class="form-control" @if(isset($ssc)) value="{{$ssc->group}}"  @endif name="ssc[group]" placeholder="Group">
                              </td>
                              <td>
                                 <input type="number" @if(isset($ssc)) value="{{$ssc->gpa}}" @endif class="form-control" name="ssc[gpa]" placeholder="GPA"  max="5" step=".01">
                              </td>
                              <td>
                                  <input type="number" class="form-control" @if(isset($ssc)) value="{{$ssc->year}}" @endif name="ssc[year]" placeholder="2010">
                              </td>
                              {{-- <td>{{$student->document->['ssc_image']}}</td> --}}

                         </tr>


                         <tr>
                              <th>HSC</th>
                              {{-- <td>{{$hsc->institution}}</td> --}}
                              <td>
                                  <input type="text" @if(isset($hsc)) value="{{$hsc->group}}" @endif class="form-control" name="hsc[group]" placeholder="Group">
                              </td>
                              <td>

                                  <input type="number" @if(isset($hsc)) value="{{$hsc->gpa}}" @endif class="form-control" name="hsc[gpa]" placeholder="GPA" max="5" step=".01">
                              </td>
                              <td>
                                  <input type="number" class="form-control" @if(isset($hsc)) value="{{$hsc->year}}" @endif name="hsc[year]" placeholder="2010">
                              </td>
                              {{-- <td>{{$student->document->['ssc_image']}}</td> --}}

                         </tr>


                         <tr>
                              <th>HONS.</th>
                              {{-- <td>{{$hons->institution}}</td> --}}
                              <td>
                                  <input type="text" @if(isset($hons)) value="{{$hons->group}}" @endif class="form-control" name="hons[group]"  placeholder="Major">
                              </td>
                              <td>

                                  <input type="number" class="form-control" @if(isset($hons)) value="{{$hons->gpa}}" @endif name="hons[gpa]" placeholder="CGPA" max="5" step=".01">
                              </td>
                              <td>

                                  <input type="number" @if(isset($hons)) value="{{$hons->year}}" @endif class="form-control" name="hons[year]" placeholder="2010">
                              </td>
                              {{-- <td>{{$document->->ssc_image}}</td> --}}

                         </tr>


                         <tr>
                              <th>MASTERS</th>
                              {{-- <td>{{$masters->institution}}</td> --}}
                              <td>
                                  <input type="text" @if(isset($masters)) value="{{$masters->group}}" @endif class="form-control" name="masters[group]"  requried  placeholder="Major">
                              </td>
                              <td>
                                  <input type="number" @if(isset($masters)) value="{{$masters->gpa}}" @endif class="form-control" name="masters[gpa]" placeholder="CGPA" max="5" step=".01">
                              </td>
                              <td>
                                  <input type="number" @if(isset($masters)) value="{{$masters->year}}" @endif class="form-control" name="masters[year]" placeholder="2010">
                              </td>
                              {{-- <td>{{$document->->ssc_image}}</td> --}}

                         </tr>


                         <tr>
                              <th>
                                  <input type="text" @if(isset($others)) value="{{$others->title}}" @endif class="form-control" name="others[title]" requried  placeholder="Other Examination">
                              </th>
                              {{-- <td>{{$others->institution}}</td> --}}
                              <td>
                                  <input type="text" @if(isset($others)) value="{{$others->group}}" @endif class="form-control" name="others[group]" requried  placeholder="Group/Major">
                              </td>
                              <td>
                                  <input type="number" @if(isset($others)) value="{{$others->gpa}}" @endif class="form-control" name="others[gpa]" placeholder="GRADE" max="5" step=".01">
                              </td>
                              <td>
                                  <input type="number" @if(isset($others)) value="{{$others->year}}" @endif class="form-control" name="others[year]" placeholder="2010">
                              </td>
                              {{-- <td>{{$student->document->['ssc_image}}</td> --}}

                         </tr>


                         <tr>
                              <th>
{{--                                  {{$student->additional_skill}}--}}
                                  <div class="form-group">
                                      <div class="form-check form-check-inline">
                                          <div class="custom-control custom-radio">
  <input type="radio" class="custom-control-input" id="customControlValidation2GRE" {{$student->additional_skill=='GRE'? 'checked' :''}} name="additional_skill" value="GRE">
                                              <label class="custom-control-label" for="customControlValidation2GRE">GRE</label>
                                          </div>
                                      </div>
                                  </div>
                              </th>
                              <td>
                                  <div class="form-group">
                                      <div class="form-check form-check-inline">
                                          <div class="custom-control custom-radio">
                                              <input type="radio" class="custom-control-input" {{$student->additional_skill=='IELTS'? 'checked' :''}} id="customControlValidation2IELTS" name="additional_skill" value="IELTS">
                                              <label class="custom-control-label" for="customControlValidation2IELTS">IELTS</label>
                                          </div>
                                      </div>
                                  </div>
                              </td>
                              <td>
                                  <div class="form-group">
                                      <div class="form-check form-check-inline">
                                          <div class="custom-control custom-radio">
                                              <input type="radio" {{$student->additional_skill=='GMAT'? 'checked' :''}} class="custom-control-input" id="customControlValidation2GMAT" name="additional_skill" value="GMAT">
                                              <label class="custom-control-label" for="customControlValidation2GMAT">GMAT</label>
                                          </div>
                                      </div>
                                  </div>
                              </td>
                              <td>
                                  <div class="form-group">
    <input type="number" value="{{$student->additional_skill_score}}" class="form-control" name="additional_skill_score" placeholder="GRADE" max="9" step=".01">
                                  </div>
                              </td>
                              <td>-</td>
                              {{-- <td>{{$student->document->['ssc_image']}}</td> --}}

                         </tr>

                      </tbody>
                      
                  </table>
                      </div>
                          </fieldset>
                                                                
                     

                      </div>
                      <div class="form-actions">
                          <div class="text-right">
                              <button type="submit" class="btn btn-danger" style="background-color: #ea1b23">Update Info</button>
                          </div>
                      </div>
                  </form>
                  
                  <fieldset style="border: 1px groove #ea1b23 !important;padding: 0 1.4em 1.4em 1.4em !important; margin: 0 0 2em 0 !important;-webkit-box-shadow:  0px 0px 0px 0px #000;box-shadow:  0px 0px 0px 0px #000;">
                    <legend style="width:inherit;padding:0 10px;border-bottom:none;">Documents</legend>
                    <div class="table-responsive">
           
                        <table id="multi_col_order" class="table table-striped table-bordered display no-wrap"
                            style="width:100%">
                            <thead>
                                <tr>
                                     @forelse ($student->documents as $item)
                                     @if($item->file_location)
                                    <th>
                                        
                                        <a class="btn btn-link" href="{{$item->file_location ? asset($item->file_location) : ''}}">{{strtoupper(str_replace('_',' ',$item->document_title))}}</a>
                                        
                                    </th>
                                    @endif
                                  @if($item->file_location =='')
                                      <th >
                              
                                          <form method="post" action="{{route('documents.update',[$item->id,$item->student_id])}}" enctype="multipart/form-data">
                                              @csrf
                                              <div class="row">
                                                  <div class="col-md-4">
                                                      <div class="form-group">
                                                          <input type="file" class="form-control" name="file_location" placeholder="{{strtoupper(str_replace('_',' ',$item->document_title))}}">
                                                      </div>
                                                      {{-- <input type="hidden" value="{{$student->id}}" name="" required>    --}}
                                      </th>
                                      <th>
                                                  <div class="form-group">
                                                      <button class="btn btn-danger">ADD {{strtoupper(str_replace('_',' ',$item->document_title))}}</button>
                                                  </div>
                                              </div>
                                          </form>
                                      </th>
                                  @endif
                    @empty
                        
                    @endforelse
                                </tr>
                            </thead>
                        </table>
                    </div>
                </fieldset>
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
