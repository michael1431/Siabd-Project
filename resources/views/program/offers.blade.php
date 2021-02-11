@extends('layouts.new_master')
@section('title','Program Offers')
@section('content')
	<div class="container mt-2">
		<div class="navigation-outer">
            @if(!$programmes)
                <ul class="navigation-top list-unstyled align-items-center mb-0">
                    @php
                        $index=0;
                    @endphp
                    @forelse ($countries as $key=>$country)
                    @php
                        $index++;
                    @endphp
                    <li class="navigation-link">
                        <a href="{{route('offers',['country'=>$country->id])}}">
                            <img class="img-fluid" src="{{asset($country->flag_image)}}" onerror="this.onerror=null; this.src={{asset($country->flag_image)}}" alt="img">
                        </a>
                        {{-- <p class="--fs-24 --fw-b">{{$country->name}}</p> --}}
                    </li>
                    @if($index%4==0)
                </ul>
                    <ul class="navigation-top list-unstyled align-items-center mb-0">
                    @endif
                    @empty
                    @endforelse
                </ul>
                <ul class="navigation-top list-unstyled align-items-center mb-0">
                    @php
                        $uindex=0;
                    @endphp
                    @forelse ($universities as $university)
                    @php
                        $uindex++;
                    @endphp
                    <li class="navigation-link">
                        <a href="{{route('offers',['university'=>$university->id])}}">
                            <img class="img-fluid" src="{{asset($university->logo_image)}}" alt="">
                        </a>
                        <p class="--fs-10 --fw-b">{{$university->name}}</p>
                    </li>
                    @if($uindex%4==0)
                </ul>
                <ul class="navigation-top list-unstyled align-items-center mb-0">
                    @endif
                    @empty
                    @endforelse
                </ul>
       @else
        <div class="row">
            <div class="col-12">
                <div class="card" style="border:1px solid #ea1b23">
                    <div class="card-header" style="background-color: #ea1b23">
                        <h4 class="text-white">Programe List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi_col_order" class="table table-striped table-bordered display no-wrap"
                                style="width:100%">
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
                                        <td>{{$programme->code }}</td>
                                        <td>{{$programme->degree }}</td>
                                        <td>{{$programme->subject->name }}</td>
                                        <td>{{$programme->university->name }}</td>
                                        <td>{{$programme->country->name}}</td>
                                        <td>{{$programme->tuition_fee}}</td>
                                        <td>
                                            <a class="btn btn-danger" style="background-color: #ea1b23"
                                                href="{{route('studentlist.create',['program_id'=>$programme->id])}}">Apply</a>
                                        </td>
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
