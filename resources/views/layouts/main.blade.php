<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  

  <!-- icon -->
  <link rel="icon" href="{{asset('img/eedui.png')}}" type="image/png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{asset('css/custom/bootstrap.min.css')}}">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="{{asset('css/custom/mdb.min.css')}}">
  <!-- custom styles -->
  <link rel="stylesheet" href="{{asset('css/custom/style.css')}}">

  @yield('style')
</head>

<body>



  <!--Navbar -->
  <nav class="mb-1 navbar navbar-expand-lg navbar-light">

    <!--Brand Logo-->
    <a class="navbar-brand" href="{{route('welcome')}}"><img src="{{asset('img/eedu17.0p.png')}}" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
      aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{route('welcome')}}">Home
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('get-show-quizes')}}">Quizes</a>
        </li>
        @guest
        <li class="nav-item">
          <a class="nav-link" href="{{route('get-teacher-login')}}">Teacher Login</a>
        </li>
        @endguest
      </ul>
      <ul class="navbar-nav ml-auto nav-flex-icons" >

            @guest

                @if (!(\Request::is('*/login')))
                <li class="nav-item">
                    <a class="nav-link" href="{{route('get-student-login')}}" style="margin-top: 5px;">Login</a>
                </li>
                @endif
                @if (!(\Request::is('*/register')))
                <li class="nav-item">
                    <a href="{{route('get-student-register')}}"><button type="button" class="btn btn-purple waves-effect btn-md">Sign Up</button></a>
                </li>
                @endif
            @else

                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light">1
                        <i class="fas fa-envelope"></i>
                    </a>
                    </li>
                    <li class="nav-item avatar dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-55" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">

                        @if(Auth::user()->image_path == null)
                        <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-2.jpg" class="rounded-circle z-depth-0"
                        style="width: 25px; height: 25px;" alt="avatar image">
                        @else

                        <img src="{{asset('storage/images/'. Auth::user()->image_path)}}" class="rounded-circle z-depth-0"
                        style="width: 25px; height: 25px;" alt="avatar image">
                            

                        @endif

                    </a>
                    <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary"
                        aria-labelledby="navbarDropdownMenuLink-55">
                        <a class="dropdown-item" href="{{route('get-student-dashboard')}}">Dashboard</a>
                        <a class="dropdown-item" href="{{route('post-student-logout')}}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}>Log out
                        </a>

                        <form id="logout-form" action="{{ route('post-student-logout') }}" method="POST" style="display: none;">
                                        @csrf
                        </form>
                    </div>
                </li>

            @endguest

        
      </ul>
    </div>
  </nav>
  <!--/.Navbar -->

 
  @yield('content')





  <!-- Footer -->
<footer class="page-footer font-small blue-grey lighten-5">

  <div style="background-color: #43D8C9;">
    <div class="container">

      <!-- Grid row-->
      <div class="row py-4 d-flex align-items-center">

        <!-- Grid column -->
        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
          <h6 class="mb-0">Get connected with us on social networks!</h6>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-6 col-lg-7 text-center text-md-right">

          <!-- Facebook -->
          <a class="fb-ic">
            <i class="fab fa-facebook-f white-text mr-4"> </i>
          </a>
          <!-- Twitter -->
          <a class="tw-ic">
            <i class="fab fa-twitter white-text mr-4"> </i>
          </a>
          <!-- Google +-->
          <a class="gplus-ic">
            <i class="fab fa-google-plus-g white-text mr-4"> </i>
          </a>
          <!--Linkedin -->
          <a class="li-ic">
            <i class="fab fa-linkedin-in white-text mr-4"> </i>
          </a>
          <!--Instagram-->
          <a class="ins-ic">
            <i class="fab fa-instagram white-text"> </i>
          </a>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
  </div>

  <!-- Footer Links -->
  <div class="container text-center text-md-left mt-5">

    <!-- Grid row -->
    <div class="row mt-3 dark-grey-text">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-4 col-xl-3 mb-4">

        <!-- Content -->
        <h6 class="text-uppercase font-weight-bold">Eedu.lk</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>MPs who are leaving the protection of parliament for the campaign trail will render the election significantly more vulnerable to hacking, leading security researchers have warned. According to Dr Udo Helmbrecht, executive director of the European Union’s Agency for Network and Information Security</p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Products</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a class="dark-grey-text" href="#!">MDBootstrap</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">MDWordPress</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">BrandFlow</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">Bootstrap Angular</a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Useful links</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a class="dark-grey-text" href="#!">Your Account</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">Become an Affiliate</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">Shipping Rates</a>
        </p>
        <p>
          <a class="dark-grey-text" href="#!">Help</a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold">Contact</h6>
        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
        <p>
          <i class="fas fa-envelope mr-3"></i> info@example.com</p>
        <p>
          <i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
        <p>
          <i class="fas fa-print mr-3"></i> + 01 234 567 89</p>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center text-black-50 py-3">© 2020 Copyright:
    <a class="dark-grey-text" href="https://mdbootstrap.com/"> eedu.lk</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- /Footer -->




  <!-- jQuery -->
  <script type="text/javascript" src="{{asset('js/custom/jquery.js')}}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{asset('js/custom/popper.min.js')}}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{asset('js/custom/bootstrap.min.js')}}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{asset('js/custom/mdb.min.js')}}"></script>
  <!-- custom scripts -->
  <script type="text/javascript"></script>


  @yield('script')
 

</body>

</html>