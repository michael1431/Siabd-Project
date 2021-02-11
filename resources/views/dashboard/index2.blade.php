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

			

			{{-- ==================Admin================== --}}
			@if(Auth::user()->role_id==1)
			
				<ul class="navigation-top list-unstyled align-items-center mb-0">
					<li class="navigation-link">
						<a href="{{route('studentlist.schedule')}}">
							<img class="img-fluid" src="{{asset('new_template')}}/img/eligibilitycheck.png" alt="">
						</a>
						<p class="--fs-24 --fw-b">TODAY'S SCHEDULE</p>
					</li>

					<li class="navigation-link">
						<a href="{{route('check')}}">
							<img class="img-fluid" src="{{asset('new_template')}}/img/eligibilitycheck.png" alt="">
						</a>
						<p class="--fs-24 --fw-b">ELIGIBILITY CHECK</p>
					</li>
					
					<li class="navigation-link">
						<a href="{{route('studentlist.create')}}">
							<img class="img-fluid" src="{{asset('new_template')}}/img/applications.png" alt="">
						</a>
						<p class="--fs-24 --fw-b">APPLICATION</p>
					</li>
					

					{{-- <li class="navigation-link">
						<a href="{{route('visitor.list')}}">
							<img class="img-fluid" src="{{asset('new_template')}}/img/sale.png" alt="">
						</a> --}}
						{{-- <a href="javascript:void(0);">
							<img class="img-fluid" src="{{asset('new_template')}}/img/sale.png" alt="">
						</a> --}}
						{{-- <p class="--fs-24 --fw-b">VISITOR</p>
					</li> --}}
						
					<li class="navigation-link">
						<a href="{{route('user.list.index',['role'=>4])}}">
							<img class="img-fluid" src="{{asset('new_template')}}/img/partner.png" alt="">
						</a>
						<p class="--fs-24 --fw-b">PARTNERS</p>
					</li>

					<li class="navigation-link">
						<a href="{{route('visitor.create')}}">
							<img class="img-fluid" src="{{asset('new_template')}}/img/partner.png" alt="">
						</a>
						<p class="--fs-24 --fw-b">ASSESSMENT FORM</p>
					</li>
											
						
				</ul>

				
				
				<ul class="navigation-bottom list-unstyled align-items-center mb-0">

					@if(Auth::user()->role_id==2)
						<li class="navigation-link">
							<a href="{{route('offers')}}">
								<img class="img-fluid" src="{{asset('new_template')}}/img/overview.png" alt="">
							</a>
							<p class="--fs-24 --fw-b">OVERVIEW</p>
						</li>

						<li class="navigation-link">
							<a href="{{ route('studentlist.update_remarks')}}">
								<img class="img-fluid" src="{{asset('new_template')}}/img/applications.png" alt="">
							</a>
							<p class="--fs-24 --fw-b">UPDATE & REMARKS</p>
						</li>
					@endif
					<li class="navigation-link">
							
						<div class="dropdown">
							<a onclick="myFunction()" class="dropbtn">
								<img class="img-fluid" src="{{asset('new_template')}}/img/account.png" alt="">
							</a>
						</div>
						<p class="--fs-24 --fw-b">ACCOUNT</p>
					</li>

						
					<li class="navigation-link">
						<a href="{{route('student.assign.create')}}">
							<img class="img-fluid" src="{{asset('new_template')}}/img/activity.png" alt="">
						</a>
						<p class="--fs-24 --fw-b">ACTIVITY</p>
					</li>

					<li class="navigation-link">
						<a href="{{route('offers')}}">
							<img class="img-fluid" src="{{asset('new_template')}}/img/overview.png" alt="">
						</a>
						<p class="--fs-24 --fw-b">OVERVIEW</p>
					</li>
					
					<li class="navigation-link">
						<a href="{{route('student.report.menu')}}">
							<img class="img-fluid" src="{{asset('new_template')}}/img/sale.png" alt="">
						</a>
						{{-- <a href="javascript:void(0);">
							<img class="img-fluid" src="{{asset('new_template')}}/img/sale.png" alt="">
						</a> --}}
						<p class="--fs-24 --fw-b">REPORT</p>
					</li>
					
					<li class="navigation-link">
						<a href="{{route('user.list.index',['role'=>3])}}">
							<img class="img-fluid" src="{{asset('new_template')}}/img/counselor.png" alt="">
						</a>
						<p class="--fs-24 --fw-b">COUNSELOR</p>
					</li>
					<li class="navigation-link">                
						<a href="{{route('user.role.index')}}">
							<img class="img-fluid" src="{{asset('new_template')}}/img/cpanel.png" alt="">
						</a>
						<p class="--fs-24 --fw-b"> {{ 'SETTINGS' }}</p>
					</li>
					
				</ul>
				{{--  <ul class="navigation-top list-unstyled align-items-center mb-0">
					<li class="navigation-link">                
						<a href="{{route('user.role.index')}}">
							<img class="img-fluid" src="{{asset('new_template')}}/img/cpanel.png" alt="">
						</a>
						<p class="--fs-24 --fw-b"> {{ 'SETTINGS' }}</p>
					</li>
				</ul>  --}}
			@endif

			@if(Auth::user()->role_id==2)
			<ul class="navigation-top list-unstyled align-items-center mb-0">
				
				<li class="navigation-link">
					<a href="{{route('check')}}">
						<img class="img-fluid" src="{{asset('new_template')}}/img/eligibilitycheck.png" alt="">
					</a>
					<p class="--fs-24 --fw-b">ELIGIBILITY CHECK</p>
				</li>
				
				<li class="navigation-link">
					<a href="{{route('studentlist.create')}}">
						<img class="img-fluid" src="{{asset('new_template')}}/img/applications.png" alt="">
					</a>
					<p class="--fs-24 --fw-b">APPLICATION</p>
				</li>

				<li class="navigation-link">
					<a href="{{route('visitor.create')}}">
						<img class="img-fluid" src="{{asset('new_template')}}/img/partner.png" alt="">
					</a>
					<p class="--fs-24 --fw-b">ASSESSMENT FORM</p>
			    </li>
				{{-- ============Demo Menu/ Delete it====== --}}
				
			</ul>

			
			
			<ul class="navigation-bottom list-unstyled align-items-center mb-0">

					<li class="navigation-link">
						<a href="{{route('offers')}}">
							<img class="img-fluid" src="{{asset('new_template')}}/img/overview.png" alt="">
						</a>
						<p class="--fs-24 --fw-b">OVERVIEW</p>
					</li>

					<li class="navigation-link">
						<a href="{{ route('studentlist.update_remarks')}}">
							<img class="img-fluid" src="{{asset('new_template')}}/img/applications.png" alt="">
						</a>
						<p class="--fs-24 --fw-b">UPDATE & REMARKS</p>
					</li>
				
			</ul>
			@endif

			{{-- ==================Couns================== --}}
			@if(Auth::user()->role_id==3)
				<ul class="navigation-top list-unstyled align-items-center mb-0">
					<li class="navigation-link">
						<a href="{{route('studentlist.schedule')}}">
							<img class="img-fluid" src="{{asset('new_template')}}/img/eligibilitycheck.png" alt="">
						</a>
						<p class="--fs-24 --fw-b">TODAY'S SCHEDULE</p>
					</li>
					<li class="navigation-link">
						<a href="{{route('check')}}">
							<img class="img-fluid" src="{{asset('new_template')}}/img/eligibilitycheck.png" alt="">
						</a>
						<p class="--fs-24 --fw-b">ELIGIBILITY CHECK</p>
					</li>
					
					<li class="navigation-link">
						<a href="{{route('studentlist.create')}}">
							<img class="img-fluid" src="{{asset('new_template')}}/img/applications.png" alt="">
						</a>
						<p class="--fs-24 --fw-b">APPLICATION</p>
					</li>
					{{-- ============Demo Menu/ Delete it====== --}}
					
											
						<li class="navigation-link">
							
							<div class="dropdown">
								<a onclick="myFunction()" class="dropbtn">
									<img class="img-fluid" src="{{asset('new_template')}}/img/account.png" alt="">
								</a>
							</div>
							<p class="--fs-24 --fw-b">ACCOUNT</p>
						</li>
				</ul>

			
			
				<ul class="navigation-bottom list-unstyled align-items-center mb-0">

			
						
					{{-- <li class="navigation-link">
						<a href="{{route('student.assign.create')}}">
							<img class="img-fluid" src="{{asset('new_template')}}/img/activity.png" alt="">
						</a>
						<p class="--fs-24 --fw-b">ACTIVITY</p>
					</li> --}}

					<li class="navigation-link">
						<a href="{{route('visitor.create')}}">
							<img class="img-fluid" src="{{asset('new_template')}}/img/partner.png" alt="">
						</a>
						<p class="--fs-24 --fw-b">ASSESSMENT FORM</p>
					</li>
					
					<li class="navigation-link">
						<a href="{{route('offers')}}">
							<img class="img-fluid" src="{{asset('new_template')}}/img/overview.png" alt="">
						</a>
						<p class="--fs-24 --fw-b">OVERVIEW</p>
					</li>
					
					<li class="navigation-link">
						<a href="{{route('student.report.menu')}}">
							<img class="img-fluid" src="{{asset('new_template')}}/img/sale.png" alt="">
						</a>
						<p class="--fs-24 --fw-b">REPORT</p>
					</li>
					
					
					
				</ul>
			@endif

			
			{{-- ==================Partner================== --}}
			@if(Auth::user()->role_id==4)
				<ul class="navigation-top list-unstyled align-items-center mb-0">
					
					<li class="navigation-link">
						<a href="{{route('check')}}">
							<img class="img-fluid" src="{{asset('new_template')}}/img/eligibilitycheck.png" alt="">
						</a>
						<p class="--fs-24 --fw-b">ELIGIBILITY CHECK</p>
					</li>
					
					<li class="navigation-link">
						<a href="{{route('studentlist.create')}}">
							<img class="img-fluid" src="{{asset('new_template')}}/img/applications.png" alt="">
						</a>
						<p class="--fs-24 --fw-b">APPLICATION</p>
					</li>

					<li class="navigation-link">
					<a href="{{route('visitor.create')}}">
						<img class="img-fluid" src="{{asset('new_template')}}/img/partner.png" alt="">
					</a>
					<p class="--fs-24 --fw-b">ASSESSMENT FORM</p>
				    </li>
					{{-- ============Demo Menu/ Delete it====== --}}
					
						
				</ul>

			
			
				<ul class="navigation-bottom list-unstyled align-items-center mb-0">

								
					<li class="navigation-link">
							
						<div class="dropdown">
							<a onclick="myFunction()" class="dropbtn">
								<img class="img-fluid" src="{{asset('new_template')}}/img/account.png" alt="">
							</a>
						</div>
						<p class="--fs-24 --fw-b">ACCOUNT</p>
					</li>
						
					
					
					<li class="navigation-link">
						<a href="{{route('offers')}}">
							<img class="img-fluid" src="{{asset('new_template')}}/img/overview.png" alt="">
						</a>
						<p class="--fs-24 --fw-b">OVERVIEW</p>
					</li>
					
					
					
					
					
				</ul>
			@endif
			
			{{-- ==================Accountant================== --}}
			
			
			@if(Auth::user()->role_id==5)
				<ul class="navigation-top list-unstyled align-items-center mb-0">
					<li class="navigation-link">
						<a href="{{route('studentlist.schedule')}}">
							<img class="img-fluid" src="{{asset('new_template')}}/img/eligibilitycheck.png" alt="">
						</a>
						<p class="--fs-24 --fw-b">TODAY'S SCHEDULE</p>
					</li>
					<li class="navigation-link">
						<a href="{{route('check')}}">
							<img class="img-fluid" src="{{asset('new_template')}}/img/eligibilitycheck.png" alt="">
						</a>
						<p class="--fs-24 --fw-b">ELIGIBILITY CHECK</p>
					</li>
					
					<li class="navigation-link">
						<a href="{{route('studentlist.create')}}">
							<img class="img-fluid" src="{{asset('new_template')}}/img/applications.png" alt="">
						</a>
						<p class="--fs-24 --fw-b">APPLICATION</p>
					</li>
					{{-- ============Demo Menu/ Delete it====== --}}
					
											
						<li class="navigation-link">
							
							<div class="dropdown">
								<a onclick="myFunction()" class="dropbtn">
									<img class="img-fluid" src="{{asset('new_template')}}/img/account.png" alt="">
								</a>
							</div>
							<p class="--fs-24 --fw-b">ACCOUNTANT</p>
						</li>
				</ul>

			
			
				<ul class="navigation-bottom list-unstyled align-items-center mb-0">

			
						
					{{-- <li class="navigation-link">
						<a href="{{route('student.assign.create')}}">
							<img class="img-fluid" src="{{asset('new_template')}}/img/activity.png" alt="">
						</a>
						<p class="--fs-24 --fw-b">ACTIVITY</p>
					</li> --}}

					<li class="navigation-link">
						<a href="{{route('visitor.create')}}">
							<img class="img-fluid" src="{{asset('new_template')}}/img/partner.png" alt="">
						</a>
						<p class="--fs-24 --fw-b">ASSESSMENT FORM</p>
					</li>
					
					<li class="navigation-link">
						<a href="{{route('offers')}}">
							<img class="img-fluid" src="{{asset('new_template')}}/img/overview.png" alt="">
						</a>
						<p class="--fs-24 --fw-b">OVERVIEW</p>
					</li>
					
					<li class="navigation-link">
						<a href="{{route('student.report.menu')}}">
							<img class="img-fluid" src="{{asset('new_template')}}/img/sale.png" alt="">
						</a>
						<p class="--fs-24 --fw-b">REPORT</p>
					</li>
					
					
					
				</ul>
			@endif
			
			
			
			
		</div>
	</div>

	
@endsection
