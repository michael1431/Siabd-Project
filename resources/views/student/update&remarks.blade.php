@extends('layouts.new_master')
@section('title','My Applications')
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card" style="border:1px solid #ea1b23">
                <div class="card-header" style="background-color: #ea1b23">
                  <h4 class="text-white">My Applications</h4>
                </div>
                <div class="card-body">
 
                    
                    @if(Auth::user()->role_id==2)
                        <div class="table-responsive">
                            <table id="multi_col_order"
                                class="table table-striped table-bordered display no-wrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>University</th>
                                        <th>Subject</th>
                                        <th>Counselor</th>
                                        <th colspan="2"> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($studentlists as $key=>$student_list)
                                    <tr>
                                        @if(Auth::user()->id==$student_list->user_id)
                                        <td>{{$key+1}}</td>
                                        <td>{{$student_list->program->university->name}} - {{$student_list->program->country->name}}</td>
                                        <td>{{$student_list->program->subject->name}}</td>
                                        <td>{{$student_list->counselor ? $student_list->counselor->name : 'Yet Not Assign'}}</td>
                                        <td><a class="btn btn-danger" target="_blank" style="background-color: #ea1b23" href="{{route('studentlist.edit',$student_list->id)}}">Details</a></td>
                                        @endif
                                    </tr> 
                                    @empty
                                        <tr><th colspan="9">There is no data for this query</th></tr>
                                    @endforelse
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                    @endif

        


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
