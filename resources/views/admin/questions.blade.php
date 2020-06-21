@extends('layouts.admin')

@section('content')

				<!-- adding -->
				<div class="btn-group" role="group" aria-label="Basic example" style="margin-bottom: 15px;">

					<a><button type="button" class="btn btn-white" data-toggle="modal" data-target="#modalAddQuestion"><i class="fas fa-plus"
								style="color: purple;"></i>
							Add Quizes</button></a>
					
				</div>
				<!-- adding -->
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

				<div class="card mb-4 wow fadeIn">
					<!--Table-->
					<table class="table table-hover table-fixed">

						<!--Table head-->
						<thead>
							<tr>

								<th>#</th>
								<th>Question</th>
								<th>Answer 1</th>
                                <th>Answer 2</th>
                                <th>Answer 3</th>
                                <th>Answer 4</th>
                                <th>Answer 5</th>
								<th>Correct Answer</th>
								<th>Delete/Edit</th>

							</tr>
						</thead>
						<!--Table head-->

						<!--Table body-->
						<tbody>

							@foreach($questions as $index=>$question)
							<tr>
								<th scope="row">{{$index+1}}</th>
								<td>{{$question->question}}</td>
								<td>{{$question->ans1}}</td>
								<td>{{$question->ans2}}</td>
                                <td>{{$question->ans3}}</td>
                                <td>{{$question->ans4}}</td>
                                <td>{{$question->ans5}}</td>
                                <td>{{$question->correct_and}}</td>
								<td>
									<a href="#"> <i class="far fa-trash-alt"> </i> </a>

									<a href="{{route('get-admin-profile-quiz-question',$question->fid)}}"><i class="fas fa-edit" style="margin-left: 7px;"></i></a>

									
								</td>
							</tr>
							@endforeach


						

						</tbody>
						<!--Table body-->

					</table>
					<!--Table-->
					
				</div>

				<!-- Central Modal Large Info-->
                <div class="modal fade" id="modalAddQuestion" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-notify modal-info" role="document">
                        <!--Content-->
                        <form action="{{route('post-admin-profile-quiz-questions-add')}}" method="POST" enctype="multipart/form-data">
                            <div class="modal-content">
                                <!--Header-->
                                <div class="modal-header">
                                <p class="heading lead">Add Question</p>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" class="white-text">&times;</span>
                                </button>
                                </div>

                                <!--Body-->
                                <div class="modal-body">
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
                                                <textarea class="form-control @error('question') is-invalid @enderror" style="background: #f8f7f7;height:100px;"  id="questionControl" name="question">
                                                    {{ old('question') }}
                                                </textarea>
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
                                        <div class="text-center">
                                            <img  id="question_image" src="" alt="Material Design for Bootstrap - dashboard" class="img-fluid">
                                        </div>
                                    </div>



                                    <div style="font-size: large; text-align: left;">Answers</div>
                                    <div class="form-row mb-4">
                                        <label for="Answer01" style="float: left; font-size: smaller;">{{ __('Answer 01') }}</label>
                                        <input type="text" id="Answer01" class="form-control @error('answer1') is-invalid @enderror"
                                            placeholder="Answer 01" name="answer1" value="{{ old('answer1') }}" style="background: #f8f7f7;">
                                            @error('answer1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>


                                    <!-- Answer 02 -->
                                    <div class="form-row mb-4">
                                        <label for="Answer02" style="float: left; font-size: smaller;">{{ __('Answer 02') }}</label>
                                        <input type="text" id="Answer02" class="form-control @error('answer2') is-invalid @enderror"
                                            placeholder="Answer 02" value="{{ old('answer2') }}" name="answer2" style="background: #f8f7f7;">
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
                                            @error('answer4')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>


                                    <!-- Answer 05 -->
                                    <div class="form-row mb-4">
                                        <label for="Answer05" style="float: left; font-size: smaller;">{{ __('Answer 05') }}</label>
                                        <input type="text" id="Answer05" class="form-control @error('answer5') is-invalid @enderror"
                                            placeholder="Answer 05" name="answer5" value="{{ old('answer5') }}" style="background: #f8f7f7;">
                                            @error('answer5')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>

                                    <!-- Correct Answer -->
                                    <div class="form-row mb-4">
                                        <label for="CorrectAnswer" style="float: left; font-size: smaller;">{{ __('Correct Answer') }}</label>
                                        <select  id="QuestionCorrectAnswer" class="form-control @error('correct_answer') is-invalid @enderror" name="correct_answer" style="background: #f8f7f7;">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        @error('correct_answer')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror    
                                    </div>


                                    <!-- Modules -->
                                    <div class="form-row mb-4">
                                        <label for="module" style="float: left; font-size: smaller;">{{ __('Module') }}</label>
                                        <select   id="module" class="form-control @error('module') is-invalid @enderror" name="module" style="background: #f8f7f7;">
                                            <option value="0">Select Module</option>
                                            @foreach($modules as $module)
                                            <option value="{{$module->fid}}" {{ (old('module')==$module->fid) ? 'selected' : '' }}>{{$module->en_name}}</option>
                                            @endforeach
                                        </select>
                                        @error('module')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                

                                        <div class="row">
                                            <div class="col-md-12">
                                                <textarea class="form-control @error('review') is-invalid @enderror" style="background: #f8f7f7;height:100px;"  id="ReviewControl" name="review">
                                                        {{ (old('review')) }}
                                                </textarea>
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
                                                    style="background: purple; color: white;">Question Image</span>
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
                                        <div class="text-center">
                                            <img  id="review_image" src="" alt="Material Design for Bootstrap - dashboard" class="img-fluid">
                                        </div>                               


                                </div>

                                <input type="hidden" name="alias" value="{{$alias}}">
                                @csrf
                                <!--Footer-->
                                <div class="modal-footer">
                                <button name="submit" type="submit" class="btn btn-info">Get it now
                                    <i class="far fa-gem ml-1"></i>
                                </button>
                                <a role="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">No,
                                    thanks</a>
                                </div>
                            </div>
                        </form>
                        <!--/.Content-->

                    </div>
                </div>
              <!-- Central Modal Large Info-->
			



@endsection


@section('script')

<script src="https://cdn.tiny.cloud/1/m2hlflejwmrzckg0suf0srmwiub1ty2hfpsd6jrrj0a8gk6y/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>

	@if(count($errors)!=0)  
		$(function() {
			$('#modalAddQuiz').modal({
				show: true
			});
		});
	@endif

    tinymce.init({
      selector: '#questionControl'
    });

    tinymce.init({
      selector: '#ReviewControl'
    });

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


</script>



@endsection