
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('template')}}/assets/images/favicon_sia.png">

	<!-- Bootstrap CSS -->
	<link href="{{asset('template')}}/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('new_template')}}/css/bootstrap.min.css">

	<!-- Animate CSS -->
	<link rel="stylesheet" href="{{asset('new_template')}}/css/animate.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{asset('new_template')}}/css/owl.carousel.min.css">
	<link href="{{asset('template')}}/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
	<link href="{{asset('template')}}/dist/css/style.min.css" rel="stylesheet">

	<!-- Fontawesome Kit -->
	<script src="{{asset('new_template')}}/js/fontawesome.js"></script>

	<!-- Style -->
	<link rel="stylesheet" href="{{asset('new_template')}}/css/style.css">

	<title>@yield('title')</title>
    @stack('css')
</head>
<body>
    <div class="">
        <a href="{{ route('logout') }}" style=" " onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-sm  text-white --sia-red-bg">LOGOUT</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
    
	<header class="d-flex justify-content-center animated slideInDown">
        <a href="{{route('dashboard')}}">
        <img src="{{asset('new_template')}}/img/logo.jpg" alt="">
        </a> 
    </header>
    
    


	<div class="container mt-2">
        @if(Session::has('message'))
        <div style="margin: auto;max-width: 70%;" class="alert alert-{{Session::get('type')}} alert-dismissible bg-{{Session::get('type')}} text-white border-0 fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <strong>{{strtoupper(Session::get('type'))}} - </strong> {{Session::get('message')}}
        </div>
        @endif
		<div class="d-flex justify-content-center">
			<div class="dashboard-heading text-center --fs-40 --fw-b">
				@yield('title')
				                 {{-- <br> <span class="--sia-red --fs-56 dashboard-heading-admin">Program Offers</span> --}}
			</div>
		</div>
	</div>
@yield('content')

<footer class="container-fluid footer_style" style="position:fixed !important;bottom 0 !important">
    <div class="d-flex justify-content-between align-items-center">
        <div class="footer-info">
            <div class="--fs-20 --fw-b">YOUR ONE STOP SOLUTION FOR</div>
            <ul class="p-0 d-flex">
                <li class="--fs-20 --fw-b">STUDENT VISA</li>
                <li class="--fs-20 --fw-b ml-4">SCHOOLING VISA</li>
                <li class="--fs-20 --fw-b ml-4">SKILL MIGRATION</li>
            </ul>
        </div>
        {{-- <a href="{{asset('new_template')}}/" class="btn text-white --sia-red-bg pl-5 pr-5 --fs-20">FOR EMERGENCY</a> --}}
        {{-- <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn text-white --sia-red-bg pl-5 pr-5 --fs-20">LOGOUT</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form> --}}
    </div>
</footer>

<script src="{{asset('new_template')}}/js/custom.js"></script>
<script src="{{asset('template')}}/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="{{asset('template')}}/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="{{asset('template')}}/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="{{asset('template')}}/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="{{asset('template')}}/dist/js/app-style-switcher.js"></script>
    <script src="{{asset('template')}}/dist/js/feather.min.js"></script>
    <script src="{{asset('template')}}/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="{{asset('template')}}/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('template')}}/dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="{{asset('template')}}/assets/extra-libs/c3/d3.min.js"></script>
    <script src="{{asset('template')}}/assets/extra-libs/c3/c3.min.js"></script>
    <script src="{{asset('template')}}/assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="{{asset('template')}}/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="{{asset('template')}}/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="{{asset('template')}}/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{asset('template')}}/dist/js/pages/dashboards/dashboard1.min.js"></script>
    @stack('js')
    <script>
        $(document).ready(function(){
            $('#country').on('change', function(){
                var countryID = $(this).val();
                console.log(countryID)
                if(countryID){
                    $.ajax({
                        type:'GET',
                        url:"{{route('default.get_university')}}",
                        data:'country_id='+countryID,
                        success:function(html){
                            $('#university').html(html);
                            // $('#city').html('<option value="">Select university first</option>'); 
                        }
                    }); 
                }else{
                    $('#university').html('<option value="">Select Country first</option>');
                    // $('#city').html('<option value="">Select Counrty first</option>'); 
                }
            });
            
            $('#university').on('change', function(){
                var university = $(this).val();
                if(university){
                    $.ajax({
                        type:'GET',
                        url:"{{route('default.get_subject')}}",
                        data:'university_id='+university,
                        success:function(html){
                            $('#subject').html(html);
                        }
                    }); 
                }else{
                    $('#subject').html('<option value="">Select Counrty first</option>'); 
                }
            });
            $('#subject').on('change', function(){
                console.log('ok')
                var subject = $(this).val();
                var university = $('#university').val();
                if(university){
                    $.ajax({
                        type:'GET',
                        url:"{{route('default.get_program')}}",
                        data:{ university_id: university, subject_id: subject },
                        success:function(html){
                            $('#degree').html(html);
                        }
                    }); 
                }else{
                    $('#degree').html('<option value="">Select Counrty first</option>'); 
                }
            });
        });
        window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
            });
        }, 2000);
    </script>

</body>
</html>