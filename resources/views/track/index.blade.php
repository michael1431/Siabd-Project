@extends('layouts.master')
@section('title','Track Activity')
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    {{-- <div class="row">
        <div class="col-xl-12">
            <div class="card" style="border:1px solid #0d0d0e">
                <div class="card-header" style="background-color: #0d0d0e">
                    <h4 class="text-white">University Create Form</h4>
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
                    <h4 class="text-white">Activities</h4>
                </div>
                <div class="card-body">
                    
                    <br>
                    <div class="table-responsive">
                        <table id="multi_col_order"
                            class="table table-striped table-bordered display no-wrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Updated By</th>
                                    <th>Role</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $key=>$data)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $data->user->name}}</td>
                                                <td>{{ $data->user->role->name}}</td>
                                                <td>{{ $data->updated_at}}</td>
                                                <td><a href="{{route('track.view',$data->id)}}"  class=" btn btn-success text-white">View</a></td>
                                               
                                            </tr>
                                @endforeach
                                
                                
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