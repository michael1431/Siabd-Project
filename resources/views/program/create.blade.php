@extends('layouts.master')
@section('title','Program Create Form')
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card" style="border:1px solid #ea1b23">
                <div class="card-header" style="background-color: #ea1b23">
                    <h4 class="text-white">Add Programe</h4>
                </div>
                <div class="card-body">


                    <form method="post" action="{{route('setting.program.store')}}" enctype="multipart/form-data">
                        @csrf
                        {{-- <h4 class="card-title">Student Application Form</h4>                               --}}
                       
                            <fieldset style="border: 1px groove #ea1b23 !important;padding: 0 1.4em 1.4em 1.4em !important; margin: 0 0 2em 0 !important;-webkit-box-shadow:  0px 0px 0px 0px #000;box-shadow:  0px 0px 0px 0px #000;">
                                <legend style="width:inherit;padding:0 10px;border-bottom:none;">Program Details</legend>
                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="col-md-2">Select Country </label>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <select name="country_id" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                    <option selected="">Choose...</option>
                                                    @forelse ($countries as $key=>$country)
                                                        <option value="{{$country->id}}">{{strtoupper($country->name)}}</option>
                                                    @empty
                                                        
                                                    @endforelse
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <label class="col-md-2">Select Subject </label>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <select name="subject_id" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                    <option selected="">Choose...</option>
                                                    @forelse ($subjects as $sub=>$subject)
                                                        <option value="{{$subject->id}}">{{$subject->name}}</option>
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
                                                <select name="university_id" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                    <option selected="">Choose...</option>
                                                    @forelse ($universities as $u=>$university)
                                                        <option value="{{$university->id}}">{{$university->name}}</option>
                                                    @empty
                                                        
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <label class="col-md-2">Select Degree Type</label>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <select name="degree_type_id" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                                    <option selected="">Choose...</option>
                                                    @forelse ($types as $type)
                                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                                    @empty
                                                        
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                           
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2">Programe Name </label>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="degree" class="form-control">
                                            </div>
                                        </div>
                                        <label class="col-md-2">Programe Code </label>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="code" class="form-control">
                                            </div>
                                        </div>
                                           
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2">Base </label>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="base" class="form-control">
                                            </div>
                                        </div>
                                        <label class="col-md-2">Tuition Fee </label>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="tuition_fee" class="form-control">
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
        <div class="row">
        <div class="col-12">
            <div class="card" style="border:1px solid #ea1b23">
                <div class="card-header" style="background-color: #ea1b23">
                    <h4 class="text-white">Programe List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="multi_col_order"
                            class="table table-striped table-bordered display no-wrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Code</th>
                                    <th>Degree</th>
                                    <th>University</th>
                                    <th>Subject</th>
                                    <th>Country</th>
                                    <th>Tuition Fee</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($programmes as $key=>$programme)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$programme->code}}</td>
                                    <td>{{$programme->degree?$programme->degree:''}}</td>
                                    <td>{{$programme->university?$programme->university->name:''}}</td>
                                    <td>{{$programme->subject?$programme->subject->name:''}}</td>
                                    <td>{{$programme->country?$programme->country->name:''}}</td>
                                    <td>{{$programme->tuition_fee}}</td>
                                    <td>
                                        <a href="{{route('setting.program.edit',$programme->id)}}" class="fa fa-edit btn btn-success" ></a>
                                    </td>
                                    {{-- <td><a class="btn btn-danger" style="background-color: #ea1b23" href="{{route('studentlist.create',['program_id'=>$programme->id])}}">Apply</a></td> --}}
                                </tr> 
                                @empty
                                    
                                @endforelse
                                
                                
                            </tbody>
                        </table>
                        {{$programmes->render()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- end row-->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>

@endsection
