@extends('layouts.main')

@section('content')
     <!--Search bar-->
  <div class="container mt-5">
    <nav class="navbar" style="border-radius: 5px;">
      <a class="navbar-brands"><b>Upcoming</b></a>
      <form class="form-inline">
        <input class="form-control" type="search" placeholder="Search" aria-label="Search" style="height: px;">
        <button type="button" class="btn btn-purple waves-effect btn-sm">Search</button>
      </form>
    </nav>
  </div>
  <!--/Search bar-->


  <!--Upcoming -->
  <div class="container mt-5">


    <!--Section: Content-->
    <section>

      <style>
        @media (max-width: 992px) {
          .news-tile .card-title {
            font-size: 1.2rem;
          }
        }

        .news-tile .card-title {
          position: absolute;
          bottom: 15px;
          left: 30px;
          text-align: left;
        }

        .news-tile h4 {
          font-size: 1.2rem;
        }

        .news-tile h3 {
          font-size: 1.6rem;
        }

        .rgba-stylish-strong {
          background-color: rgba(62, 69, 81, .5);
        }

        .view:hover {
          transition: all .4s ease-in-out;
        }

        .view {
          transition: all .4s ease-in-out;
        }
      </style>

      <!--Grid row-->
      <div class="row">

        <!-- Grid column -->
        <div class="col-lg-8 col-md-12">

          <!--News tile -->
          <div class="news-tile view zoom z-depth-1 rounded mb-4">

            <a href="#!" class="text-white">
              <img src="https://mdbootstrap.com/img/Photos/Horizontal/City/6-col/img%20(27).jpg"
                class="img-fluid rounded-bottom" alt="sample image">
              <div class="mask rgba-stylish-strong">
                <div class="text-white text-center py-lg-5 py-0 my-0">
                  <div>
                    <h2 class="card-title font-weight-bold pt-2">
                      <strong>Automobile</strong>
                      <p style="color: rgb(111, 159, 204); font-size: small;">Engineering Technology</p>
                    </h2>

                    <p class="mx-5 clearfix d-none d-md-block"></p>
                  </div>
                </div>
              </div>
            </a>

          </div>
          <!--News tile -->

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-lg-4 col-md-12">

          <!--News tile -->
          <div class="news-tile view zoom z-depth-1 rounded mb-4">

            <a href="#!" class="text-white">
              <img src="https://mdbootstrap.com/img/Photos/Horizontal/City/6-col/img%20(26).jpg"
                class="img-fluid rounded-bottom" alt="sample image">
              <div class="mask rgba-stylish-strong">
                <div class="text-white text-center py-lg-5 py-0 my-0">
                  <div>
                    <h4 class="card-title font-weight-bold pt-2">
                      <strong>Measurment And Instruments</strong>
                      <p style="color: rgb(135, 222, 154); font-size: small;">Science for technology</p>
                    </h4>

                    <p class="mx-5 clearfix d-none d-md-block"></p>
                  </div>
                </div>
              </div>
            </a>

          </div>
          <!--News tile -->

          <!--News tile -->
          <div class="news-tile view zoom z-depth-1 rounded mb-4">

            <a href="#!" class="text-white">
              <img src="https://mdbootstrap.com/img/Photos/Horizontal/City/6-col/img%20(25).jpg"
                class="img-fluid rounded-bottom" alt="sample image">
              <div class="mask rgba-stylish-strong">
                <div class="text-white text-center py-lg-5 py-0 my-0">
                  <div>
                    <h4 class="card-title font-weight-bold pt-2">
                      <strong>Weather</strong>
                      <p style="color: burlywood; font-size: small;">Bio system technology</p>
                    </h4>

                    <p class="mx-5 clearfix d-none d-md-block"></p>
                  </div>
                </div>
              </div>
            </a>

          </div>
          <!--News tile -->

        </div>
        <!-- Grid column -->

      </div>
      <!--Grid row-->

    </section>
    <!--Section: Content-->
  </div>
  <!--Upcoming -->






  <!--Grades -->
  <div class="grade">
    <div class="container mt-5">
      <div class="row">
        <div class="col">
          <b>Grades</b>
        </div>
        <div class="col" style="float: right;">
          <a href="/grades.html">
            <p style="text-align: right; font-size: smaller; color: purple;">more>></p>
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <a href=""><img src="img/svg/Grade12.svg" alt="garade12" class="img-fluid rounded-bottom"></a>
        </div>
        <div class="col">
          <a href=""><img src="img/svg/Grade13.svg" alt="grade13" class="img-fluid rounded-bottom"></a>
        </div>
      </div>
    </div>
  </div>
  <!--/Grades-->








  <!--Top paid quiz -->
  <div class="paidbg" >
    <div class="container mt-5">
      <div class="row">
        <div class="col">
          <b>Top Paid Quiz</b>
        </div>
        <div class="col" style="float: right;">
          <a href="/toppaid.html">
            <p style="text-align: right; font-size: smaller; color: purple;">more>></p>
          </a>
        </div>
      </div>

      <div class="container mt-5">


        <!--Section: Content-->
        <section class="text-center">

          <div class="row">

            <!--Grid column-->
            <div class="col-md-4 mb-4">
              <!--Card-->
              <div class="card" style="background: none; box-shadow: none;">

                <!--Card image-->
                <div class="view overlay">
                  <img src="img/sft.jpg" class="card-img-top" alt="">
                  <a href="/quizstart.html">
                    <div class="mask rgba-white-slight waves-effect waves-dark"></div>
                  </a>
                </div>
                <!--/.Card image-->

                <!--Card content-->
                <div class="card-body">
                  <!--Title-->
                  <h5 class="card-title" style="margin-bottom: 5px;">Measurment and Instruments</h5>
                  <p style="color: purple; margin-bottom: 4px;">Science for technology</p>
                  <!--Text-->
                  <p class="mb-0 text-muted">Rs.5.00</p>
                </div>
                <!--/.Card content-->

              </div>
              <!--/.Card-->

            </div>

            @foreach ($paid_quizes as $quiz)
            <!--Grid column-->
                <div class="col-md-4 mb-4">
                <!--Card-->
                    <div class="card" style="background: none; box-shadow: none;">

                        <!--Card image-->
                        <div class="view overlay">
                        <img src="img/sft.jpg" class="card-img-top" alt="">
                        <a href="/quizstart.html">
                            <div class="mask rgba-white-slight waves-effect waves-dark"></div>
                        </a>
                        </div>
                        <!--/.Card image-->

                        <!--Card content-->
                        <div class="card-body">
                        <!--Title-->
                        <h5 class="card-title" style="margin-bottom: 5px;">{{$quiz->name}}</h5>
                        <p style="color: purple; margin-bottom: 4px;">{{$quiz->subject->en_name}}</p>
                        <!--Text-->
                        <p class="mb-0 text-muted">Rs.5.00</p>
                        </div>
                        <!--/.Card content-->

                    </div>
                <!--/.Card-->

                </div>

            @endforeach

            <!--Grid column-->
            <div class="col-md-4 mb-4">
              <!--Card-->
              <div class="card" style="background: none; box-shadow: none;">

                <!--Card image-->
                <div class="view overlay">
                  <img src="img/svg/ictw.svg" class="card-img-top" alt="">
                  <a href="/quizstart.html">
                    <div class="mask rgba-white-slight waves-effect waves-dark"></div>
                  </a>
                </div>
                <!--/.Card image-->

                <!--Card content-->
                <div class="card-body">
                  <!--Title-->
                  <h5 class="card-title" style="margin-bottom: 5px;">Basic Networking</h5>
                  <p style="color: purple; margin-bottom: 4px;">Information and communication technology</p>
                  <!--Text-->
                  <p class="mb-0 text-muted">Rs.5.00</p>
                </div>
                <!--/.Card content-->

              </div>
              <!--/.Card-->

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-4 mb-4">
              <!--Card-->
              <div class="card" style="background: none; box-shadow: none;">

                <!--Card image-->
                <div class="view overlay">
                  <img src="img/svg/bstw.svg" class="card-img-top" alt="">
                  <a href="/quizstart.html"> 
                    <div class="mask rgba-white-slight waves-effect waves-dark"></div>
                  </a>
                </div>
                <!--/.Card image-->

                <!--Card content-->
                <div class="card-body">
                  <!--Title-->
                  <h5 class="card-title" style="margin-bottom: 5px;">Weather</h5>
                  <p style="color: purple; margin-bottom: 4px;">Bio system Technology</p>
                  <!--Text-->
                  <p class="mb-0 text-muted">Rs.5.00</p>
                </div>
                <!--/.Card content-->

              </div>
              <!--/.Card-->

            </div>
            <!--Grid column-->

          </div>

        </section>
        <!--Section: Content-->


      </div>
    </div>
  </div>
  <!--/Top paid quiz-->






  <!--Top free quiz -->
  <div class="freebg">
    <div class="container mt-5">
      <div class="row">
        <div class="col">
          <b>Top Free Quiz</b>
        </div>
        <div class="col" style="float: right;">
          <a href="">
            <p style="text-align: right; font-size: smaller; color: purple;">more>></p>
          </a>
        </div>
      </div>


      <div class="container mt-5">


        <!--Section: Content-->
        <section class="text-center">

          <div class="row">


            @foreach ($free_quizes as $quiz)

                <div class="col-md-4 mb-4">
                <!--Card-->
                <div class="card" style="background: none; box-shadow: none;">

                    <!--Card image-->
                    <div class="view overlay">
                    <img src="img/sft.jpg" class="card-img-top" alt="">
                    <a href="/quizstart.html">
                        <div class="mask rgba-white-slight waves-effect waves-dark"></div>
                    </a>
                    </div>
                    <!--/.Card image-->

                    <!--Card content-->
                    <div class="card-body">
                    <!--Title-->
                    <h5 class="card-title" style="margin-bottom: 5px;">{{$quiz->name}}</h5>
                    <p style="color: purple; margin-bottom: 4px;">{{$quiz->subject->en_name}}</p>
                    <!--Text-->
                    <p class="mb-0 text-muted">Free</p>
                    </div>
                    <!--/.Card content-->

                </div>
                <!--/.Card-->

                </div>

            @endforeach
            <!--Grid column-->
            <div class="col-md-4 mb-4">
              <!--Card-->
              <div class="card" style="background: none; box-shadow: none;">

                <!--Card image-->
                <div class="view overlay">
                  <img src="img/sft.jpg" class="card-img-top" alt="">
                  <a href="/quizstart.html">
                    <div class="mask rgba-white-slight waves-effect waves-dark"></div>
                  </a>
                </div>
                <!--/.Card image-->

                <!--Card content-->
                <div class="card-body">
                  <!--Title-->
                  <h5 class="card-title" style="margin-bottom: 5px;">Measurment and Instruments</h5>
                  <p style="color: purple; margin-bottom: 4px;">Science for technology</p>
                  <!--Text-->
                  <p class="mb-0 text-muted">Rs.5.00</p>
                </div>
                <!--/.Card content-->

              </div>
              <!--/.Card-->

            </div>
            <!--Grid column-->


            <!--Grid column-->
            <div class="col-md-4 mb-4">
              <!--Card-->
              <div class="card" style="background: none; box-shadow: none;">

                <!--Card image-->
                <div class="view overlay">
                  <img src="img/svg/ictw.svg" class="card-img-top" alt="">
                  <a href="/quizstart.html">
                    <div class="mask rgba-white-slight waves-effect waves-dark"></div>
                  </a>
                </div>
                <!--/.Card image-->

                <!--Card content-->
                <div class="card-body">
                  <!--Title-->
                  <h5 class="card-title" style="margin-bottom: 5px;">Basic Networking</h5>
                  <p style="color: purple; margin-bottom: 4px;">Information and communication technology</p>
                  <!--Text-->
                  <p class="mb-0 text-muted">Rs.5.00</p>
                </div>
                <!--/.Card content-->

              </div>
              <!--/.Card-->

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-4 mb-4">
              <!--Card-->
              <div class="card" style="background: none; box-shadow: none;">

                <!--Card image-->
                <div class="view overlay">
                  <img src="img/svg/bstw.svg" class="card-img-top" alt="">
                  <a href="/quizstart.html">
                    <div class="mask rgba-white-slight waves-effect waves-dark"></div>
                  </a>
                </div>
                <!--/.Card image-->

                <!--Card content-->
                <div class="card-body">
                  <!--Title-->
                  <h5 class="card-title" style="margin-bottom: 5px;">Weather</h5>
                  <p style="color: purple; margin-bottom: 4px;">Bio system Technology</p>
                  <!--Text-->
                  <p class="mb-0 text-muted">Rs.5.00</p>
                </div>
                <!--/.Card content-->

              </div>
              <!--/.Card-->

            </div>
            <!--Grid column-->

          </div>

        </section>
        <!--Section: Content-->


      </div>
    </div>
  </div>
  <!--/Top free quiz-->



  <!--Subjects -->
  <div class="subjects">
    <div class="container mt-5">
      <div class="row">
        <div class="col">
          <b>Subjects</b>
        </div>
        <div class="col" style="float: right;">
          <a href="">
            <p style="text-align: right; font-size: smaller; color: purple;">more>></p>
          </a>
        </div>
      </div>


      <!--Section: Content-->
      <section class="dark-grey-text text-center">

        <!-- Grid row -->
        <div class="row">

          <!-- Grid column -->
          @foreach ($subjects as $subject)
                <div class="col-lg-3 col-md-6 mb-4">
                    <!-- Card -->
                    <div class="card card-cascade narrower card-ecommerce" style="box-shadow: none; background: none;">
                    <!-- Card image -->
                    <div class="view view-cascade overlay">
                        <img src="img/ict.jpg" class="card-img-top" alt="sample photo">
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
                            <colorpurple>{{$subject->en_name}}</colorpurple>
                            </a>
                        </strong>
                        </h5>
                        <!-- Description -->
                        <p class="card-text">Grade 13
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
                <img src="img/bst.jpg" class="card-img-top" alt="sample photo">
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
                      <colorpurple>Information Technology</colorpurple>
                    </a>
                  </strong>
                </h5>
                <!-- Description -->
                <p class="card-text">Grade 13
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
                <img src="img/chem.jpg" class="card-img-top" alt="sample photo">
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
                      <colorpurple>Information Technology</colorpurple>
                    </a>
                  </strong>
                </h5>
                <!-- Description -->
                <p class="card-text">Grade 13
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
                <img src="img/et.jpg" class="card-img-top" alt="sample photo">
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
                      <colorpurple>Information Technology</colorpurple>
                    </a>
                  </strong>
                </h5>
                <!-- Description -->
                <p class="card-text">Grade 13
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
  <!--/Subjects -->







  <!--Teacher Poster-->
  <div class="teacherposter">
    <a href=""><img src="img/svg/teacherposter.svg" alt="" style="width: 100%; margin-top: 25px;"></a>
  </div>
  <!--Teacher Poster-->



  <!--Teachers -->
  <div class="teachers">
    <div class="container mt-5">
      <div class="row">
        <div class="col">
          <b>Subjects</b>
        </div>
        <div class="col" style="float: right;">
          <a href="">
            <p style="text-align: right; font-size: smaller; color: purple;">more>></p>
          </a>
        </div>
      </div>


      <!--Section: Content-->
      <section class="dark-grey-text text-center">

        <!-- Grid row -->
        <div class="row">

          <!-- Grid column -->
          <div class="col-lg-3 col-md-6 mb-4">
            <!-- Card -->
            <div class="card card-cascade narrower card-ecommerce" style="box-shadow: none; background: none;">
              <!-- Card image -->
              <div class="view view-cascade overlay">
                <img src="img/svg/t1.svg" class="card-img-top" alt="sample photo">
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
                      <colorpurple>Chathura Perera</colorpurple>
                    </a>
                  </strong>
                </h5>
                <!-- Description -->
                <p class="card-text">Science For Technology
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
