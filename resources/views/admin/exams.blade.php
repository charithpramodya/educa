@extends('layouts.admin')

@section('content')

				<!-- adding -->
				<div class="btn-group" role="group" aria-label="Basic example" style="margin-bottom: 15px;">

					<a><button type="button" class="btn btn-white" data-toggle="modal" data-target="#modalAddExam"><i class="fas fa-plus"
								style="color: purple;"></i>
							Add Exam</button></a>
					
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
								<th>Exam Name</th>
								<th>Delete/Edit</th>

							</tr>
						</thead>
						<!--Table head-->

						<!--Table body-->
						<tbody>

							@foreach($exams as $index=>$exam)
							<tr>
								<th scope="row">{{$index+1}}</th>
								<td>
								@if($exam->image_id==0)
								<img src="/img/chem.jpg" alt="" style="width: 50px;">
								@else
								<img src="{{asset('storage/images/'.$exam->image->path)}}" alt="" style="width: 50px;">
								@endif
								</td>
								<td>{{$exam->en_name}}</td>
								<td>
									
									<a  href="{{route('get-admin-profile-exam-remove')}}" onclick="event.preventDefault();
									document.getElementById('delete-exam-form-{{$exam->fid}}').submit();">
													<i class="far fa-trash-alt"> </i>
									</a>

									<form id="delete-exam-form-{{$exam->fid}}" action="{{ route('get-admin-profile-exam-remove') }}" method="POST" style="display: none;">
													@csrf
											<input type="hidden" name="id" value="{{$exam->fid}}">
									</form>
									
								</td>
							</tr>
							@endforeach


						

						</tbody>
						<!--Table body-->

					</table>
					<!--Table-->
					
				</div>

				

				<!--Modal: add Exam-->
				<div class="modal fade" id="modalAddExam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
						<div class="modal-content">
							<form method="POST" action="{{route('post-admin-profile-exam-add')}}" enctype="multipart/form-data">
								<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Add Exam</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								</div>
								<div class="modal-body">
								<!-- Grid column -->
									<ul id="error" class="alert alert-danger" style="display:none;"></ul>

								<!-- Exam Name -->
								<div class="form-group">
									<label for="FormExamName" style="float: left; font-size: smaller;">{{ __('Exam Name') }}</label>
									<input type="text" name="examname" value="{{old('examname')}}" id="FormExamName" class="form-control" style="background: #f8f7f7;">
		
								</div>


                                <div class="input-group" style="margin-bottom: 25px;">
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroupFileAddon01"
											style="background: purple; color: white;">Exam Image</span>
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
				<!--Modal: add exam-->

			



@endsection


@section('script')
<script>


</script>
@endsection