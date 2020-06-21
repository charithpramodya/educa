@extends('layouts.admin')

@section('content')

				<!-- adding -->
				<div class="btn-group" role="group" aria-label="Basic example" style="margin-bottom: 15px;">
					<a><button type="button" class="btn btn-white" data-toggle="modal" data-target="#modalFormSubject">
							<i class="fas fa-plus" style="color: purple;">
							
							</i>
							Add
							Subjects</button></a>
				</div>
				<!-- adding -->


				<div class="card mb-4 wow fadeIn">
					<!--Table-->
					<table class="table table-hover table-fixed">

						<!--Table head-->
						<thead>
							<tr>

								<th>#</th>
								<th>Image</th>
								<th>Subject</th>
								<th>Grade</th>

							</tr>
						</thead>
						<!--Table head-->

						<!--Table body-->
						<tbody>

							@foreach($subjects as $index=>$subject)
							<tr>
								<th scope="row">{{$index+1}}</th>
								<td>
								
									@if($subject->image==null)
									<img src="/img/sft.jpg" alt="" style="width: 50px;">
									@else
									<img src="{{asset('storage/images/'. $subject->image->path)}}" alt="" style="width: 50px;">
									@endif
								
								
								
								</td>
								<td>{{$subject->en_name}}</td>
								<td>{{$subject->exam->en_name}}</td>
								<td>
									<a href="#"> <i class="far fa-trash-alt"> </i> </a>
									<a href="#"><i class="fas fa-edit" style="margin-left: 7px;"></i></a>
								</td>
							</tr>
							@endforeach



						</tbody>
						<!--Table body-->

					</table>
					<!--Table-->
				</div>
			

              <!--Modal: Login / Register Form Demo-->
              <div class="modal fade" id="modalFormSubject" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
					<div class="modal-content">
						<form method="POST" action="{{route('post-admin-profile-subject-add')}}" enctype="multipart/form-data">
							<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Add Subject</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							</div>
							<div class="modal-body">
							<!-- Grid column -->


							<!-- Subject Image -->
							<div class="align-middle text-center" style="margin-bottom: 20px;">
								<div class="avatar mx-auto d-block">
									<img src="/img/ict.jpg" style="width:25%; height:auto;" class="z-depth-1" alt="Sample avatar">
								</div>
							</div>


							<div class="input-group" style="margin-bottom: 25px;">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroupFileAddon01"
										style="background: purple; color: white;">Subject Image</span>
								</div>
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="inputGroupFile01"
										aria-describedby="inputGroupFileAddon01" name="image">
									<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
								</div>
							</div>

							<!-- Subject Name -->
							<div class="form-row mb-4">
								<label for="exampleFormControlSelect1" style="float: left; font-size: smaller;">Subject Name</label>
								<input name="subject_name" type="text" id="defaultRegisterFormFirstName" class="form-control"
									placeholder="Subject Name" style="background: #f8f7f7;">
							</div>

							<!-- Grade select -->
							<div class="form-group">
								<label for="exampleFormControlSelect1" style="float: left; font-size: smaller;">Select
									Exam</label>
								<select class="form-control" name="exam_type" id="exampleFormControlSelect1" style="background: #f8f7f7;">
									<option value="0">Select exam</option>
									@foreach($exams as $exam)

									<option value="{{$exam->id}}">{{$exam->en_name}}</option>
									@endforeach
								</select>
							</div>




							@csrf

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" name="submit" class="btn btn-primary">Save changes</button>
							</div>
						</form>
					</div>
					</div>
              </div>
              <!--Modal: Login / Register Form Demo-->				

@endsection


@section('script')

	<script>

		@if(count($errors)!=0)  
			$(function() {
				$('#modalAddQuiz').modal({
						show: true
				});
			});

		@endif


	</script>
@endsection