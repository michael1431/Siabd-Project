@extends('layouts.master')
@section('title','Degree Types List')
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card" style="border:1px solid #ea1b23">
                <div class="card-header" style="background-color: #ea1b23">
                    <h4 class="text-white">Degree Types List</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="multi_col_order"
                            class="table table-striped table-bordered display no-wrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $sl=1;     
                                @endphp
                                @forelse ($types as $key=>$type)
                                <tr>
                                    <td>{{$sl++}}</td>
                                    <td>{{ $type->name }}</td>
                                    <td><a class="btn btn-danger" style="background-color: #ea1b23" href="#" data-toggle="modal" data-target="#update"
                                        onclick="editForm({{$type}})" >Edit</a></td>
                                </tr> 
                                @empty
                                    <tr><th colspan="7">There is no data for this query</th></tr>
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
                <h5 class="modal-title" id="exampleModalCenterTitle-2"> Update Degree Type</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="card mb-5">
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data" id="degreeType_edit_form">
                            @csrf

                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <label for="">Degree Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="">
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
        var action="{{url('')}}/Settings/degree_type_update/"+data.id;
        $('#degreeType_edit_form').attr('action',action);
        $('#name').attr('value',data.name);
    }
</script>
@endsection