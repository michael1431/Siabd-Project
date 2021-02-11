@extends('layouts.master')
@section('title','All Roles')
@section('content')
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card" style="border:1px solid #ea1b23">
                <div class="card-header" style="background-color: #ea1b23">
                    <h4 class="text-white">User Role List <a href="{{route('user.role.create')}}" class="btn btn-dark float-right">Add New</a></h4>
                   
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="multi_col_order" class="table table-striped table-bordered display"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <td> #SL</td>
                                    <td>Roles</td>
                                    <td> Permissions</td>
                                    <td> Action</td>
                                </tr>
                            </thead>

                            <tbody>
                                {{-- @php $i=0; @endphp --}}
                                @forelse($roles as $key=>$info)
                                <tr>
                                    <td> {{ $key+1 }}</td>
                                    <td> {{ strtoupper($info->name)  }}</td>
                                    <td>
                                        @forelse($info->permissions as $permission)
                                        <span class="badge badge-info">{{ $permission->lebel }}</span>
                                        @empty
                                        @endforelse
                                    </td>
                                    <td>
                                        <a href="{{ route('user.role.edit',$info->id) }}"
                                            class="btn btn-edit btn-success far fa-edit"></a>
                                        {{-- {{ Form::button('',['class'=>'btn btn-danger fas fa-trash-alt erase','data-id'=>$info->id,'data-url'=>route('user.role.destroy')]) }} --}}

                                    </td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>

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
