@extends('layouts.master')
@section('title','Counselor Assign')
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <form method="post" action="{{route('student.assign.store')}}">
                @csrf
            <div class="card" style="border:1px solid #ea1b23">
                <div class="card-header" style="background-color: #ea1b23">
                    <h4 class="text-white">Counselor Assign</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                       
                        <table id="multi_col_order"
                            class="table table-striped table-bordered display no-wrap" style="width:100%">
                            <thead>
                                <tr>
                                    @if(Auth::user()->role_id==1)
                                    <th>Code</th>
                                    @endif
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>University</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                    @if(Auth::user()->role_id==1)
                                    <th>Change Status</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($student_lists as $key=>$student_list)
                                <tr>
                                    
                                    @if(Auth::user()->role_id==1) 
                                    <td>
                                        <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="student_id[]" value="{{$student_list->id}}" id="customCheck{{$key+1}}">
                                        <label class="custom-control-label" for="customCheck{{$key+1}}">{{$student_list->code}}</label>
                                    </div>
                                    </td>
                                    @endif
                                    <td>{{$student_list->detail->name}}</td>
                                    <td>{{$student_list->detail->phone}}</td>
                                    <td>{{$student_list->program->university->name}} , {{$student_list->program->country->name}}</td>
                                    <td>{{$student_list->program->subject->name}}</td>
                                    <td>{{strtoupper(str_replace('_',' ',$student_list->status))}}</td>
                                    @if(Auth::user()->role_id==1)
                                    <td>
                                        <div class="form-group">
                                        <select name="status" class="custom-select mr-sm-2" id="change_status{{$student_list->id}}" onchange="changeStatus({{$student_list->id}})">
                                                <option value="0">Change Status</option>
                                                <option value="new_leads" class="text-warning">New Applied</option>
                                                <!--<option value="scheduled" class="text-info">Scheduled</option> -->
                                                <option value="not_interested" class="text-danger">Not Interested</option>
                                                <option value="interested" class="text-success">Interested</option>
                                                <option value="less_interested" class="text-success">Less Interested</option>
                                                <option value="much_interested" class="text-success">Much Interested</option>
                                                <option value="done" class="text-success">Done</option>
                                                <option value="not_answered" class="text-dark">Not Answered</option>
                                            </select>
                                        </div>
                                    </td>
                                    @endif
                                    
                                </tr> 
                                @empty
                                    <tr><th colspan="7">There is no data for this query</th></tr>
                                @endforelse
                                
                                
                            </tbody>
                            <tfoot>
                                @if(Auth::user()->role_id==1)
                                <tr>
                                    <th colspan="7">
                                        <div class="form-group">
                                            <label>Select Counselor</label><br>
                                            <select name="counselor" class="custom-select mr-sm-2">
                                                    @forelse ($counselors as $counselor)
                                                       <option value="{{$counselor->id}}" class="text-dark">{{$counselor->name}}</option>
                                                    @empty
                                                        
                                                    @endforelse
                                                </select>
                                            </div>
                                    </th>
                                </tr>
                                @endif
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="form-group text-right">
                        <input type="submit" value="Submit" class="btn btn-danger" style="background-color: #ea1b23">
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection
@section('script')

{{--  <script>
function changeStatus(student_id){
    var status=$('#change_status'+student_id).val();
    if(status==0){
        alert('Select One of Options');
    }else{
        $.ajax({
            type: "GET",
            url: "{{route('default.change_status')}}",
            data: { status:status, student_id:student_id }, 
            success: function( msg ) {
                console.log( msg );
                if(msg){
                    location.reload();
                }
            }
        });
    }
}
</script>  --}}
 
@stop