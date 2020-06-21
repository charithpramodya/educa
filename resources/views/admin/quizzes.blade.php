@extends('layouts.admin')

@section('content')

				<!-- adding -->
				<div class="btn-group" role="group" aria-label="Basic example" style="margin-bottom: 15px;">

					<a><button type="button" class="btn btn-white" data-toggle="modal" data-target="#modalAddQuiz"><i class="fas fa-plus"
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
								<th>Image</th>
								<th>Quiz Name</th>
								<th>Subject</th>
								<th>Teacher Name</th>
								<th>Delete/Edit</th>

							</tr>
						</thead>
						<!--Table head-->

						<!--Table body-->
						<tbody>

							@foreach($quizes as $index=>$quiz)
							<tr>
								<th scope="row">{{$index+1}}</th>
								<td>
								@if($quiz->image_id==0)
								<img src="/img/chem.jpg" alt="" style="width: 50px;">
								@else
								<img src="{{asset('storage/images/'.$quiz->image->path)}}" alt="" style="width: 50px;">
								@endif
								</td>
								<td>{{$quiz->name}}</td>
								<td>{{$quiz->subject->en_name}}</td>
								<td>{{$quiz->user->name}}</td>
								<td>
									<a href="#"> <i class="far fa-trash-alt"> </i> </a>

									<a class="edit_modal" href="{{route('get-admin-profile-quiz-update',$quiz->alias)}}"><i class="fas fa-edit" style="margin-left: 7px;"></i></a>

									<a href="{{route('get-admin-profile-quiz-questions',$quiz->alias)}}" >
						
										<i class="fas fa-plus" style="margin-left: 7px;"></i>
									</a>
									<a class="open_modal" data-value="{{$quiz->alias}}">
						
										<i class="fas fa-info" style="margin-left: 7px;"></i>
									</a>
									
								</td>
							</tr>
							@endforeach


						

						</tbody>
						<!--Table body-->

					</table>
					<!--Table-->
					
				</div>

				<!--Modal: Add Quiz-->
				<div class="modal fade" id="modalAddQuiz" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
						<div class="modal-content">
							<form method="POST" action="{{route('post-admin-profile-quiz-add')}}" enctype="multipart/form-data">
								<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Add Quiz</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								</div>
								<div class="modal-body">
								<!-- Grid column -->
									<ul id="error" class="alert alert-danger" style="display:none;"></ul>

								<!-- Quiz Name -->
								<div class="form-group">
									<label for="FormControlQuizName" style="float: left; font-size: smaller;">{{ __('Quiz Name') }}</label>
									<input type="text" name="quizname" id="FormControlQuizName" class="form-control @error('quizname') is-invalid @enderror"
										placeholder="Quiz Name" style="background: #f8f7f7;" value="{{ old('quizname') }}" required autocomplete="quizname" autofocus>

									@error('quizname')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>

								<div class="form-group">
									<label for="FormControlSubject" style="float: left; font-size: smaller;">{{ __('Subject') }}</label>
									<select class="form-control" name="subject" id="FormControlSubject"
										style="background: #f8f7f7;">

										@foreach($subjects as $subject)
										<option value="{{$subject->fid}}">{{$subject->en_name}}</option>
										@endforeach
									</select>

									@error('subject')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>

								<div class="form-group">
									<label for="FormControlType" style="float: left; font-size: smaller;">{{ __('Quiz Type') }}</label>
									<select class="form-control" name="type" id="FormControlType"
										style="background: #f8f7f7;" onChange="showPriceField();"  value="{{ old('type') }}">

										
										<option value="FREE" {{(old('type')=='FREE') ? 'selected' : '' }}>Free</option>
										<option value="PAID" {{(old('type')=='PAID') ? 'selected' : '' }}>Paid</option>
										
									</select>
									@error('type')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>

								<div class="form-group" id="price" {{(old('type')=='PAID') ? 'style=display:block;' : 'style=display:none;' }} >
									<label for="FormControlQuizPrice" style="float: left; font-size: smaller;">{{ __('Quiz Price') }}</label>
									<input type="text" name="quizprice" id="FormControlQuizPrice" class="form-control @error('quizprice') is-invalid @enderror"
										placeholder="Quiz Price" style="background: #f8f7f7;" value="{{ old('quizprice') }}" autocomplete="quizprice" autofocus>

									@error('quizprice')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>

								<div class="form-group">
									<label for="FormControlPrivacy" style="float: left; font-size: smaller;">{{ __('Quiz Privacy') }}</label>
									<select class="form-control" name="privacy" id="FormControlPrivacy"
										style="background: #f8f7f7;">

										
										<option value="COMMON">Common</option>
										<option value="CLASS">Class</option>
										
									</select>
									@error('privacy')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>

							

								

								<div class="input-group" style="margin-bottom: 25px;">
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroupFileAddon01"
											style="background: purple; color: white;">Teacher Image</span>
									</div>
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="inputGroupFile01"
											aria-describedby="inputGroupFileAddon01" name="image">
										<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
									</div>
								</div>

								@csrf

								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" id="savechanges" name="submit" class="btn btn-primary">Save changes</button>
								</div>
							</form>
						</div>
						</div>
				</div>
				<!--Modal: Add quiz-->

				<!--Modal: show Quiz-->
				<div class="modal fade" id="modalShowQuiz" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
						<div class="modal-content">
							<form method="POST" action="{{route('post-admin-profile-quiz-add')}}" enctype="multipart/form-data">
								<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Add Quiz</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								</div>
								<div class="modal-body">
								<!-- Grid column -->
									<ul id="error" class="alert alert-danger" style="display:none;"></ul>

								<!-- Quiz Name -->
								<div class="form-group">
									<label for="FormPreviewQuizName" style="float: left; font-size: smaller;">{{ __('Quiz Name') }}</label>
									<input type="text" name="quizname" id="FormPreviewQuizName" class="form-control" style="background: #f8f7f7;" disabled>

									
								</div>

								<div class="form-group">
									<label for="FormPreviewSubject" style="float: left; font-size: smaller;">{{ __('Subject') }}</label>
									<input type="text" class="form-control" name="subject" id="FormPreviewSubject"
										style="background: #f8f7f7;">

		

							
								</div>

								<div class="form-group">
									<label for="FormControlType" style="float: left; font-size: smaller;">{{ __('Quiz Type') }}</label>
									<input  type="text" class="form-control" name="type" id="FormPreviewType" style="background: #f8f7f7;" >

									
								</div>

								<div class="form-group" >
									<label for="FormPreviewQuizPrice" style="float: left; font-size: smaller;">{{ __('Quiz Price') }}</label>
									<input type="text" name="quizprice" id="FormPreviewQuizPrice" class="form-control"
										 style="background: #f8f7f7;">

								</div>

								<div class="form-group">
									<label for="FormPreviewPrivacy" style="float: left; font-size: smaller;">{{ __('Quiz Privacy') }}</label>
									<input type="text" class="form-control" name="privacy" id="FormPreviewPrivacy"
										style="background: #f8f7f7;">

									
								</div>


								@csrf

								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" id="savechanges" name="submit" class="btn btn-primary">Save changes</button>
								</div>
							</form>
						</div>
						</div>
				</div>
				<!--Modal: Show Quiz-->

			



@endsection


@section('script')
<script>


	var selectedIndex=0;

	function showPriceField(){

		var value = document.getElementById("FormControlType").value;
		var x = document.getElementById("price");

		if(value=='PAID'){
			x.style.display = "block";
		}else{
			x.style.display = "none";
		}
		
	}

	@if(count($errors)!=0)  
		$(function() {
			$('#modalAddQuiz').modal({
				show: true
			});
		});
	@endif


	$(document).on('click','.open_modal',function(){

			event.preventDefault();

			var FormPreviewQuizName = document.getElementById("FormPreviewQuizName");
			var FormPreviewSubject = document.getElementById("FormPreviewSubject");
			var FormControlType = document.getElementById("FormPreviewType");
			var FormPreviewQuizPrice = document.getElementById("FormPreviewQuizPrice");
			var FormControlPrivacy = document.getElementById("FormPreviewPrivacy");

			var _token   = $('meta[name="csrf-token"]').attr('content');

			$.ajax({
				url: "{{route('post-admin-profile-quiz-get')}}",
				type:"POST",
				data:{
					id: $(this).data('value'),
					_token: _token
				},
				success:function(response){
					console.log(response.name);
					FormPreviewQuizName.value=response.name;
					FormPreviewSubject.value=response.subject;
					FormControlType.value=response.type;
					FormPreviewQuizPrice.value=response.price;
					FormControlPrivacy.value=response.privacy;
				},
			});


			$('#modalShowQuiz').modal('show');
	});

</script>
@endsection