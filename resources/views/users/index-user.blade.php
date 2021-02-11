@extends('layouts.new_master')
@section('title','User List')
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card" style="border:1px solid #ea1b23">
                <div class="card-header" style="background-color: #ea1b23">
                    <h4 class="text-white">User List  <button type="button" class="btn btn-danger" style="background-color:#000" data-toggle="modal" data-target="#danger-header-modal">Add User</button></h4>  
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="multi_col_order"
                            class="table table-striped table-bordered display no-wrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $key=>$user)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role->name}}</td>
                                    <td>
                                        <a class="btn btn-warning"  href="{{route('user.edit',$user->id)}}">Edit</a>
                                        <a class="btn btn-danger" style="background-color: #ea1b23" href="{{route('user.delete',$user->id)}}">Delete</a>
                                    </td>
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
<div id="danger-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel" aria-modal="true" >
    <div class="modal-dialog" style="background-color: #ea1b23">
        <div class="modal-content">
            <form class="mt-4" method="POST" action="{{ route('user.register') }}">
                @csrf
            <div class="modal-header modal-colored-header bg-dark">
                <h4 class="modal-title" id="danger-header-modalLabel">Register User</h4>
            </div>
            <div class="modal-body">    
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Your Name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone Address" pattern="[0-9]{11}">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <select name="role" class="custom-select mr-sm-2">
                                    @forelse ($roles as $role)
                                        <option value="{{$role->id}}" class="text-danger">{{$role->name}}</option>
                                    @empty
                                        
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input name="password" class="form-control" type="password" placeholder="A 8 Digit Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Repeate-password">
                            </div>
                        </div>
                        
                    </div>
                
            </div>
            <div class="modal-footer">
                <div class="col-lg-12 text-center">
                    <button type="submit" class="btn btn-block btn-dark">Sign Up</button>
                </div>
            </div>
        </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
@endsection
@section('script')

<script>
// function changeStatus(student_id){
//     var status=$('#change_status'+student_id).val();
//     if(status==0){
//         alert('Select One of Options');
//     }else{
//         $.ajax({
//             type: "GET",
//             url: "{{route('default.change_status')}}",
//             data: { status:status, student_id:student_id }, 
//             success: function( msg ) {
//                 console.log( msg );
//                 if(msg){
//                     location.reload();
//                 }
//             }
//         });
//     }
// }
</script>
 
@stop