@extends('layouts.master')
@section('title','Accounts Head Edit')
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    {{-- <div class="row">
        <div class="col-xl-12">
            <div class="card" style="border:1px solid #0d0d0e">
                <div class="card-header" style="background-color: #0d0d0e">
                    <h4 class="text-white">Accounts Head Edit Form</h4>
                </div>
                <div class="card-body">





                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div> --}}
    <!-- end row-->
    <div class="row">
        <div class="col-12">
            <div class="card" style="border:1px solid #ea1b23">
                <div class="card-header" style="background-color: #ea1b23">
                    <h4 class="text-white">Accounts Head List</h4>
                </div>
                <div class="card-body">
                    
                    <form method="post" action="{{route('account.head.update',$acc_type->id)}}" style="border:1px solid #ea1b23">
                        @csrf
                        {{-- <h4 class="card-title">Student Application Form</h4>                               --}}
                        <div class="form-body" style="margin:13px">
                            <div class="form-group row">
                               
                                <label class="col-md-2 text-dark">Accounts Head</label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <input type="text" class="form-control" name="name" id="" value="{{$acc_type->name}}">
                                    </div>
                                </div>
                                <div class="col-md-4 text-dark">
                                    <div class="form-group">
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="customControlValidation1" name="type" value="0" {{ $acc_type->type ? '' : 'checked' }}>
                                                <label class="custom-control-label" for="customControlValidation1">Income</label>
                                            </div>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" class="custom-control-input" id="customControlValidation2" name="type" value="1" {{ $acc_type->type ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="customControlValidation2">Expense</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
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
                                    <th>Type</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($types as $key=>$type)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $type->name }}</td>
                                                <td>{{ $type->type?'Expense':'Income' }}</td>
                                                <td>{{ $type->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('account.head.edit',$type->id) }}" class="fa fa-edit btn btn-success"></a>
                                                    <a class="fa fa-trash btn btn-danger" href="{{ route('account.head.delete',$type->id) }}"
                                                        onclick="event.preventDefault();
                                                                      document.getElementById('delete-form').submit();">
                                                     </a>
                 
                                                     <form id="delete-form" action="{{ route('account.head.delete',$type->id) }}" method="POST" style="display: none;">
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