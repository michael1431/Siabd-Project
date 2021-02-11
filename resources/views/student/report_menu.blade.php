@extends('layouts.new_master')
@section('title',strtoupper(auth()->user()->role->name)." ".'DASHBOARD')
@section('content')
<body>

	{{-- <header class="d-flex justify-content-center animated slideInDown">
		<a href="{{route('dashboard')}}">
		<img src="{{asset('new_template')}}/img/logo.jpg" alt="">
		</a>
	</header>

	<div class="container mt-2">
		<div class="d-flex justify-content-center">
			<div class="dashboard-heading text-center --fs-40 --fw-b">
				WELCOME TO SIA <br> <span class="--sia-red --fs-56 dashboard-heading-admin">ADMIN DASHBOARD</span>
			</div>
		</div>
	</div> --}}

	<div class="container mt-2">
		<div class="navigation-outer">

		
         <ul class="navigation-top list-unstyled align-items-center mb-0">
          
            <li class="navigation-link">
               <a href="{{route('student.new.list',['status'=>'new_leads'])}}">
                  <img class="img-fluid" src="{{asset('new_template')}}/img/overview.png" alt="">
               </a>
               <p class="--fs-10">NEW LEADS</p>
            </li>
           
            <li class="navigation-link">
               <a href="{{route('student.new.list',['status'=>'interested'])}}">
                  <img class="img-fluid" src="{{asset('new_template')}}/img/overview.png" alt="">
               </a>
               <p class="--fs-10"> INTERESTED</p>
            </li><li class="navigation-link">
               <a href="{{route('student.new.list',['status'=>'much_interested'])}}">
                  <img class="img-fluid" src="{{asset('new_template')}}/img/overview.png" alt="">
               </a>
               <p class="--fs-10">MUCH INTERESTED</p>
            </li>
            <li class="navigation-link">
               <a href="{{route('student.new.list',['status'=>'less_interested'])}}">
                  <img class="img-fluid" src="{{asset('new_template')}}/img/overview.png" alt="">
               </a>
               <p class="--fs-10">LESS INTERESTED</p>
            </li>
            
         </ul>
			
			
         <ul class="navigation-top list-unstyled align-items-center mb-0">
           
            <li class="navigation-link">
               <a href="{{route('student.new.list',['status'=>'not_interested'])}}">
                  <img class="img-fluid" src="{{asset('new_template')}}/img/overview.png" alt="">
               </a>
               <p class="--fs-10">NOT INTERESTED</p>
            </li>

            <li class="navigation-link">
               <a href="{{route('student.new.list',['status'=>'not_answered'])}}">
                  <img class="img-fluid" src="{{asset('new_template')}}/img/overview.png" alt="">
               </a>
               <p class="--fs-10">NOT ANSWERED</p>
            </li> 
            <li class="navigation-link">
               <a href="{{route('visitor.list')}}">
                  <img class="img-fluid" src="{{asset('new_template')}}/img/overview.png" alt="">
               </a>
               <p class="--fs-10">VISITORS</p>
            </li>
            <li class="navigation-link">
               <a href="{{route('student.new.list',['status'=>'done'])}}">
                  <img class="img-fluid" src="{{asset('new_template')}}/img/overview.png" alt="">
               </a>
               <p class="--fs-10">DONE</p>
            </li>
				
			</ul>
		</div>
	</div>

	
@endsection
