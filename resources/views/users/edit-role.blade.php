@extends('layouts.master')
@section('title','Edit User Role')
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card" style="border:1px solid #ea1b23">
                <div class="card-header" style="background-color: #ea1b23">
                    <h4 class="text-white">User Role List</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('user.role.update',$role->id)}}">
                        @csrf
                        {{-- <h4 class="card-title">Student Application Form</h4>                               --}}
                        <div class="form-body">
                            <div class="form-group row">
                                <div class="col-md-1"></div>
                                <label class="col-md-2 text-dark">Role Name:* </label>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" id="" value="{{$role->name}}">
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" id="checked_entirely" onclick="checkEntire()" value="1">
                                    </div>

                                </div>
                                <div class="col-md-1"></div>
                            </div>
                            <table id="multi_col_order" class="table table-striped table-bordered display"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Permissions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($permission_groups as $key=>$permissions)
                                {{--User Permission Start--}}
                                    <tr>
                                        <th><h5>{{$key}}</h5></th>
                                        <th>
                                                <input id="{{strtolower($key)}}-select-all" onclick="checkAll('{{strtolower($key)}}')" type="checkbox" class="allCheck">
                                                <label for="{{strtolower($key)}}-select-all"> Select all {{$key}}</label>
                                        </th>
                                        <th>
                                            @forelse($permissions as $permission)
                                            
                                                <div class="checkbox">
                                                    <input  type="checkbox" class="{{strtolower($key)}}-select allCheck" name="asignpermission[]" value="{{$permission->id}}" {{checkPermission($role->id,$permission->id)?'checked':''}}>
                                                    <label for="demo-form-checkbox">{{$permission->lebel}}</label>
                                                </div>
                                            @empty
                                            @endforelse
                                        </th>
                                    </tr>                                           
                                @empty
                                @endforelse
                            </tbody>

                        </table>
                        </div>
                            
                        <div class="form-actions">
                            <div class="text-right">
                                <button type="submit" class="btn btn-danger" style="background-color: #ea1b23">Submit</button>
                            </div>
                        </div>
                    </form>
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

@section('script')
    <!-- page script -->
    <script type="text/javascript">
    function checkAll(lebel_group){
        var consd=$("."+lebel_group+"-select").attr('checked');
        if(consd){
             $("."+lebel_group+"-select").attr('checked', false);
             }else{
                $("."+lebel_group+"-select").attr('checked', true);
             }
               
        }
    function checkEntire(){
        var checkedEntirely=$("#checked_entirely").val();
            if(checkedEntirely){
                $(".allCheck").prop("checked",true);
                $("#checked_entirely").val(0);   
            }else{
                $(".allCheck").prop("checked",false);
                $("#checked_entirely").val(1);    
            }
         
        }
        

    </script>
@stop
