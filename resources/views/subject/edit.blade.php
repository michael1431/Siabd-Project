@extends('layouts.master')
@section('title','Subject')
@section('content')
<div class="container-fluid">
 
    <div class="row">
        <div class="col-12">
            <div class="card" style="border:1px solid #ea1b23">
                <div class="card-header" style="background-color: #ea1b23">
                    <h4 class="text-white"> Subject List </h4>
                </div>
                <div class="card-body">
                    
                    <form method="post" action="{{route('account.head.update', $subject->id)}}" style="border:1px solid #ea1b23">
                        @csrf
                        {{-- <h4 class="card-title">Student Application Form</h4> --}}
                        <div class="form-body" style="margin:13px;">
                            <div class="form-group row">
                               
                                <label class="col-md-3 text-dark"> Subject </label>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger" style="background-color: #ea1b23">Submit</button>
                                    </div>
                                </div>
                                
                            </div>
                            

                        </div>
                    </form>
                    <br>
                    <div class="table-responsive">
                        <table id="multi_col_order"
                            class="table table-striped table-bordered display no-wrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($subjects as $key=>$subject)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $subject->name }}</td>
                                                <td>{{ $subject->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('setting.subject.edit',$subject->id) }}" class="fa fa-edit btn btn-success"></a>
                                                    
                                                    <a class="fa fa-trash btn btn-danger" href="{{ route('setting.subject.delete',$subject->id) }}"
                                                    onclick="event.preventDefault();
                                                                  document.getElementById('delete-form').submit();">
                                                 </a>
             
                                                 <form id="delete-form" action="{{ route('setting.subject.delete',$subject->id) }}" method="POST" style="display: none;">
                                                     @csrf
                                                 </form>
                                                </td>
                                            </tr>
                                        
                                @empty
                                    <tr><th colspan="5">There is no data for this query</th></tr>
                                @endforelse
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>


@endsection