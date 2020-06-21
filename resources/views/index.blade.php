@extends('layouts.main')

@section('content')

<!--Landig art-->
  <div class="main-art-container">
    <!--Section: Content-->
    <section class="dark-grey-text">

      <div class="row pr-lg-5">
        <div class="col-md-7 mb-4">

          <div class="view">
            <img src="img/art.png" class="img-fluid" alt="smaple image">
          </div>

        </div>
        <div class="col-md-5 d-flex align-items-center">
          <div>

            <h3 class="font-weight-bold mb-4">
              <colorpurple>Welcome to e</colorpurple>edu.lk
            </h3>

            <p>Lorem ipsum dolor sit amet consectetur adip elit. Maiores deleniti explicabo voluptatem quisquam nulla
              asperiores aspernatur aperiam voluptate et consectetur minima delectus, fugiat eum soluta blanditiis
              adipisci, velit dolore magnam.</p>

            <button type="button" class="btn btn-rounded mx-0" style="background-color: #95389E; color: white;">Try
              Now</button>

          </div>
        </div>
      </div>

    </section>
    <!--Section: Content-->
  </div>
  <!--/Landig art-->





  <!--Counters-->
  <div class="container my-5">

    <!--Section: Content-->
    <section class="p-5">

      <h3 class="text-center font-weight-bold mb-5">
        <colorpurple>Counter</colorpurple>
      </h3>

      <div class="row d-flex justify-content-center">

        <div class="col-md-6 col-lg-3 mb-4 text-center">
          <h4 class="h1 font-weight-normal mb-3">
            <i class="fas fa-file-alt purple-text"></i>
            <span class="d-inline-block count-up" data-from="0" data-to="100" data-time="2000">100+</span>
          </h4>
          <p class="font-weight-normal text-muted">Teachers</p>
        </div>

        <div class="col-md-6 col-lg-3 mb-4 text-center">
          <h4 class="h1 font-weight-normal mb-3">
            <i class="fas fa-layer-group purple-text"></i>
            <span class="d-inline-block count1" data-from="0" data-to="250" data-time="2000">1000+</span>
          </h4>
          <p class="font-weight-normal text-muted">Quizes</p>
        </div>

        <div class="col-md-6 col-lg-3 mb-4 text-center">
          <h4 class="h1 font-weight-normal mb-3">
            <i class="fas fa-pencil-ruler purple-text"></i>
            <span class="d-inline-block count2" data-from="0" data-to="330" data-time="2000">8500+</span>
          </h4>
          <p class="font-weight-normal text-muted">Students</p>
        </div>

        <div class="col-md-6 col-lg-3 mb-4 text-center">
          <h4 class="h1 font-weight-normal mb-3">
            <i class="fab fa-react purple-text"></i>
            <span class="d-inline-block count3" data-from="0" data-to="430" data-time="2000">250+</span>
          </h4>
          <p class="font-weight-normal text-muted">New Uploads</p>
        </div>

      </div>

    </section>
    <!--Section: Content-->
  </div>
  <!--/counters-->




  <!--Service text-->
  <div class="container my-5">
    <section class="p-5">
      <h3 class="text-center font-weight-bold mb-1">
        <colorpurple>Our</colorpurple> Services
      </h3>
      <p class="font-weight-normal text-muted">
        <center>We give teachers and students ability to manage quizes in a easy way</center>
      </p>
    </section>
  </div>
  <!--/Service text-->




  <!--Student Card-->
  <div class="container mt-5 z-depth-1" id="sservice"
    style="padding-top: 15px; padding-left: 50px;border-radius: 15px;">


    <!--Section: Content-->
    <section>

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-lg-7 mb-4 align-self-center text-center text-lg-left">

          <h2 class="h2 mb-5">
            <colorpurple>For</colorpurple> Students
          </h2>
          <p class="text-muted mb-4">It’s complicated. I’ve spent more than 20 years recommending various anti-virus
            programs as an essential part of any Windows setup. However, Windows has changed, and the threat landscape
            has changed. I am no longer sure that a third-party AV program is essential, and some of them may be
            detrimental. Of course, needs vary. Some people are more accident-prone than others, and some are less
            sensitive to threats.</p>

          <button type="button" class="btn btn-purple waves-effect btn-md">Try students</button>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-lg-5 mb-4">

          <!-- Featured image -->
          <div class="view overlay">
            <img class="img-fluid mx-auto" src="img/svg/student.svg" alt="Sample image">
            <a>
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>

        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row -->

    </section>
    <!--Section: Content-->

  </div>
  <!--/Student Card-->



  <br><br>


  <!--Teacher Card-->
  <div class="container mt-5 z-depth-1" id="sservice"
    style="padding-top: 15px; padding-left: 50px;border-radius: 15px;">


    <!--Section: Content-->
    <section>

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-lg-5 mb-4">

          <!-- Featured image -->
          <div class="view overlay">
            <img class="img-fluid mx-auto" src="img/svg/teach.svg" alt="Sample image">
            <a>
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-lg-7 mb-4 align-self-center text-center text-lg-left">

          <h2 class="h2 mb-5">
            <colorpurple>For</colorpurple> Teachers
          </h2>
          <p class="text-muted mb-4">It’s complicated. I’ve spent more than 20 years recommending various anti-virus
            programs as an essential part of any Windows setup. However, Windows has changed, and the threat landscape
            has changed. I am no longer sure that a third-party AV program is essential and some of them may be
            detrimental. Of course, needs vary. Some people are more accident-prone than others, and some are less
            sensitive to threats</p>

          <button type="button" class="btn btn-purple waves-effect btn-md">Try Teacher</button>

        </div>
        <!-- Grid column -->



      </div>
      <!-- Grid row -->

    </section>
    <!--Section: Content-->

  </div>
  <!--/Teacher Card-->




<br><br>



  <!--Subscribe-->
  <div class="container-fluid mt-3 mb-5">

    <!-- Section -->
    <section class="">
      
      <style>
        .input-grey .form-control {
          border-radius: .125rem;
        }
        
        .form-control:focus {
          background-color: rgba(124, 95, 95, 0.3);
        }
  
        .input-grey input::placeholder {
          color: white;
        }
      </style>
  
      <div class="py-5">
  
        <div class="container my-4">
  
          <!-- Grid row -->
          <div class="row align-items-center">
  
            <!-- Grid column -->
            <div class="col-lg-6">
  
              <h3 class="font-weight-bold black-text pb-2"><colorpurple>Know </colorpurple>More</h3>
              <p class="lead black-text pt-2 mb-5">Subscribe our newsletter for more news. I’ve spent more than 20 years recommending various anti-virus programs as an essential part of any Windows setup. However, Windows has changed, and the threat landscape has changed. </p>
  
              <form class="col-md-9 input-grey pl-0" action="" method="post" target="_blank">
                <div class="input-group mb-3">
                  <input type="text" class="form-control white-text cyan accent-1 border-0 z-depth-0" placeholder="Enter Email Address" aria-label="Enter Email Address"
                    aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-md m-0 px-3 py-2 z-depth-0" type="button" id="button-addon2" style="background-color: purple;color: white;">Subscribe<i class="fas fa-arrow-right pl-2"></i></button>
                  </div>
                </div>
              </form>
  
            </div>
            <!-- Grid column -->
  
            <!-- Grid column -->
            <div class="col-lg-4 offset-lg-2 wow fadeInUpBig" data-wow-delay=".2s">
  
                <img src="img/email.svg" alt="Sample image" class="img-fluid">
  
            </div>
            <!-- Grid column -->
  
          </div>
          <!-- Grid row -->
  
        </div>
  
      </div>
  
    </section>
    <!-- Section -->
    
  </div>
  <!--Subscribe-->


@endsection