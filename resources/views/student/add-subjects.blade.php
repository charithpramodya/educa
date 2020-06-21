@extends('layouts.main')

@section('content')

    <div class="container my-5 py-5 z-depth-1">


        <!--Section: Content-->
        <section class="px-md-5 mx-md-5 text-center dark-grey-text">

            <!--Grid row-->
            <div class="row text-center align-items-center">

                <!--Grid column-->
                <div class="col-md-10 justify-content-md-center mb-4 mb-md-0" style="float: right;">
                    
                        <select id="subjects" name="subjects" class="form-control">
                            <option value="">Select Your Subjects</option>

                            @foreach($subjects as $subject)
                            <option value="{{$subject->fid}}">{{$subject->en_name}}</option>
                            @endforeach


                        </select>
                        

                </div>
                <div class="col-md-2 mb-4 mb-md-0">


                <button class="btn btn-sm ml-0" style="color: white; background: #23AF9E; font-size: x-large; border-radius: 5px;" name="submit" onclick="addSubject();"> Add </button>

                </div>
                <!--Grid column-->

            </div>

            <div class="row" style="margin-top:30px;">
                
                @foreach($taken_subjects as $subject)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <!-- Card -->
                        <div class="card card-cascade narrower card-ecommerce" style="box-shadow: none; background: none;">
                        <!-- Card image -->
                        <div class="view view-cascade overlay">
                            <img src="{{asset('img/ict.jpg')}}" class="card-img-top" alt="sample photo">
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


                        </div>
                        <!-- Card content -->
                        </div>
                        <!-- Card -->
                    </div>
                @endforeach
                

            </row>
            <!--Grid row-->


        </section>
        <!--Section: Content-->


    </div>

@endsection


@section('script')

    <script type="text/javascript">

        function addSubject(){

            var x = document.getElementById("subjects").value;

            $.ajax('/student/subject/add', {

                type: 'POST', 
                data: { id: x, _token : $('meta[name=csrf-token]').attr('content')}, 
                success: function (data) {
                    console.log(data);
                }
            });

            location.reload();

        }


    </script>


@endsection