@extends('layouts.main')

@section('content')

<div class="container my-5 py-5 z-depth-1">

        @if(isset($quiz))
        <!--Section: Content-->
        <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-6 mb-4 mb-md-0 text-center" >

                    <h3 class="font-weight-bold">{{$quiz->name}}</h3>

                    <p style="color: purple;">{{$quiz->subject->en_name}}</p>

                    

                    @if($free_quizes==0 && $quiz->type=='PAID')

                    <input type='text' name="phone-number" value='' class="form-control mb-4">
                    <a data-toggle="modal" data-target="#modalLRFormDemo" class="btn btn-md ml-0" role="button"
                        style="color: white; background: #23AF9E; font-size: x-large; border-radius: 5px;">@if(!$quiz->price==0)Rs. {{$quiz->price}} @endif Take Quiz </a>
                    
                    
                    @elseif($quiz->type=='FREE')

                    <a href="{{route('get-student-quize-free',['alias'=>$quiz->alias])}}" class="btn btn-md ml-0" role="button"
                        style="color: white; background: #23AF9E; font-size: x-large; border-radius: 5px;">Take this Free Quiz </a>

                    @elseif($free_quizes>0)
                    <a href="{{route('get-student-quize-coupon',['alias'=>$quiz->alias])}}" class="btn btn-md ml-0" role="button"
                        style="color: white; background: #23AF9E; font-size: x-large; border-radius: 5px;">Take Quiz</a>



                    @endif
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 mb-4 mb-md-0">

                    <!--Image-->
                    <div class="view overlay">
                        <img src="/img/svg/ictw.svg" class="img-fluid" alt="" style="width: 100%; height: 150px;">
                        <a href="#">
                            <div class="mask rgba-white-light"></div>
                        </a>
                    </div>

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->


        </section>
        <!--Section: Content-->


        <div class="modal fade" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      ...
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
        </div>
        @endif

</div>



@endsection