@extends('layouts.main')



@section('content')


    <div class="container my-5 py-5 z-depth-1">


        <!--Section: Content-->
        <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-6 mb-4 mb-md-0">

                    @if(is_null($module))

                        <h3 class="font-weight-bold">{{$subject->en_name}}</h3>
                        

                    @else

                        <h3 class="font-weight-bold">{{$module->en_name}}</h3>
                        <p style="color: purple;">{{$subject->en_name}}</p>

                    @endif
                    <a class="btn btn-md ml-0" role="button"
                        style="color: white; background: #23AF9E; font-size: x-large; border-radius: 5px;">{{$percentage}}%</a>

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


    </div>


    @foreach($questions as $index=>$question)

        <!-- Question -->
        <div class="container my-5">
            <div class="card mb-4 wow fadeIn">

                <!--Card content-->
                <div class="card-body d-sm-flex justify-content-between">

                    <h4 class="mb-2 mb-sm-0 pt-1">
                        <b><span style="color: purple;"> {{$index+1}}|</span></b>
                        <span>{{$question->question}}</span>
                    </h4>

                </div>

                <div class="fadeIn">

                    <!--Card content-->
                    <div class="card-body justify-content-between">
                        <!-- Default unchecked disabled -->
                        <div class="custom-control custom-radio">
                            
                            <input type="radio" class="custom-control-input" id="{{$question->fid}}1"
                                name="{{$question->fid}}" {{($answers[$question->fid] == 1) ? 'checked' : ''}} disabled>
                            <label class="custom-control-label" for="defaultUncheckedDisabled2">{{$question->ans1}}</label>
                            @if(($answers[$question->fid] == 1 && $question->correct_and==1) || ($answers[$question->fid] != 1 && $question->correct_and==1))
                                <i class="fas fa-check" style="color: #23AF9E;"></i>
                            @elseif($answers[$question->fid] == 1 && $question->correct_and!=1)
                                <i class="fas fa-times" style="color: #ff2929;"></i>              
                            @endif
                        </div>

                        
                        <!-- Default unchecked disabled -->
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="{{$question->fid}}2"
                                name="{{$question->fid}}" {{($answers[$question->fid] == 2) ? 'checked' : ''}} disabled>
                            <label class="custom-control-label" for="defaultUncheckedDisabled2">{{$question->ans2}}</label>
                            @if(($answers[$question->fid] == 2 && $question->correct_and==2) || ($answers[$question->fid] != 2 && $question->correct_and==2))
                                <i class="fas fa-check" style="color: #23AF9E;"></i>
                            @elseif($answers[$question->fid] == 2 && $question->correct_and!=2)
                                <i class="fas fa-times" style="color: #ff2929;"></i>
                            @endif
                        </div>


                        <!-- Default unchecked disabled -->
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="{{$question->fid}}3"
                                name="{{$question->fid}}" {{($answers[$question->fid] == 3) ? 'checked' : ''}} disabled>
                            <label class="custom-control-label" for="defaultUncheckedDisabled2">{{$question->ans3}}</label>
                            @if(($answers[$question->fid] == 3 && $question->correct_and==3) || ($answers[$question->fid] != 3 && $question->correct_and==3))
                                <i class="fas fa-check" style="color: #23AF9E;"></i>
                            @elseif($answers[$question->fid] == 3 && $question->correct_and!=3)
                                <i class="fas fa-times" style="color: #ff2929;"></i>
                            @endif
                        </div>



                        <!-- Default unchecked disabled -->
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="{{$question->fid}}4"
                                name="{{$question->fid}}" {{($answers[$question->fid] == 4) ? 'checked' : ''}} disabled>
                            <label class="custom-control-label" for="defaultUncheckedDisabled2">{{$question->ans4}}</label>
                            @if(($answers[$question->fid] == 4 && $question->correct_and==4) || ($answers[$question->fid] != 4 && $question->correct_and==4))
                                <i class="fas fa-check" style="color: #23AF9E;"></i>
                            @elseif($answers[$question->fid] == 4 && $question->correct_and!=4)
                                <i class="fas fa-times" style="color: #ff2929;"></i>
                            @endif
                        </div>

                        <!-- Default checked disabled -->
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="{{$question->fid}}5"
                                name="{{$question->fid}}" {{($answers[$question->fid] == 5) ? 'checked' : ''}} disabled>
                            <label class="custom-control-label" for="defaultCheckedDisabled2">{{$question->ans5}}</label>
                            @if(($answers[$question->fid] == 5 && $question->correct_and==5) || ($answers[$question->fid] != 5 && $question->correct_and==5) )
                                <i class="fas fa-check" style="color: #23AF9E;"></i>
                            @elseif($answers[$question->fid] == 5 && $question->correct_and!=5)
                                <i class="fas fa-times" style="color: #ff2929;"></i>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- question -->
    
    
    
    
    
    
    
    
   
    @endforeach


@endsection