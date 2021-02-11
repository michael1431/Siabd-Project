@extends('layouts.master')
@section('title','University')
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    {{-- <div class="row">
        <div class="col-xl-12">
            <div class="card" style="border:1px solid #0d0d0e">
                <div class="card-header" style="background-color: #0d0d0e">
                    <h4 class="text-white">University Create Form</h4>
                </div>
                <div class="card-body">





                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div> --}}
    <!-- end row-->
    <div class="row">
        <div class="col-12">
            <div class="card" style="border:1px solid #ea1b23">
                <div class="card-header" style="background-color: #ea1b23">
                    <h4 class="text-white">Update University List</h4>
                </div>
                <div class="card-body">
                    
                    <form method="post" action="{{route('setting.university.update',$university->id)}}" style="border:1px solid #ea1b23" enctype="multipart/form-data">
                        @csrf
                        {{-- <h4 class="card-title">Student Application Form</h4>                               --}}
                        <div class="form-body" style="margin:13px;">
                            <div class="form-group row">
                               
                                <label class="col-md-2 text-dark">University Name</label>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="" value="{{$university->name}}">
                                    </div>
                                </div>
                                
                                <label class="col-md-2 text-dark">Country</label>
                                <div class="col-md-12 text-dark">
                                    
                                    <div class="form-group">
                                        
                                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="country_id">
                                            @forelse ($countries as $country)
                                            <option value="{{$country->id}}"
                                                @if($country->id == $university->country_id) selected="selected" @endif
                                                >{{$country->name}}</option>
                                                
                                            @empty
                                                
                                            @endforelse
                                           
                                        </select>
                                    </div>
                                </div>

                                
                                <label class="col-md-2 text-dark">University Logo</label>
                                <div class="col-md-12 text-dark">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Logo</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="inputGroupFile01" name="image">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger" style="background-color: #ea1b23">Update</button>
                                    </div>
                                </div>
                                
                            </div>
                            

                        </div>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>


@endsection