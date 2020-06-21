@extends('layouts.main')

@section('content')
     <!--Search bar-->
  <div class="container mt-5" style="margin-bottom:40px;">
    <nav class="navbar" style="border-radius: 5px;">
      <a class="navbar-brands"><b>Upcoming</b></a>
      <form class="form-inline">
        <input class="form-control" type="search" placeholder="Search" aria-label="Search" style="height: px;">
        <button type="button" class="btn btn-purple waves-effect btn-sm">Search</button>
      </form>
    </nav>
  </div>
  <!--/Search bar-->



  @foreach($subjects as $subject)
  <!--Top free quiz -->
  <div class="freebg">
    <div class="container mt-5">
      <div class="row">
        <div class="col">
          <b>{{$subject->en_name}}</b>
        </div>
        @if($more[$subject->id] > 6)
        <div class="col" style="float: right;">
          <a href="">
            <p style="text-align: right; font-size: smaller; color: purple;"> more>></p>
          </a>
        </div>

        @endif
      </div>


      <div class="container mt-5">


        <!--Section: Content-->
        <section class="text-center">

          <div class="row">

            <!--Grid column-->
            @foreach($subject->quizes as $quiz)
            <div class="col-md-4 mb-4">
              <!--Card-->
              <div class="card" style="background: none; box-shadow: none;">

                <!--Card image-->
                <div class="view overlay">
                  <img src="{{asset('img/sft.jpg')}}" class="card-img-top" alt="">
                  <a href="{{route('get-student-show-quiz',['alias'=>$quiz->alias])}}">
                    <div class="mask rgba-white-slight waves-effect waves-dark"></div>
                  </a>
                </div>
                <!--/.Card image-->

                <!--Card content-->
                <div class="card-body">
                  <!--Title-->
                  <h5 class="card-title" style="margin-bottom: 5px;">{{$quiz->name}}</h5>
                  <p style="color: purple; margin-bottom: 4px;">{{$subject->en_name}}</p>
                  <!--Text-->
                  <p class="mb-0 text-muted"> @if($quiz->price==0) Free @else  Rs {{$quiz->price}}.00 @endif</p>
                </div>
                <!--/.Card content-->

              </div>
              <!--/.Card-->

            </div>
            <!--Grid column-->
            @endforeach

            

          </div>

        </section>
        <!--Section: Content-->


      </div>
    </div>
  </div>
  <!--/Top free quiz-->
  @endforeach


  <!--Subjects -->
  


  <!--Teacher Poster-->
  <div class="teacherposter">
    <a href=""><img src="{{asset('img/svg/teacherposter.svg')}}" alt="" style="width: 100%; margin-top: 25px;"></a>
  </div>
  <!--Teacher Poster-->



  <!--Teachers -->
  <div class="teachers">
    <div class="container mt-5">
      <div class="row">
        <div class="col">
          <b>Teachers</b>
        </div>

        @if(count($teachers) > 6 )
        <div class="col" style="float: right;">
          <a href="">
            <p style="text-align: right; font-size: smaller; color: purple;">more>></p>
          </a>
        </div>
        @endif
      </div>


      <!--Section: Content-->
      <section class="dark-grey-text text-center">

        <!-- Grid row -->
        <div class="row">


          @foreach($teachers as $teacher)
          <!-- Grid column -->
          <div class="col-lg-3 col-md-6 mb-4">
            <!-- Card -->
            <div class="card card-cascade narrower card-ecommerce" style="box-shadow: none; background: none;">
              <!-- Card image -->
              <div class="view view-cascade overlay">
                <img src="{{asset('img/svg/t1.svg')}}" class="card-img-top" alt="sample photo">
                <a>
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
              <!-- Card image -->
              <!-- Card content -->
              <div class="card-body card-body-cascade text-center pb-3">
                <!-- Title -->
                <h5 class="card-title mb-1">
                  <strong>
                    <a href="">
                      <colorpurple>{{$teacher->user->name}}</colorpurple>
                    </a>
                  </strong>
                </h5>
                <!-- Description -->
                <p class="card-text">{{$teacher->subject->en_name}}
                </p>

              </div>
              <!-- Card content -->
            </div>
            <!-- Card -->
          </div>
          <!-- Grid column -->
          @endforeach

          <!-- Grid column -->
          <div class="col-lg-3 col-md-6 mb-4">
            <!-- Card -->
            <div class="card card-cascade narrower card-ecommerce" style="box-shadow: none; background: none;">
              <!-- Card image -->
              <div class="view view-cascade overlay">
                <img src="img/svg/t2.svg" class="card-img-top" alt="sample photo">
                <a>
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
              <!-- Card image -->
              <!-- Card content -->
              <div class="card-body card-body-cascade text-center pb-3">
                <!-- Title -->
                <h5 class="card-title mb-1">
                  <strong>
                    <a href="">
                      <colorpurple>Kapila Udana</colorpurple>
                    </a>
                  </strong>
                </h5>
                <!-- Description -->
                <p class="card-text">Engineering Technology
                </p>

              </div>
              <!-- Card content -->
            </div>
            <!-- Card -->
          </div>
          <!-- Grid column -->



          <!-- Grid column -->
          <div class="col-lg-3 col-md-6 mb-4">
            <!-- Card -->
            <div class="card card-cascade narrower card-ecommerce" style="box-shadow: none; background: none;">
              <!-- Card image -->
              <div class="view view-cascade overlay">
                <img src="img/svg/t3.svg" class="card-img-top" alt="sample photo">
                <a>
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
              <!-- Card image -->
              <!-- Card content -->
              <div class="card-body card-body-cascade text-center pb-3">
                <!-- Title -->
                <h5 class="card-title mb-1">
                  <strong>
                    <a href="">
                      <colorpurple>Yana Silvermen</colorpurple>
                    </a>
                  </strong>
                </h5>
                <!-- Description -->
                <p class="card-text">Bio System Technology
                </p>

              </div>
              <!-- Card content -->
            </div>
            <!-- Card -->
          </div>
          <!-- Grid column -->




          <!-- Grid column -->
          <div class="col-lg-3 col-md-6 mb-4">
            <!-- Card -->
            <div class="card card-cascade narrower card-ecommerce" style="box-shadow: none; background: none;">
              <!-- Card image -->
              <div class="view view-cascade overlay">
                <img src="img/svg/t4.svg" class="card-img-top" alt="sample photo">
                <a>
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
              <!-- Card image -->
              <!-- Card content -->
              <div class="card-body card-body-cascade text-center pb-3">
                <!-- Title -->
                <h5 class="card-title mb-1">
                  <strong>
                    <a href="">
                      <colorpurple>Oliver Queen</colorpurple>
                    </a>
                  </strong>
                </h5>
                <!-- Description -->
                <p class="card-text">Science for technology
                </p>

              </div>
              <!-- Card content -->
            </div>
            <!-- Card -->
          </div>
          <!-- Grid column -->


        </div>
    </div>
  </div>
  <!--/Teachers -->

@endsection
