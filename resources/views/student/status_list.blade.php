@extends('layouts.new_master')
@section('title','Student List')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
             @if(isset($status) && $status == 'new_leads')
            <div class="card">
                <div class="card-body">
                    <form action="{{route('leads.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Upload Excel File</label>
                            <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Submit</button>&nbsp;
                            <a href="{{ asset('/') }}Student_List.xlsx" download="Student List.xlsx" style="color:white" class="btn bg-success"><i class="fa fa-download"></i> Download Format</a>
                        </div>
                    </form>
                </div>
            </div>
            @endif
            <div class="card" style="border:1px solid #ea1b23">
                <div class="card-header" style="background-color: #ea1b23">
                    <h4 class="text-white">Student List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="multi_col_order"
                            class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>University</th>
                                    <th>Subject</th>
                                    <th>Counselor</th>
                                    <th>Status</th>
                                    <th>Remarks</th>
                                    <th>Add Remarks & Schedule</th>
                                    <th>Change Status </th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($student_lists as $key=>$student_list)
                                <tr id="tr-{{ $student_list->id }}">
                                    <td>{{$key+1}}</td>
                                    <td>{{$student_list->detail->name}}</td>
                                    <td>{{$student_list->detail->phone}}</td>
                                    <td>{{optional(optional($student_list->program)->university)->name}}  {{optional(optional($student_list->program)->country)->name}}</td>
                                    <td>{{optional(optional($student_list->program)->subject)->name}}</td>
                                    <td>{{$student_list->counselor ? $student_list->counselor->name : 'Yet Not Assign'}}</td>
                                    <td>{{strtoupper(str_replace('_',' ',$student_list->status))}}
                                    <br>
                                    {{$student_list->schedule ? $student_list->schedule : 'N/A'}}
                                    </td>
                                    <td>
                                        {{$student_list->remarks? $student_list->remarks : 'N/A'}} <br>
                                    </td>
                                     <td>
                                        <button class="btn btn-warning btn-sm m-1 text-white" data-toggle="modal" data-target="#update" type="button" onclick="editForm({{$student_list}})">Remarks & Schedule</button>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                        <select name="status" class="custom-select mr-sm-2" id="change_status{{$student_list->id}}" onchange="changeStatus({{$student_list->id}})">
                                                <option value="0">Change Status</option>
                                                <option value="new_leads" class="text-warning" @if($student_list->status == 'new_leads') selected @endif>New Applied</option>
                                                <!--<option value="scheduled" class="text-info" @if($student_list->status == 'scheduled') selected @endif>Scheduled</option>-->
                                                <option value="interested" class="text-success" @if($student_list->status == 'interested') selected @endif>Interested</option>
                                                <option value="not_interested" class="text-danger" @if($student_list->status == 'not_interested') selected @endif>Not Interested</option>

                                                <option value="less_interested" class="text-success" @if($student_list->status == 'less_interested') selected @endif>Less Interested</option>
                                                <option value="much_interested" class="text-success" @if($student_list->status == 'much_interested') selected @endif >Much Interested</option>
                                                <option value="done" class="text-success" @if($student_list->status ==
                                                 'done') selected @endif >Done</option>
                                                <option value="not_answered" class="text-dark" @if($student_list->status == 'not_answered') selected @endif>Not Answered</option>
                                            <option value="visitor" class="text-warning" @if($student_list->status == 'visitor') selected @endif>Visitor</option>
                                                
                                            </select>
                                        </div>
                                    </td>
                            
                                    <td>
                                        <a class="btn btn-primary" href="{{route('studentlist.show',$student_list->id)}}">Details</a>
                                        <a class="btn btn-success" href="{{route('studentlist.edit',$student_list? $student_list->id : '#')}}">{{-- <i class="fas fa-edit fa-lg">  --}}Edit</a>{{-- &nbsp;<button id="delete" onclick="Delete()" class="btn btn-danger"><i class="fas fa-trash fa-lg"> Delete</i></button> --}}

                                       

                                        {{--  <form action="{{ route('studentlist.delete',$student_list? $student_list->id: '#') }}" method="post" style="float: right;">

                                          @csrf --}}
                                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $student_list->id }}">
                                             Delete
                                            </button>

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="delete{{ $student_list->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Delete Student</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                   Are You Sure To Delete ?
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                    <a href="{{ route('studentlist.delete',$student_list? $student_list->id: '#') }}" class="btn btn-danger">Delete</a>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
 
                                         {{-- <a style="color: white" href="{{ route('studentlist.delete',$student_list? $student_list->id: '#') }}" class="btn bg-danger">Del</i></a> --}}
                               {{-- 
                                        <button onclick="editForm2('data')">Click me</button> --}}
                                        {{-- </form> --}}
  
                                    </td>
                                </tr> 
                                @empty
                                    <tr><th colspan="10">There is no data for this query</th></tr>
                                @endforelse
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle-2"> Remarks & Schedule</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="card mb-5">
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data" id="remark">
                            @csrf

                                    <div class="form-group">
                                        <label for="">Remarks</label>
                                        <textarea class="form-control" name="remarks" id="remarks" cols="16" rows="3">
                                    
                                        </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Schedule</label>
                                        <input name="schedule" type="date" class="form-control">
                                    </div>

                            <button class="btn btn-primary ml-2" type="submit">Save</button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    function editForm(data){
        var action="{{url('')}}/add_remarks/"+data.id;
        $('#remark').attr('action',action);
        $('#remarks').attr('value',data.remarks);
    }
</script>

<script>


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
</script>