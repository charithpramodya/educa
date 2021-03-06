<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<title>Admin DashBoard</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">


	<!-- icon -->
	<link rel="icon" href="{{asset('/img/eedui.png')}}" type="image/png">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<!-- Google Fonts Roboto -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="{{asset('css/admin/bootstrap.min.css')}}">
	<!-- Material Design Bootstrap -->
	<link rel="stylesheet" href="{{asset('css/admin/mdb.min.css')}}">



	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('css/admin/style.css')}}">
</head>

<body>

	<!--Navbar -->
	<nav class="mb-1 navbar navbar-expand-lg navbar-dark " style="background: purple;">

		<!--Brand Logo-->
		<a class="navbar-brand" href="#"><img src="/img/eedu17wp.png" alt="" style="height: 30px;"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
			aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent-555">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item ">
					<a class="nav-link" href="/Home.html">Home
						<span class="sr-only">(current)</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/quizes.html">Quizes</a>
				</li>

			</ul>
			<ul class="navbar-nav ml-auto nav-flex-icons">
				<li class="nav-item avatar dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false">
                        @if(Auth::user()->image_path == null)
                            <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="rounded-circle z-depth-0"
                            style="width: 25px; height: 25px;" alt="avatar image">
                        @else
                            <img src="{{asset('storage/images/'. Auth::user()->image_path)}}"
                                class="rounded-circle z-depth-0" style="width: 25px; height: 25px;" alt="avatar image">
                        @endif

                        {{Auth::user()->name}}
					</a>
					<div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary"
						aria-labelledby="navbarDropdownMenuLink-55">
						<a class="dropdown-item" href="{{route('post-student-logout')}}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('post-student-logout') }}" method="POST" style="display: none;">
                                        @csrf
                        </form>
					</div>
				</li>
			</ul>
		</div>
	</nav>
	<!--/.Navbar -->

	
	<div class="wrapper d-flex align-items-stretch">
		<!--/Side bar -->
		<nav id="sidebar">
			<div class="custom-menu" style="margin-bottom: 0%;">
				<button type="button" id="sidebarCollapse" class="btn btn-purple" >
					<i class="fas fa-ellipsis-h" style="color: white;"></i>
					<span class="sr-only">Toggle Menu</span>
				</button>
			</div>
			<div class="p-4 pt-5" style="background: white;">
				<a href="index.html" class="logo"><img src="/img/eedu17.0p.png" alt="" style="margin-bottom: 15px;"></a>
				<ul class="list-unstyled components mb-5">
					<li class="active">
						<a href="{{route('get-admin-dashboard')}}" style="color: purple;">DashBoard</a>
					</li>
					<li>
						<a href="adminprofile.html" style="color: black;">Profie</a>
					</li>
					<li>
						<a href="{{route('get-admin-profile-quiz')}}" style="color: black;">Quiz List</a>
					</li>
					<li>
						<a href="{{route('get-admin-profile-subject')}}" style="color: black;">Subjects</a>
					</li>
					<li>
						<a href="{{route('get-admin-profile-teacher')}}" style="color: black;">Teachers</a>
					</li>
					<li>
						<a href="{{route('get-admin-profile-exam')}}" style="color: black;">Exams</a>
					</li>
					<li>
						<a href="{{route('get-admin-profile-module')}}" style="color: black;">Modules</a>
					</li>

				</ul>

			</div>
		</nav>
		<!--/.sidenbar -->

		<!-- Page Content  -->
		<div id="content" class="p-4 p-md-5 pt-5" style="margin-top: 25px;">

			<!--Main layout-->
			<main class="pt-5 mx-lg-5">
				<div class="container-fluid mt-5">

					<!-- Heading -->
					<div class="card mb-4 wow fadeIn" >

						<!--Card content-->
						<div class="card-body d-sm-flex justify-content-between">

							<h4 class="mb-2 mb-sm-0 pt-1">
								<a href="/Home.html" style="color: purple;">Home Page</a>
								<span>/</span>
								<span>Dashboard</span>
							</h4>

							<form class="d-flex justify-content-center">
								<!-- Default input -->
								<input style="background: #eeeeee;" type="search" placeholder="search" aria-label="Search" class="form-control">
								<button class="btn btn-purple btn-sm my-0 p" type="submit">
									<i class="fas fa-search" style="color: white;"></i>
								</button>
							</form>

						</div>

					</div>
					<!-- Heading -->

					@yield('content')

				</div>
			</main>
			<!--Main layout-->


			<!-- SCRIPTS -->
			<!-- JQuery -->
			<script type="text/javascript" src="{{asset('js/custom/jquery.js')}}"></script>
			<!-- Bootstrap tooltips -->
			<script type="text/javascript" src="{{asset('js/admin/popper.js')}}"></script>
			<!-- Bootstrap core JavaScript -->
			<script type="text/javascript" src="{{asset('js/admin/bootstrap.min.js')}}"></script>
			<!-- MDB core JavaScript -->
			<script type="text/javascript" src="{{asset('js/custom/mdb.min.js')}}"></script>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
			<!-- Initializations -->
			<script type="text/javascript">
				// Animations initialization
				new WOW().init();
			</script>

			@yield('script')

		</div>
	</div>

	
	<script src="{{asset('js/admin/main.js')}}"></script>
</body>

</html>