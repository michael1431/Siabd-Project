@extends('layouts.master')
@section('title','Counselor Assign')
@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('leads.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Upload Excel File</label>
                                <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi_col_order"
                                   class="table table-striped table-bordered display no-wrap" style="width:100%">
                                <thead>
                                <tr>

                                    <th>S/L</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Remark</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($leads as $key=>$lead)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$lead->name}}</td>
                                        <td>{{$lead->phone}}</td>
                                        <td>{{$lead->email}}</td>
                                        <td>{{$lead->remarks}}</td>
                                        <td>
                                            <a href="#" style="background-color: #ea1b23"  data-toggle="modal" data-target="#edit{{$lead->id}}" class="btn btn-danger">Edit</a>
                                            <a href="{{route('leads.delete',$lead->id)}}" style="background-color: #ea1b23" class="btn btn-danger">x</a>
                                        </td>
                                    </tr>

                                    <!-- Modal -->
            <div class="modal fade" id="edit{{$lead->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="{{route('leads.update',$lead->id)}}" method="post">
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Edit Leads</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="exampleFormControlFile1">Name</label>
                                                            <input type="text" name="name" class="form-control" value="{{$lead->name}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlFile1">Email</label>
                                                            <input type="text" name="email" class="form-control" value="{{$lead->email}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlFile1">Phone</label>
                                                            <input type="text" name="phone" class="form-control" value="{{$lead->phone}}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="remarks">Remarks</label>
                                                            <input type="text" name="remarks" class="form-control" id="remarks" value="{{$lead->remarks}}">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>


                                    @empty
                                    <p>No Leads</p>
                                @endforelse
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>

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
@push('js')
@endpush