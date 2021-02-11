
@extends('layouts.master')
@section('title','Dashboard')
@section('content')
<div class="container-fluid">
    <div class="card-group">
        @php
            $hello=0;
        @endphp
        @forelse ($data as $key=>$number) 
        @php
            $hello++;
        @endphp
        <div class="card border-right">
            <div class="card-body" style="background: linear-gradient(to right,#ea1b23,#ea1b53);
            rgba(95,118,232,.21); border-radius:15px">

                <div class="d-flex d-lg-flex d-md-block align-items-center">
                    <a href="{{route('student.new.list',['status'=>$key])}}">
                    <div>
                        <div class="d-inline-flex align-items-center">
                        <h2 class="text-dark mb-1 font-weight-medium">{{$number}}</h2>
                            <span
                                class="badge bg-dark font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">+18.33%</span>
                        </div>
                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">{{ ucwords(str_replace('_',' ',$key))}}</h6>
                    </div>
                    </a>
                    <div class="ml-auto mt-md-3 mt-lg-0">
                        <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                    </div>
                </div>
            </div>
        </div>
            @if($hello%4==0)
                </div>
                <div class="card-group">
            @endif
        @empty
       
        @endforelse
    </div>
</div>
@endsection