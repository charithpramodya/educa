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

                            <div class="col-md-6">
                                {!! Form::open(['method' => 'POST','route' => ['post-admin-profile-quiz-update'],'files' => 'true','enctype'=>'multipart/form-data', 'class'=>'text-center']) !!}	
                                            <!-- Quiz Name -->
                                            <p class="h4 mb-4">Edit quiz</p>


                                            <div class="" style="margin-bottom: 20px;">


                                            <div class="form-group">
                                                <label for="FormControlQuizName" style="float: left; font-size: smaller;">{{ __('Quiz Name') }}</label>
                        
                                                {!! Form::text('quizname', $quiz->name, $attributes =array('id'=>'FormControlQuizName','class'=>'form-control', 'style'=>'background: #f8f7f7;')) !!}


                                                @error('quizname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="FormControlSubject" style="float: left; font-size: smaller;">{{ __('Subject') }}</label>


                                                {!! Form::select('subject', $subjects, $selected_subject_id, $attributes =array('class'=>'form-control', 'style'=>'background: #f8f7f7;')) !!}

                                            </div>

                                            <div class="form-group">
                                                <label for="FormControlType" style="float: left; font-size: smaller;">{{ __('Quiz Type') }}</label>
                                                

                                                {!! Form::select('type', array('FREE'=>'Free', 'PAID'=>'Paid'), $quiz->type, $attributes =array('id'=>'FormControlType','class'=>'form-control', 'style'=>'background: #f8f7f7;', 'onChange'=>'showPriceField();')) !!}
                                                
                                            </div>

                                            <div class="form-group" id="price" {{($quiz->type=='PAID') ? 'style=display:block;' : 'style=display:none;' }} >
                                                <label for="FormControlQuizPrice" style="float: left; font-size: smaller;">{{ __('Quiz Price') }}</label>
                                                

                                                {!! Form::text('quizprice', $quiz->price, $attributes =array('id'=>'FormControlQuizPrice','class'=>'form-control', 'style'=>'background: #f8f7f7;')) !!}

                                                @error('quizprice')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="FormControlPrivacy" style="float: left; font-size: smaller;">{{ __('Quiz Privacy') }}</label>

                                                {!! Form::select('privacy', array('COMMON'=>'Common', 'CLASS'=>'Class'), $quiz->privacy, $attributes = array('id'=>'FormControlPrivacy','class'=>'form-control', 'style'=>'background: #f8f7f7;')) !!}
                                                @error('privacy')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                        

                                            

                                            <div class="input-group" style="margin-bottom: 25px;">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupFileAddon01"
                                                        style="background: purple; color: white;">Quiz Image</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="inputGroupFile01"
                                                        aria-describedby="inputGroupFileAddon01" onChange="readQuestionImage(this);" name="image">
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                </div>
                                            </div>

                                            @if(!is_null($quiz->image))
                                                <div class="form-group text-center">
                                                        <img  id="review_image" src="{{asset('storage/images/'. $quiz->image->path)}}" alt="Material Design for Bootstrap - dashboard" class="img-fluid">
                                                </div>
                                            @endif

                                            @csrf
                                            
                                            <input type="hidden" value="{{$alias}}" name="id">

                                            <div class="form-group text-center">

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
                $('#review_image')
                    .attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }

    }

</script>

@endsection