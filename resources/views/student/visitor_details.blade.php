@extends('layouts.master')
@section('title','Visitor Details')
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card" style="border:1px solid #ea1b23">
                <div class="card-header" style="background-color: #ea1b23">
                    <h4 class="text-white">Visitor Details</h4>
                </div>
                <div class="card-body">


                    {{-- <form method="post" action="{{route('studentlist.store')}}" enctype="multipart/form-data">
                        @csrf --}}
                        {{-- <h4 class="card-title">Visitor Application Form</h4>                               --}}
                        <div class="form-body">
                            <fieldset style="border: 1px groove #ea1b23 !important;padding: 0 1.4em 1.4em 1.4em !important; margin: 0 0 2em 0 !important;-webkit-box-shadow:  0px 0px 0px 0px #000;box-shadow:  0px 0px 0px 0px #000;">
                                <legend style="width:inherit;padding:0 10px;border-bottom:none;">Personal Information</legend>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="col-md-2 text-dark">Full Name</label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="" value="{{$visitor->name}}" readonly>
                                    </div>
                                </div>
                                <label class="col-md-2 text-dark">Guardian Name</label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="guardian" id="" value="{{$visitor->guardian}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="col-md-2 text-dark">Phone</label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone" id="" value="{{$visitor->phone}}" readonly>
                                    </div>
                                </div>
                                <label class="col-md-2 text-dark">Email</label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="" value="{{$visitor->email}}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="col-md-2 text-dark">Country</label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{$visitor->country->name}}" readonly>
                                    </div>
                                </div>
                                <label class="col-md-2 text-dark">University</label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="" value="{{$visitor->university->name}}" readonly>
                                    </div>
                                </div>
                               
                                <div class="col-md-1"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="col-md-2 text-dark">Subject</label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{$visitor->subject}}" readonly>
                                    </div>
                                </div>
                                <label class="col-md-2 text-dark">Degree Type</label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="" value="{{$visitor->degreeType->name}}" readonly>
                                    </div>
                                </div>
                               
                                <div class="col-md-1"></div>
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
                                    <th>Institution</th>
                                    <th>Subject/Major</th>
                                    <th>GPA</th>
                                    <th>YEAR</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $ssc=json_decode($visitor->ssc);
                                    $hsc=json_decode($visitor->hsc);
                                    $hons=json_decode($visitor->hons);
                                    $masters=json_decode($visitor->masters);
                                    $others=json_decode($visitor->others);
                                @endphp
                                @if($ssc)
                               
                               <tr>
                                    <th>SSC</th>
                                    <td>{{$ssc->institution}}</td>
                                    <td>{{$ssc->group}}</td>
                                    <td>{{$ssc->gpa}}</td>
                                    <td>{{$ssc->year}}</td>
                                    {{-- <td>{{$visitor->document->['ssc_image']}}</td> --}}

                               </tr>
                               @endif
                               @if($hsc)
                               <tr>
                                    <th>HSC</th>
                                    <td>{{$hsc->institution}}</td>
                                    <td>{{$hsc->group}}</td>
                                    <td>{{$hsc->gpa}}</td>
                                    <td>{{$hsc->year}}</td>
                                    {{-- <td>{{$visitor->document->['ssc_image']}}</td> --}}

                               </tr>
                               @endif
                               @if($hons)
                               <tr>
                                    <th>HONS.</th>
                                    <td>{{$hons->institution}}</td>
                                    <td>{{$hons->group}}</td>
                                    <td>{{$hons->gpa}}</td>
                                    <td>{{$hons->year}}</td>
                                    {{-- <td>{{$document->->ssc_image}}</td> --}}

                               </tr>
                               @endif
                               @if($masters)
                               <tr>
                                    <th>MASTERS</th>
                                    <td>{{$masters->institution}}</td>
                                    <td>{{$masters->group}}</td>
                                    <td>{{$masters->gpa}}</td>
                                    <td>{{$masters->year}}</td>
                                    {{-- <td>{{$document->->ssc_image}}</td> --}}

                               </tr>
                               @endif
                               @if($others)
                               <tr>
                                    <th>{{$others->title}}</th>
                                    <td>{{$others->institution}}</td>
                                    <td>{{$others->group}}</td>
                                    <td>{{$others->gpa}}</td>
                                    <td>{{$others->year}}</td>
                                    {{-- <td>{{$visitor->document->['ssc_image}}</td> --}}

                               </tr>
                               @endif
                               @if($visitor->additional_skill)
                               <tr>
                                    <th>{{$visitor->additional_skill}}</th>
                                    <td>-</td>
                                    <td>-</td>
                                    <td>{{$visitor->additional_skill_score}}</td>
                                    <td>-</td>
                                    {{-- <td>{{$visitor->document->['ssc_image']}}</td> --}}

                               </tr>
                               @endif


                            </tbody>
                            
                        </table>
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
