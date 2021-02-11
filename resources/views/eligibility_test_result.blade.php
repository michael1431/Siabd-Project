@extends('layouts.new_master')
@section('title','Eligibility Result')
@section('content')
<div class="container-fluid" style="background-image: url('new_template/img/arch.jpg')">

   <div class="text-primary" style="margin-bottom: 10px;">

      <a href="{{ url('/check') }}" class="btn btn-success">Back</a>
    
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                   {{--  <h4 class="card-title">Eligibility Result</h4> --}}
                   
                    <div class="table-responsive">
                        <table id="multi_col_order"
                            class="table table-striped table-bordered" style="width:80%; margin-left: 200px;">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Code</th>
                                    <th>Degree</th>
                                    <th>University</th>
                                    <th>Country</th>
                                    <th>Tuition Fee</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($programmes as $key=>$programme)
                                <tr style="font-weight: bold;">
                                    <td>{{$key+1}}</td>
                                    <td>{{$programme->code}}</td>
                                    <td>{{$programme->degree}}</td>
                                    <td>{{$programme->university->name}}</td>
                                    <td>{{$programme->country->name}}</td>
                                    <td>{{$programme->tuition_fee}}</td>
                                    <td><a class="btn btn-danger" style="background-color: #ea1b23" href="{{route('studentlist.create',['program_id'=>$programme->id])}}">Apply</a></td>
                                </tr> 
                                @empty
                                    
                                @endforelse
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection