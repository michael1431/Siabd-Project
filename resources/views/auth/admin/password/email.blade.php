@extends('layouts.auth_master')

@section('auth_content')
<div class="auth-box row">
    <div class="col-lg-7 col-md-5 modal-bg-img"
        style="background-image: url({{asset('template')}}/assets/images/big/SL2.jpg);">
    </div>
    <div class="col-lg-5 col-md-7 bg-white">
        <div class="p-3">
            <div class="text-center">
                <img src="{{asset('template')}}/assets/images/logo-icon-sia.png" alt="wrapkit">
            </div>
            <h2 class="mt-3 text-center">Password Reset</h2>
            <form class="mt-4" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-dark" for="email">Email Address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>

                    
                {{--     
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="text-dark" for="password">Password</label>
                            <input id="password" name="password" class="form-control" type="password" placeholder="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                    </div> --}}

                    <div class="col-lg-12 text-center">
                        <button type="submit" class="btn btn-block btn-dark">Sent Password Reset Link</button>

                    </div>

                    

                    <div class="col-lg-12 text-center mt-5">
                        {{-- @if (Route::has('password.request')) --}}
                                   {{--  <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a> --}}
                    {{--     @endif --}}
                        {{-- <br> --}}
                       
                        Don't have an account? <a href="{{route('register')}}" class="text-danger">Sign Up</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection