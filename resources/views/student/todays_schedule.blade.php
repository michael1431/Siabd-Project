@extends('layouts.master')
@section('title','Todays Schedule')
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <form method="post" action="{{route('student.assign.store')}}">
                @csrf
            <div class="card" style="border:1px solid #ea1b23">
                <div class="card-header" style="background-color: #ea1b23">
                    <h4 class="text-white">Todays Schedule</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                       
                        <table id="multi_col_order"
                            class="table table-striped table-bordered display no-wrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>University</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                    <th>Remarks</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @forelse ($students as $student)
                                <tr>
                                    
                                    <td>{{$student? $student->detail->name : 'There is no schedule today'}}</td>
                                    <td>{{$student? $student->detail->phone: ''}}</td>
                                    <td>{{$student? $student->program->university->name: ''}}</td>
                                    <td>{{$student?$student->program->subject->name:''}}</td>
                                    <td>{{$student?strtoupper(str_replace('_',' ',$student->status)):''}}</td>
                                    <td>{{$student? $student->remarks: ''}}</td>
                                    <td>
                                        <a class="btn btn-danger" style="background-color: #ea1b23" href="{{route('studentlist.show',$student? $student->id : '#')}}">Details</a>
                                        <a class="btn btn-danger" style="background-color: #ea1b23" href="{{route('studentlist.edit',$student? $student->id : '#')}}">Edit</a>
                                    </td>
                                    
                                </tr> 
                                @empty
                                    
                                @endforelse
                                
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                   
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
@section('script')

 
@stop