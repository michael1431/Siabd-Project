@extends('layouts.master')
@section('title','Student Details')
@section('content')
<div class="container-fluid">

     <div class="text-primary" style="margin-bottom: 10px;">

      <a href="{{ url('/student_list_new?status=new_leads') }}" class="btn btn-success">Back</a>
    
    </div>

    
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card" style="border:1px solid #ea1b23">
                <div class="card-header" style="background-color: #ea1b23">
                    <h4 class="text-white">Student Details</h4>
                </div>
                <div class="card-body">


                    {{-- <form method="post" action="{{route('studentlist.store')}}" enctype="multipart/form-data">
                        @csrf --}}
                        {{-- <h4 class="card-title">Student Application Form</h4>                               --}}
                        <div class="form-body">
                            <fieldset style="border: 1px groove #ea1b23 !important;padding: 0 1.4em 1.4em 1.4em !important; margin: 0 0 2em 0 !important;-webkit-box-shadow:  0px 0px 0px 0px #000;box-shadow:  0px 0px 0px 0px #000;">
                                <legend style="width:inherit;padding:0 10px;border-bottom:none;">Personal Information</legend>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="col-md-2 text-dark">Full Name</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="" value="{{$student->detail->name}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="col-md-2 text-dark">Phone</label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone" id="" value="{{$student->detail->phone}}" readonly>
                                    </div>
                                </div>
                                <label class="col-md-2 text-dark">Email</label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="" value="{{$student->detail->email}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="col-md-2 text-dark">Father's Name</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="f_name" id="" value="{{$student->f_name}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="col-md-2 text-dark">Father's Profession</label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="f_profession" id="" value="{{$student->f_profession}}" readonly>
                                    </div>
                                </div>
                                <label class="col-md-2 text-dark">Father's Contact</label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="f_contact" id="" value="{{$student->f_contact}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="col-md-2 text-dark">Mother's Name</label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="m_name" id="" value="{{$student->m_name}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            {{-- <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="col-md-2 text-dark">Mother's Profession</label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="m_profession" id="" value="{{$student->m_profession}}" readonly>
                                    </div>
                                </div>
                                <label class="col-md-2 text-dark">Mother's Contact</label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="m_contact" id="" value="{{$student->m_contact}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div> --}}
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="col-md-2 text-dark">Passport No</label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="passport_no" id="" value="{{$student->passport_no}}" readonly>
                                    </div>
                                </div>
                                <label class="col-md-2 text-dark">NID No</label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="nid" id="" value="{{$student->nid}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="col-md-2 text-dark">BIR No</label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="b_reg_no" id="" value="{{$student->b_reg_no}}" readonly>
                                    </div>
                                </div>
                                <label class="col-md-2 text-dark">Home Phone</label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone_home" id="" value="{{$student->phone_home}}" readonly>
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
                                  
                    <div class="table-responsive">
                       
                        <table id="multi_col_order" class="table table-striped table-bordered display no-wrap"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th>Country</th>
                                {{-- <th>Institution</th> --}}
                                <th>University</th>
                                <th>Degree</th>
                                <th>Subject</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                           <tr>
                                <th>{{optional(optional($student->program)->country)->name}}</th>
                                <th>{{optional(optional($student->program)->university)->name}}</th>
                                <th>{{optional($student->program)->degree}}</th>
                                <th>{{optional(optional($student->program)->subject)->name}}</th>
                                {{-- <td>{{$ssc->institution}}</td> --}}
                                
                                {{-- <td>{{$student->document->['ssc_image']}}</td> --}}

                           </tr>
                        </tbody>
                        
                    </table>
                        </div>
                            </fieldset>


                           


                            <fieldset style="border: 1px groove #ea1b23 !important;padding: 0 1.4em 1.4em 1.4em !important; margin: 0 0 2em 0 !important;-webkit-box-shadow:  0px 0px 0px 0px #000;box-shadow:  0px 0px 0px 0px #000;">
                                <legend style="width:inherit;padding:0 10px;border-bottom:none;">Educational Competence</legend>
                                  
                    <div class="table-responsive">
                       
                        <table id="multi_col_order" class="table table-striped table-bordered display no-wrap"
                        style="width:100%">
                        <thead>
                            <tr>
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
                            @if($ssc)
                           
                           <tr>
                                <th>SSC</th>
                                {{-- <td>{{$ssc->institution}}</td> --}}
                                <td>{{$ssc->group}}</td>
                                <td>{{$ssc->gpa}}</td>
                                <td>{{$ssc->year}}</td>
                                {{-- <td>{{$student->document->['ssc_image']}}</td> --}}

                           </tr>
                           @endif
                           @if($hsc)
                           <tr>
                                <th>HSC</th>
                                {{-- <td>{{$hsc->institution}}</td> --}}
                                <td>{{$hsc->group}}</td>
                                <td>{{$hsc->gpa}}</td>
                                <td>{{$hsc->year}}</td>
                                {{-- <td>{{$student->document->['ssc_image']}}</td> --}}

                           </tr>
                           @endif
                           @if($hons)
                           <tr>
                                <th>HONS.</th>
                                {{-- <td>{{$hons->institution}}</td> --}}
                                <td>{{$hons->group}}</td>
                                <td>{{$hons->gpa}}</td>
                                <td>{{$hons->year}}</td>
                                {{-- <td>{{$document->->ssc_image}}</td> --}}

                           </tr>
                           @endif
                           @if($masters)
                           <tr>
                                <th>MASTERS</th>
                                {{-- <td>{{$masters->institution}}</td> --}}
                                <td>{{$masters->group}}</td>
                                <td>{{$masters->gpa}}</td>
                                <td>{{$masters->year}}</td>
                                {{-- <td>{{$document->->ssc_image}}</td> --}}

                           </tr>
                           @endif
                           @if($others)
                           <tr>
                                <th>{{$others->title}}</th>
                                {{-- <td>{{$others->institution}}</td> --}}
                                <td>{{$others->group}}</td>
                                <td>{{$others->gpa}}</td>
                                <td>{{$others->year}}</td>
                                {{-- <td>{{$student->document->['ssc_image}}</td> --}}

                           </tr>
                           @endif
                           @if($student->additional_skill)
                           <tr>
                                <th>{{$student->additional_skill}}</th>
                                <td>-</td>
                                <td>-</td>
                                <td>{{$student->additional_skill_score}}</td>
                                <td>-</td>
                                {{-- <td>{{$student->document->['ssc_image']}}</td> --}}

                           </tr>
                           @endif


                        </tbody>
                        
                    </table>
                        </div>
                            </fieldset>
                            <fieldset style="border: 1px groove #ea1b23 !important;padding: 0 1.4em 1.4em 1.4em !important; margin: 0 0 2em 0   !important;-webkit-box-shadow:  0px 0px 0px 0px #000;box-shadow:  0px 0px 0px 0px #000;">
                                <legend style="width:inherit;padding:0 10px;border-bottom:none;">Documents</legend>
                                <div class="table-responsive">
                       
                                    <table id="multi_col_order" class="table table-striped table-bordered display no-wrap"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                 @forelse ($student->documents as $item)
                                                <th>
                                                    
                                                    <a class="btn btn-link" href="{{asset($item->file_location)}}">{{strtoupper(str_replace('_',' ',$item->document_title))}}</a>
                                                </th>
                                @empty
                                    
                                @endforelse
                                <th >
                                    
                                    <form method="post" action="{{route('documents.store')}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="document_title" placeholder="document_title" id="">
                                                </div>
                                                <input type="hidden" value="{{$student->id}}" name="student_id" required>   
                                </th>
                                <th>
                                            <div class="form-group">
                                                <button class="btn btn-danger">Add Title</button>
                                            </div>
                                        </div>
                                    </form>
                                </th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                               
                            </fieldset>

                            <fieldset style="border: 1px groove #ea1b23 !important;padding: 0 1.4em 1.4em 1.4em !important; margin: 0 0 2em 0   !important;-webkit-box-shadow:  0px 0px 0px 0px #000;box-shadow:  0px 0px 0px 0px #000;">
                                <legend style="width:inherit;padding:0 10px;border-bottom:none;">Remarks</legend>
                                <div class="table-responsive">
                                    <p>{{$student->remarks}}</p>
                                </div>
                               
                            </fieldset>
                                                                  
                       

                        </div>
                        <div class="form-actions">
                            <div class="text-right">
                                <button type="submit" class="btn btn-danger" style="background-color: #ea1b23">Verify</button>
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
