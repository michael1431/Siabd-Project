@extends('layouts.new_master')
@section('title','Eligibility Check')
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

    <div class="text-primary" style="margin-bottom: 10px;">

      <a href="{{ url('/home') }}" class="btn btn-success">Back</a>
    
    </div>
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title mb-3 mb-5" > <span style="border-bottom: 4px solid grey;padding-bottom:4px;">Eligibility Check</span> </h4>

                    <ul class="nav nav-tabs mb-3" style="display: none">
                        <li class="nav-item">
                            <a href="#home" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                <i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
                                <span class="d-none d-lg-block">Step 1</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#profile" data-toggle="tab" aria-expanded="false" class="nav-link">
                                <i class="mdi mdi-account-circle d-lg-none d-block mr-1"></i>
                                <span class="d-none d-lg-block">Step 2</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
                                <i class="mdi mdi-settings-outline d-lg-none d-block mr-1"></i>
                                <span class="d-none d-lg-block">Step 3</span>
                            </a>
                        </li>      
                    </ul>
                    <form method="post" action="{{route('eligibility_check')}}">
                        @csrf
                        <div class="tab-content">
                            <div class="tab-pane active" id="home">
                               

                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="col-md-2">Select Country </label>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <select name="country" class="custom-select mr-sm-2"
                                                    id="country">
                                                    <option selected="">Choose...</option>
                                                    @forelse ($countries as $country)
                                                    <option value="{{$country->id}}">{{strtoupper($country->name)}}
                                                    </option>
                                                    @empty

                                                    @endforelse

                                                </select>
                                            </div>
                                        </div>

                                        <label class="col-md-2">Select DegreeType </label>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <select name="degree" class="custom-select mr-sm-2"
                                                        id="inlineFormCustomSelect">
                                                    <option selected="">Choose...</option>
                                                    <option value="{{ $degrees[6]->id }}">{{ $degrees[6]->name }}</option>
                                                    <option value="{{ $degrees[0]->id }}">{{ $degrees[0]->name }}</option>
                                                    <option value="{{ $degrees[1]->id }}">{{ $degrees[1]->name }}</option>
                                                    <option value="{{ $degrees[3]->id }}">{{ $degrees[3]->name }}</option>
                                                    <option value="{{ $degrees[2]->id }}">{{ $degrees[2]->name }}</option>

                                                   {{--  @forelse ($degrees as $degree)
                                                        <option value="{{$degree->id}}">{{$degree->name}}</option>
                                                    @empty

                                                    @endforelse --}}
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2">Select University </label>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <select name="university" class="custom-select mr-sm-2"
                                                    id="university">
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
                                                <select name="subject" class="custom-select mr-sm-2"
                                                        id="subject">
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
                                        {{-- <button type="submit" class="btn btn-info">Next</button> --}}
                                        <a href="#profile" data-toggle="tab" aria-expanded="false" class="nav-link "  >
                                            <i class="mdi mdi-account-circle "  ></i>
                                            <span class="" style="color:white;background-color:red;padding:14px 16px" >Next</span>
                                        </a>
                                    </div>
                                </div>

                            </div>

                           

                            <div class="tab-pane" id="profile">
                                {{-- <h4 class="card-title">Select All Option To Query Your Desired Degree 2</h4> --}}

                                

                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="text-dark col-md-3">Examination</label>
                                        <label class="text-dark col-md-3">Group/Major</label>
                                        <label class="text-dark col-md-3">GPA</label>
                                    </div>
                                    <div class="form-group row">
                                        <label class="text-dark col-md-3">SSC</label>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="ssc_group" class="custom-select mr-sm-2"
                                                    id="inlineFormCustomSelect">
                                                    <option selected="">Choose...</option>
                                                    <option value="1">Science</option>
                                                    <option value="2">Business Studies</option>
                                                    <option value="3">Humanities</option>
                                                    <option value="4">General</option>
                                                    <option value="5">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control" max="5" step=".01">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="text-dark col-md-3">HSC</label>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="hsc_group" class="custom-select mr-sm-2"
                                                    id="inlineFormCustomSelect">
                                                    <option selected="">Choose...</option>
                                                    <option value="1">Science</option>
                                                    <option value="2">Business Studies</option>
                                                    <option value="3">Humanities</option>
                                                    <option value="4">General</option>
                                                    <option value="5">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control" max="5" step=".01">
                                        </div>
                                        {{-- <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="customControlValidation2" name="radio-stacked">
                                                            <label class="custom-control-label" for="customControlValidation2">yes </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" class="custom-control-input" id="customControlValidation3" name="radio-stacked">
                                                            <label class="custom-control-label" for="customControlValidation3">no </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}


                                    </div>
                                    <div class="form-group row">
                                        <label class="text-dark col-md-3">Hon's</label>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="hsc_group" class="custom-select mr-sm-2"
                                                    id="inlineFormCustomSelect">
                                                    <option selected="">Choose...</option>
                                                    <option value="1">Science</option>
                                                    <option value="2">Business Studies</option>
                                                    <option value="3">Humanities</option>
                                                    <option value="4">General</option>
                                                    <option value="5">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control" max="5" step=".01">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="text-dark col-md-3">Masters</label>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select name="hsc_group" class="custom-select mr-sm-2"
                                                    id="inlineFormCustomSelect">
                                                    <option selected="">Choose...</option>
                                                    <option value="1">Science</option>
                                                    <option value="2">Business Studies</option>
                                                    <option value="3">Humanities</option>
                                                    <option value="4">General</option>
                                                    <option value="5">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control" max="5" step=".01">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="text-right">
                                        {{-- <button type="submit" class="btn btn-info">Next</button> --}}

                                        <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
                                            <i class="mdi mdi-account-circle "  ></i>
                                            <span class="" style="color:white;background-color:red;padding:14px 16px" >Next</span>
                                        </a>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane" id="settings">
                                <div class="form-body">
                                    <div class="form-group row">
                                        <label class="col-md-2">IELTS </label>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <div class="form-check form-check-inline">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            id="customControlValidation2" name="radio-stacked">
                                                        <label class="custom-control-label"
                                                            for="customControlValidation2">yes </label>
                                                    </div>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            id="customControlValidation3" name="radio-stacked">
                                                        <label class="custom-control-label"
                                                            for="customControlValidation3">no </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control" max="9" step=".01">
                                        </div>


                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2">TOFEL </label>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <div class="form-check form-check-inline">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            id="customControlValidation11" name="radio-stacked">
                                                        <label class="custom-control-label"
                                                            for="customControlValidation2">yes </label>
                                                    </div>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            id="customControlValidation12" name="radio-stacked">
                                                        <label class="custom-control-label"
                                                            for="customControlValidation3">no </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control" max="9" step=".01">
                                        </div>


                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2">GRE </label>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <div class="form-check form-check-inline">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            id="customControlValidation1" name="radio-stacked">
                                                        <label class="custom-control-label"
                                                            for="customControlValidation1">yes </label>
                                                    </div>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            id="customControlValidation4" name="radio-stacked">
                                                        <label class="custom-control-label"
                                                            for="customControlValidation4">no </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control" max="9" step=".01">
                                        </div>


                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2">GMAT </label>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <div class="form-check form-check-inline">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            id="customControlValidation5" name="radio-stacked">
                                                        <label class="custom-control-label"
                                                            for="customControlValidation5">yes </label>
                                                    </div>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" class="custom-control-input"
                                                            id="customControlValidation6" name="radio-stacked">
                                                        <label class="custom-control-label"
                                                            for="customControlValidation6">no </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control" max="9" step=".01">
                                        </div>


                                    </div>

                                    <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-info">Submit</button>


                                        </div>
                                    </div>
                                </div>
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
@push('js')
@endpush