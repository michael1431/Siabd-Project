@extends('layouts.new_master')
@section('title','Visitor List')
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card" style="border:1px solid #ea1b23">
                <div class="card-header" style="">
                    <h4 class="">Search by Status</h4>
                    <div class="form-group">
                        <select name="search_visit_status" id="search_status" class="custom-select mr-sm-2" id="">
                            <option value="0">Select Status</option>
                            <option value="new_leads" class="text-warning" >New Applied</option>
                            <option value="scheduled" class="text-info" >Scheduled</option>
                            <option value="interested" class="text-success" >Interested</option>
                            <option value="not_interested" class="text-danger" >Not Interested</option>

                            <option value="less_interested" class="text-success" >Less Interested</option>
                            <option value="much_interested" class="text-success"  >Much Interested</option>
                            <option value="done" class="text-success" >Done</option>
                            <option value="not_answered" class="text-dark">Not Answered</option>
                            <option value="visitor" class="text-dark">Visitor</option>
                        </select>
                    </div>
                    <form action="" method="get" id="search">
                        
                    <div class="form-group">
                        <button class="btn btn-sm text-white" style="background-color: #ea1b23" type="submit" onclick="search_visit_status()">Search</button>
                    </div>
                    </form>
                </div>
                
                <div class="card-header" style="background-color: #ea1b23">
                    <h4 class="text-white">Visitor List</h4>
                    
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
                                    <th>Guardian</th>
                                    <th>University</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                    <th>Change Status</th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($visitors as $key=>$visitor)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$visitor->name}}</td>
                                    <td>{{$visitor->phone}}</td>
                                    <td>{{$visitor->guardian}}</td>
                                    <td>{{($visitor->university?$visitor->university->name:'')}}-{{($visitor->country?$visitor->country->name:'')}}</td>
                                    <td>{{$visitor->subject}}</td>
                                    <td>{{strtoupper(str_replace('_',' ',$visitor->status))}}</td>
                                    <td>
                                        <div class="form-group">
                                        <select name="status" class="custom-select mr-sm-2" id="change_status{{$visitor->id}}" onchange="changeStatus({{$visitor->id}})">
                                                <option value="0">Change Status</option>
                                                <option value="new_leads" class="text-warning" @if($visitor->status == 'new_leads') selected @endif>New Applied</option>
                                                <option value="scheduled" class="text-info" @if($visitor->status == 'scheduled') selected @endif>Scheduled</option>
                                                <option value="interested" class="text-success" @if($visitor->status == 'interested') selected @endif>Interested</option>
                                                <option value="not_interested" class="text-danger" @if($visitor->status == 'not_interested') selected @endif>Not Interested</option>

                                                <option value="less_interested" class="text-success" @if($visitor->status == 'less_interested') selected @endif>Less Interested</option>
                                                <option value="much_interested" class="text-success" @if($visitor->status == 'much_interested') selected @endif >Much Interested</option>
                                                <option value="done" class="text-success" @if($visitor->status ==
                                                 'done') selected @endif >Done</option>
                                                <option value="not_answered" class="text-dark" @if($visitor->status == 'not_answered') selected @endif>Not Answered</option>
                                                <option value="visitor" class="text-warning" @if($visitor->status == 'visitor') selected @endif>visitor</option>

                                            </select>
                                        </div>

                                        {{-- <div class="form-group">
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
 --}}
                                    </td>
                                    <td>
                                        <a class="btn btn-danger" style="background-color: #ea1b23" href="{{route('visitor.show',$visitor->id)}}">Details</a></td>
                                </tr> 
                                @empty
                                    <tr><th colspan="9">There is no data for this query</th></tr>
                                @endforelse
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

function changeStatus(visitor_id){
    var status=$('#change_status'+visitor_id).val();
    
    if(status==0){
        alert('Select One of Options');
    }else{
        $.ajax({
            type: "GET",
            url: "{{route('visitor.change_status')}}",
            data: { status:status, visitor_id:visitor_id }, 
            
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

<script>
    function search_visit_status(){
        var status = $('#search_status option:selected').val();
        
        var action="{{url('')}}/visitor/search/status/"+status;
        $('#search').attr('action',action);
        // $('#remarks').attr('value',data.remarks);
};
</script>

@endsection



 