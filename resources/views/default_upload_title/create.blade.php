@extends('layouts.master')
@section('title','DefaultUploadTitle')
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    {{-- <div class="row">
        <div class="col-xl-12">
            <div class="card" style="border:1px solid #0d0d0e">
                <div class="card-header" style="background-color: #0d0d0e">
                    <h4 class="text-white">defaultUploadTitle Create Form</h4>
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
                    <h4 class="text-white">DefaultUploadTitle List</h4>
                </div>
                <div class="card-body">
                    
                    <form method="post" action="{{route('setting.defaultUploadTitle.store')}}" style="border:1px solid #ea1b23">
                        @csrf
                        {{-- <h4 class="card-title">Student Application Form</h4>                               --}}
                        <div class="form-body" style="margin:13px;">
                            <div class="form-group row">
                               
                                <label class="col-md-3 text-dark">Default Upload Title</label>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="title" id="">
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
                                @forelse($defaultUploadTitles as $key=>$defaultUploadTitle)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $defaultUploadTitle->title }}</td>
                                                <td>{{ $defaultUploadTitle->created_at }}</td>
                                                <td>
                                                    <button data-toggle="modal" data-target="#update" class="fa fa-edit btn btn-success" onclick="editForm({{$defaultUploadTitle}})"></button>
                                                    
                                                   
             
                                                 <form id="delete-form" action="{{ route('setting.defaultUploadTitle.delete',$defaultUploadTitle->id) }}" method="POST" style="display: none;">
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
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle-2"> Update Title</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="card mb-5">
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data" id="title_edit_form">
                            @csrf

                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" name="title" id="title" value="">
                                </div>
                            </div>
                            
                            <button class="btn btn-primary ml-2" type="submit">Save changes</button>
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
<script>
    function editForm(data){
        var action="{{url('')}}/Settings/defaultUploadTitle_update/"+data.id;
        $('#title_edit_form').attr('action',action);
        $('#title').attr('value',data.title);
    }
</script>


@endsection