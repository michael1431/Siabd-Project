@extends('layouts.master')
@section('title','Program Offers')
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    @if(!$programmes)
    <div class="row">
        <div class="col-xl-12">
            <div class="card" style="border:1px solid #ea1b23">
                <div class="card-header" style="background-color: #ea1b23">
                    <h4 class="text-white">Add Programe</h4>
                </div>
                <div class="card-body">
                       
                            <fieldset style="border: 1px groove #ea1b23 !important;padding: 0 1.4em 1.4em 1.4em !important; margin: 0 0 2em 0 !important;-webkit-box-shadow:  0px 0px 0px 0px #000;box-shadow:  0px 0px 0px 0px #000;">
                                <legend style="width:inherit;padding:0 10px;border-bottom:none;">We Offer....</legend>
                                <div class="form-body">
                                        <div class="elementor-element elementor-element-272655a elementor-widget elementor-widget-image"
                                            data-id="272655a" data-element_type="widget"
                                            data-widget_type="image.default">
                                            <div class="elementor-widget-container">
                                                <div class="elementor-image" id="offers_list">
                                                    @forelse ($countries as $country)
                                                        <a href="{{route('offers',['country'=>$country->id])}}">
                                                        <img src="{{asset($country->flag_image)}}"
                                                            class="attachment-large size-large" alt=""
                                                            sizes="(max-width: 500px) 100vw, 500px" width="500"
                                                            height="500">
                                                        </a>
                                                    @empty
                                    
                                                    @endforelse
                                                    @forelse ($universities as $university)
                                                        <a href="{{route('offers',['university'=>$university->id])}}">
                                                        <img src="{{asset($university->logo_image)}}"
                                                            class="attachment-large size-large" alt=""
                                                            sizes="(max-width: 500px) 100vw, 500px" width="500"
                                                            height="500">
                                                        </a>
                                                    @empty
                                    
                                                    @endforelse
                                                </div>
                                            </div>
                                        </div>
                                        
                                  
                                           
                                </div>
                            </fieldset>
                        </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
       @else
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
                                        <th>Subject</th>
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
                                        <td>{{$programme->code}}</td>
                                        <td>{{$programme->degree}}</td>
                                        <td>{{$programme->university->name}}</td>
                                        <td>{{$programme->subject->name}}</td>
                                        <td>{{$programme->country->name}}</td>
                                        <td>{{$programme->tuition_fee}}</td>
                                        <td><a class="btn btn-danger" style="background-color: #ea1b23" href="{{route('studentlist.create',['program_id'=>$programme->id])}}">Apply</a></td>
                                    </tr> 
                                    @empty
                                        
                                    @endforelse
                                    
                                    
                                </tbody>
                            </table>
                            {{$programmes->appends(request()->except('page'))->render()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
   
    </div>
    <!-- end row-->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>
@endsection
