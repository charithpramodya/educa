@extends('layouts.main')

@section('content')



    <form action="{{route('get-student-check-questions')}}"  method="POST">
    @foreach($questions as $index=>$question)
        <!-- Question-->
        <div class="container my-5">
            <div class="card mb-4 wow fadeIn">

                <!--Card content-->
                <div class="card-body d-sm-flex justify-content-between">

                    <h4 class="mb-2 mb-sm-0 pt-1">
                        <b><span style="color: purple;">{{$index+1}} |</span></b>
                        <span>{{$question->question}}</span>
                    </h4>
                    <!--Image if needed--><img src="" alt="">
                </div>
                <div class="fadeIn">

                    <!--Card content-->
                    <div class="card-body justify-content-between">
                        <!-- Group of default radios - option 1 -->
                        <div class="custom-control custom-radio" style="width: 100%;">
                            <input type="radio" class="custom-control-input" id="{{$question->fid}}1"
                                name="{{$question->fid}}" value="1">
                            <label class="custom-control-label" for="{{$question->fid}}1">{{$question->ans1}}</label>
                        </div><br>

                        <!-- Group of default radios - option 2 -->
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="{{$question->fid}}2"
                                name="{{$question->fid}}" value="2">
                            <label class="custom-control-label" for="{{$question->fid}}2">{{$question->ans2}}</label>
                        </div><br>

                        <!-- Group of default radios - option 3 -->
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="{{$question->fid}}3"
                                name="{{$question->fid}}" value="3">
                            <label class="custom-control-label" for="{{$question->fid}}3">{{$question->ans3}}</label>
                        </div><br>

                        <!-- Group of default radios - option 3 -->
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="{{$question->fid}}4"
                                name="{{$question->fid}}" value="4">
                            <label class="custom-control-label" for="{{$question->fid}}4">{{$question->ans4}}</label>
                        </div><br>

                        @if(isset($question->ans5))
                        <!-- Group of default radios - option 3 -->
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="{{$question->fid}}5"
                                name="{{$question->fid}}" value="5">
                            <label class="custom-control-label" for="{{$question->fid}}5">{{$question->ans5}}</label>
                        </div>

                        @endif
                    </div>
                </div>

            </div>


        </div>
        <!-- question -->
    @endforeach
        <input type="hidden" name="alias" value="{{$alias}}">
        <input type="hidden" name="uid" value="{{$uid}}">
        @csrf
        <div class="text-center">
            <input type="submit" name="submit" style="color: white; background: #23AF9E; font-size: x-large; border-radius: 5px;" class="btn btn-md ml-0" value="Submit">
        </div>

    </form>

@endsection
 