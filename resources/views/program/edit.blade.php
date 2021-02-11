@extends('layouts.master')
@section('title','Program Update Form')
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card" style="border:1px solid #ea1b23">
                <div class="card-header" style="background-color: #ea1b23">
                    <h4 class="text-white">Update Programe</h4>
                </div>
                <div class="card-body">


                    <form method="post" action="{{route('setting.program.update', $programme->id)}}" enctype="multipart/form-data">
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
                                                        <option value="{{$country->id}}"
                                                         @if($country->id == $programme->country_id) selected="selected" @endif
                                                         >{{strtoupper($country->name)}}</option>
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
                                                        <option
                                                         value="{{$subject->id}}"
                                                         @if($subject->id == $programme->subject_id) selected="selected" @endif
                                                         >{{$subject->name}}</option>
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
                                                        <option value="{{$university->id}}"
                                                         @if($university->id == $programme->university_id) selected="selected" @endif
                                                         >{{$university->name}}</option>
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
                                                        <option value="{{$type->id}}"
                                                         @if($type->id == $programme->degree_type_id) selected="selected" @endif
                                                         >{{$type->name}}</option>
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
                                             <input type="text" name="degree" value="{{ $programme->degree }}" class="form-control">
                                            </div>
                                        </div>
                                        <label class="col-md-2">Programe Code </label>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="code" value="{{ $programme->code }}" class="form-control">
                                            </div>
                                        </div>
                                           
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2">Base </label>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="base" value="{{ $programme->base }}" class="form-control">
                                            </div>
                                        </div>
                                        <label class="col-md-2">Tuition Fee </label>
                                        
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text" name="tuition_fee" value="{{ $programme->tuition_fee }}" class="form-control">
                                            </div>
                                        </div>
                                           
                                    </div>
                            </fieldset>
                        </div>
                        <div class="form-actions">
                            <div class="text-right">
                                <button type="submit" class="btn btn-danger" style="background-color: #ea1b23">Update</button>
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
