@extends('layouts.admin')

@section('content')
    
            <div class="">  

                <div class="row d-flex justify-content-center">

                    <div class="col-md-6">
                        @if(count($errors)!=0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        
                    </div>

                </div>

                <div class="container my-5 py-5 z-depth-1" style="background: white; border-radius: 5px;">

                    <section class="px-md-10 mx-md-10 text-center text-lg-left dark-grey-text">

                        <div class="row d-flex justify-content-center" >
                            <div class="col-md-8">
                            {!! Form::open(['method' => 'POST','route' => ['post-admin-profile-quiz-question-update'],'files' => 'true','enctype'=>'multipart/form-data', 'class'=>'text-center']) !!}

                                <div class="text-left">

                                    <div class="row">
                                        <div class="col-md-8">
                                            <label for="exampleFormControlSelect1"
                                                    style="float: left; font-size: large; margin-top: 30px;">Question |<purple
                                                        style="color: purple; font-weight: bold; font-size: large;"> 01</purple>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            

                                            {!! Form::textarea('question', $question->question, $attributes =array('id'=>'questionControl','class'=>'form-control', 'style'=>'background: #f8f7f7;height:100px;')) !!}

                                            @error('question')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="input-group" style="margin-top: 25px;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupFile"
                                                style="background: purple; color: white;">Question Image</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('questionImage') is-invalid @enderror" id="inputGroupFile"
                                                aria-describedby="inputGroupFileAddon01" onchange="readQuestionImage(this);" name="questionImage">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                        @error('questionImage')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    
                                    @if(!is_null($question->img_url))
                                    <div class="text-center">
                                        <img  id="question_image" src="{{asset('storage/question/'. $question->img_url)}}" style="width:150px;" alt="Material Design for Bootstrap - dashboard" class="img-fluid">
                                    </div>
                                    @else
                                    <div class="text-center">
                                        <img  id="question_image" src="{{asset('storage/question/default.jpg')}}" style="width:150px;" alt="Material Design for Bootstrap - dashboard" class="img-fluid">
                                    </div>
                                    @endif   
                                </div>



                                <div style="font-size: large; text-align: left; margine-bottom:20px;">Answers</div>
                                <div class="form-row mb-4">
                                    <label for="Answer01" style="float: left; font-size: smaller;">{{ __('Answer 01') }}</label>

                                    {!! Form::text('answer1', $question->ans1, $attributes =array('id'=>'Answer01','class'=>'form-control', 'style'=>'background: #f8f7f7;')) !!}
                                        @error('answer1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>


                                <!-- Answer 02 -->
                                <div class="form-row mb-4">
                                    <label for="Answer02" style="float: left; font-size: smaller;">{{ __('Answer 02') }}</label>
                                    
                                    {!! Form::text('answer2', $question->ans2, $attributes =array('id'=>'Answer02','class'=>'form-control', 'style'=>'background: #f8f7f7;')) !!}
                                        @error('answer2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>

                                <!-- Answer 03 -->
                                <div class="form-row mb-4">
                                    <label for="Answer03" style="float: left; font-size: smaller;">{{ __('Answer 03') }}</label>    
                                    <input type="text" id="Answer03" class="form-control @error('answer3') is-invalid @enderror"
                                        placeholder="Answer 03" name="answer3" value="{{ old('answer3') }}" style="background: #f8f7f7;">

                                    {!! Form::text('answer3', $question->ans3, $attributes =array('id'=>'Answer03','class'=>'form-control', 'style'=>'background: #f8f7f7;')) !!}
                                        @error('answer3')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>


                                <!-- Answer 04 -->
                                <div class="form-row mb-4">
                                    <label for="Answer04" style="float: left; font-size: smaller;">{{ __('Answer 04') }}</label>
                                    <input type="text" id="Answer04" class="form-control @error('answer4') is-invalid @enderror"
                                        placeholder="Answer 04" name="answer4" value="{{ old('answer4') }}" style="background: #f8f7f7;">
                                    {!! Form::text('answer4', $question->ans4, $attributes =array('id'=>'Answer04','class'=>'form-control', 'style'=>'background: #f8f7f7;')) !!}
                                        @error('answer4')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>


                                <!-- Answer 05 -->
                                @if(!is_null($question->ans5))
                                <div class="form-row mb-4">
                                    <label for="Answer05" style="float: left; font-size: smaller;">{{ __('Answer 05') }}</label>
                                    <input type="text" id="Answer05" class="form-control @error('answer5') is-invalid @enderror"
                                        placeholder="Answer 05" name="answer5" value="{{ old('answer5') }}" style="background: #f8f7f7;">

                                    {!! Form::text('answer5', $question->ans5, $attributes =array('id'=>'Answer05','class'=>'form-control', 'style'=>'background: #f8f7f7;')) !!}
                                        @error('answer5')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                @endif

                                <!-- Correct Answer -->
                                <div class="form-row mb-4">
                                    <label for="CorrectAnswer" style="float: left; font-size: smaller;">{{ __('Correct Answer') }}</label>

                                    @if(!is_null($question->ans5))

                                    {!! Form::select('correct_answer', array('1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5'), $question->correct_and, $attributes = array('id'=>'QuestionCorrectAnswer','class'=>'form-control', 'style'=>'background: #f8f7f7;')) !!}
                                    
                                    @else

                                    {!! Form::select('correct_answer', array('1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4'), $question->correct_and, $attributes = array('id'=>'QuestionCorrectAnswer','class'=>'form-control', 'style'=>'background: #f8f7f7;'))!!}

                                    @endif

                                    @error('correct_answer')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror    
                                </div>


                                <!-- Modules -->
                                <div class="form-row mb-4">
                                    <label for="module" style="float: left; font-size: smaller;">{{ __('Module') }}</label>
                            
                                    {!! Form::select('module', $modules, $selected_module_id, $attributes = array('id'=>'module', 'class'=>'form-control', 'style'=>'background: #f8f7f7;')) !!}

                                    @error('module')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        
                                        {!! Form::textarea('review', $question->review, $attributes =array('id'=>'ReviewControl','class'=>'form-control', 'style'=>'background: #f8f7f7;height:100px;')) !!}

                                        

                                        @error('review')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="input-group" style="margin-top: 25px;">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFile"
                                            style="background: purple; color: white;">Review Image</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('reviewImage') is-invalid @enderror" id="inputGroupFile"
                                            aria-describedby="inputGroupFileAddon01" onchange="readReviewImage(this);" name="reviewImage">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                    @error('reviewImage')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                @if(!is_null($question->review_img))
                                <div class="text-center">
                                    <img  id="review_image" src="{{asset('storage/review/'. $question->review_img)}}" style="width:150px;" alt="Material Design for Bootstrap - dashboard" class="img-fluid">
                                </div>
                                @else
                                <div class="text-center">
                                    <img  id="review_image" src="{{asset('storage/review/default.jpg')}}" style="width:150px;" alt="Material Design for Bootstrap - dashboard" class="img-fluid">
                                </div>
                                @endif    

                                @csrf

                                <input type="hidden" value="{{$alias}}" name="id">

                                <div class="form-group text-center" style="margin-bottom:20px; margin-top:20px;">

                                    <button type="submit" id="savechanges" name="submit" class="btn btn-primary">Save changes</button>
                                            
                                </div>

                            {!! Form::close() !!}
                            </div>
                            
                        </div>
                        
                    </section>
                </div>
            </div>


@endsection


@section('script')

<script src="https://cdn.tiny.cloud/1/m2hlflejwmrzckg0suf0srmwiub1ty2hfpsd6jrrj0a8gk6y/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>


<script>

    function showPriceField(){

        var value = document.getElementById("FormControlType").value;
        var x = document.getElementById("price");

        if(value=='PAID'){
            x.style.display = "block";
        }else{
            x.style.display = "none";
        }

    }


    function readQuestionImage(input){

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#question_image')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }

    }

    function readReviewImage(input){

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#review_image')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }

    }

    tinymce.init({
      selector: '#questionControl'
    });

    tinymce.init({
      selector: '#ReviewControl'
    });

</script>

@endsection