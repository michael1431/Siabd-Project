@extends('layouts.new_master')
@section('title','Update User')
@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card" style="border:1px solid #ea1b23">
               
                <div class="card-body">
                  <form class="mt-4" method="POST" action="{{ route('user.update', $user->id) }}">
                     @csrf
                         <div class="row">
                             <div class="col-lg-12">
                                 <div class="form-group">
                                     <input id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" autocomplete="name" autofocus>
                                         @error('name')
                                             <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                 </div>
                             </div>
                             <div class="col-lg-12">
                                 <div class="form-group">
                                     <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" autocomplete="email" >
                                         @error('email')
                                             <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                 </div>
                             </div>
                             <div class="col-lg-12">
                                 <div class="form-group">
                                     <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" autocomplete="phone"  pattern="[0-9]{11}">
                                         @error('phone')
                                             <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                             </span>
                                         @enderror
                                 </div>
                             </div>
                             <div class="col-lg-12">
                                 <div class="form-group">
                                     <select name="role_id" class="custom-select mr-sm-2">
                                         @forelse ($roles as $role)
                                             <option value="{{$role->id}}" class="text-danger"
                                                @if($user->role_id == $role->id ) selected @endif>{{$role->name}}</option>
                                         @empty
                                             
                                         @endforelse
                                     </select>
                                 </div>
                             </div>
                             <div class="col-lg-12">
                              <div class="form-group">
                                 <button class="btn btn-danger">Update</button>
                              </div>
                             </div>
                             
                         </div>
                 </form>
                </div>
            </div>
        </div>
    </div>
</div>

            
        
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